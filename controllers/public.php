<?php
/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http://www.behance.net/kossa
 */
 
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class HajjControllerPublic extends JControllerLegacy
{

/*
|------------------------------------------------------------------------------------
| Display view of new hajj
|------------------------------------------------------------------------------------
*/
  public function newHajj(){ 
      $app = JFactory::getApplication();
      $status = $this->getModel('Admin')->getRegisterStatus();

      $view   = $this->getView('newhajj', 'html'); //get the view
      $view->assignRef('status', $status);
      $view->display(); // display the view
  }


/*
|------------------------------------------------------------------------------------
| Set New Hajj
|------------------------------------------------------------------------------------
*/
  public function setNewHajj(){

    $app = JFactory::getApplication();
    $jinput = $app->input;

    $obj                   = new stdClass();
    $obj->first_name       = $jinput->get('first_name','','STRING');
    $obj->second_name      = $jinput->get('second_name','','STRING');
    $obj->third_name       = $jinput->get('third_name','','STRING');
    $obj->familly_name     = $jinput->get('familly_name','','STRING');
    $obj->sexe             = $jinput->get('sexe','','STRING');
    $obj->nationality      = $jinput->get('nationality','','STRING');
    $obj->id_number        = $jinput->get('id_number','','STRING');
    $obj->birthday         = $jinput->get('birthday1','','STRING') . '/';
    $obj->birthday        .= $jinput->get('birthday2','','STRING') . '/';
    $obj->birthday        .= $jinput->get('birthday3','','STRING');
    $obj->job              = $jinput->get('job','','STRING');
    $obj->rh               = $jinput->get('rh','','STRING');
    $obj->address          = $jinput->get('address','','STRING');
    $obj->mobile           = $jinput->get('mobile','','STRING');
    $obj->email            = $jinput->get('email','','STRING');
    $obj->office_branch    = $jinput->get('office_branch','','STRING');
    $obj->hajj_program     = $jinput->get('hajj_program','','STRING');
    $obj->reason_exception = $jinput->get('reason_exception','','STRING');
    $obj->addon            = $this->getModel("Hajj")->getIdNumber(JFactory::getUser()->id);
    $obj->register_status  = 1;
    $obj->date_register    = date("d/m/Y h:i A");
    $obj->topay            = $this->getModel('Admin')->getPriceProgram($obj->hajj_program);// Set the price of program 

    // Check if empty mail adress
    if ($obj->email == "") {
        $obj->email = "L" . $obj->id_number . "@gmail.ww";
    }
    require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';

    // Check id number
    if (($obj->nationality == 1 && $obj->id_number[0] != "1") || ($obj->nationality != 1 && $obj->id_number[0] != "2")) {
        $app->redirect($_SERVER['HTTP_REFERER'], "خطأ في رقم الهوية", "error");
    }


    $id_user = HajjFrontendHelper::register_user($obj->id_number, $obj->mobile, $obj->email, $obj->first_name);

    if (!is_numeric($id_user)) { // Problem
      $app->redirect("index.php?option=com_hajj&view=newhajj", 
      "عذرا..لم يتم التسجيل : " . $id_user,
      'danger');
    }

    $obj->id_user = $id_user;
    
    // Send the SMS
    $msg = "064606340643063106430645002006390644064900200627062E062A064A0627063106430645002006440644062D062C00200645063906460627002006480633062A0635064406430645002006310633062706440629002006280627063006460020062706440644064700200628062A06230643064A062F0020062D062C063206430645060C00200643064506270020064A064506430646064306450020062A0633062C064A0644002006270644062F062E0648064400200644064406450648064206390020062806270633062A062E062F06270645002006310642064500200627064406470648064A06290020064806270644062C064806270644000A";
    if(HajjFrontendHelper::sendTheSMS($obj->mobile, $msg) == "1"){
        $obj->sms1 = "نشكركم على اختياركم للحج معنا وستصلكم رسالة باذن الله بتأكيد حجزكم، كما يمكنكم تسجيل الدخول للموقع باستخدام رقم الهوية والجوال.";
    }

    $id = $this->getModel('hajj')->setNewHajj($obj);
    


    if ($obj->addon != 0) {// Addon
        // update the to pay
        $this->updateToPayHajj($obj->addon);
        $app->redirect("index.php?option=com_hajj&view=addons", "تم إضافة المرافق بنجاح", "success");
    }else{ // New hajj
        // Auto login
        HajjFrontendHelper::autologin($obj->id_number, $obj->mobile);
        $app->redirect("index.php?option=com_hajj&view=dashboard");
    }
  }

/*
|------------------------------------------------------------------------------------
| Update all hajj payment
|------------------------------------------------------------------------------------
*/
  public function updateAllHajjPay(){
    // Get all Hajjs 
    require_once JPATH_COMPONENT . '/helpers/hajj.php';

    HajjFrontendHelper::updateHajjsPayment();
      
    echo "<h2>تم تعديل مبلغ الحجز لكل الحجاج</h2>";
  }

    
}