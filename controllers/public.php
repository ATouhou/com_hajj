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
      
      $view   = $this->getView('newhajj', 'html'); //get the view
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
    $obj->addon            = JFactory::getUser()->id;
    $obj->register_status  = 1;


    // Check if empty mail adress
    if ($obj->email == "") {
        $obj->email = "L" . $obj->id_number . "@gmail.ww";
    }

    // Chech id number
    if (($obj->nationality == 1 && $obj->id_number[0] != "1") || ($obj->nationality != 1 && $obj->id_number[0] != "2")) {
        echo $_SERVER['HTTP_REFERER'];
        $app->redirect($_SERVER['HTTP_REFERER'], "خطأ في رقم الهوية", "error");
    }

    require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';
    $id_user = HajjFrontendHelper::register_user($obj->id_number, $obj->mobile, $obj->email, $obj->first_name);

    if ($id_user == 0) { // Problem
      $app->redirect("index.php?option=com_hajj&view=newhajj", 
      "عذرا..رقم الهوية مسجل لدينا",
      'danger');
    }

    $obj->id_user = $id_user;
    $id = $this->getModel('hajj')->setNewHajj($obj);
    
    // Send the SMS
    // نشكركم على اختياركم للحج معنا وستصلكم رسالة باذن الله بتأكيد حجزكم
    $msg = "064606340643063106430645002006390644064900200627062E062A064A0627063106430645002006440644062D062C00200645063906460627002006480633062A063506440643064500200631063306270644062900200628062506300646002006270644064406470020062A063906270644064900200628062A06230643064A062F0020062D062C063206430645";
    HajjFrontendHelper::sendTheSMS($obj->mobile, $msg);

    if ($obj->addon != 0) {// Addon
        $app->redirect("index.php?option=com_hajj&view=addons", "تم إضافة المرافق بنجاح", "success");
    }else{ // New hajj
        // Auto login
        HajjFrontendHelper::autologin($obj->id_number, $obj->mobile);
        $app->redirect("index.php?option=com_hajj&view=dashboard");
    }
  }

}