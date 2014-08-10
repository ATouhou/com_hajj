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

class HajjControllerAdmin extends JControllerLegacy
{

/*
|------------------------------------------------------------------------------------
| Change the construct
|------------------------------------------------------------------------------------
*/
  public function __construct(){
   
    if (!JFactory::getUser()->authorise('core.manage', 'com_hajj'))
    {
      return JError::raiseWarning(404, "JText::_('JERROR_ALERTNOAUTHOR')");
    }
    parent::__construct();
  }

/*
|------------------------------------------------------------------------------------
| Get List of hajjs
|------------------------------------------------------------------------------------
*/
  public function Hajjs(){
    
    $jinput = JFactory::getApplication()->input;
    $offset = $jinput->get('p','1');
    $limit  = 20;
    
    $start  = ($offset - 1) * $limit ;

    $result = $this->getModel("Admin")->getHajjs($start, $limit);

    $view   = $this->getView('adminhajjs', 'html'); //get the view
    $view->assignRef('data', $result); // assign data from the model
    $view->assignRef('start', $offset); // assign data from the model

    $view->display(); // display the view
  }

/*
|------------------------------------------------------------------------------------
| Get only one Hajj
|------------------------------------------------------------------------------------
*/
  public function Hajj(){
    $jinput = JFactory::getApplication()->input;

    $id = $jinput->get('id','','STRING');

    $result = $this->getModel("Admin")->getHajj($id);

    $view   = $this->getView('adminhajj', 'html'); //get the view
    $view->assignRef('data', $result); // assign data from the model
    $view->display(); // display the view
  }

/*
|------------------------------------------------------------------------------------
| Get SMS status
|------------------------------------------------------------------------------------
*/
  public function Sms(){
    $result = $this->getModel("Admin")->getSMS();

    $view   = $this->getView('adminsms', 'html'); //get the view
    $view->assignRef('data', $result); // assign data from the model
    $view->display(); // display the view

  }

/*
|------------------------------------------------------------------------------------
| Admin Remove Hajj
|------------------------------------------------------------------------------------
*/
  public function removeHajj(){

    $app = JFactory::getApplication();
    $id = $app->input->get('id','','STRING');
    $hajj = $this->getModel("admin")->getHajj($id);

    $mobile = $hajj->mobile;
    $id_user = $hajj->id_user;

    $result = $this->getModel("hajj")->removeHajj($id_user, TRUE); // True for Admin

    // msgcode = تم إلغاء طلب حجزكم. شركة فوج مكة لحجاج الداخل تتمنى لكم حجا مقبولا وسعيا مشكورا ويسعدنا تسجيلكم معنا مرة أخرى.
    require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';
    $msgcode = "062A0645002006250644063A0627062100200637064406280020062D062C063206430645002E00200634063106430629002006410648062C002006450643062900200644062D062C0627062C002006270644062F0627062E06440020062A062A06450646064900200644064306450020062D062C062700200645064206280648064406270020064806330639064A0627002006450634064306480631062700200648064A06330639062F064606270020062A0633062C064A06440643064500200645063906460627002006450631062900200623062E06310649002E";
    HajjFrontendHelper::sendTheSMS($mobile, $msgcode);

    $txt = "تم حذف الحجز رقم: " . $id ." بنجاح";
    $app->redirect("index.php?option=com_hajj&task=admin.hajjs", $txt, "success");

  }

/*
|------------------------------------------------------------------------------------
| Admin set Program
|------------------------------------------------------------------------------------
*/
  public function setProgram(){
    $app = JFactory::getApplication();
    $jinput = $app->input;

    $obj = new stdClass();
    $obj->id = $jinput->get('id','','STRING');
    $obj->name = $jinput->get('name','','STRING');
    $obj->price_program = $jinput->get('price_program','','STRING');
    $obj->status = $jinput->get('status','','STRING');

    if ($obj->id != "") { // Edit
      $this->getModel('admin')->setEditProgram($obj);
    }else{ // New Program
      $this->getModel('admin')->setProgram($obj);
    }

    
    $app->redirect('index.php?option=com_hajj&view=adminPrograms', 'تم حفظ البيانات بنجاح', 'success');
  }

/*
|------------------------------------------------------------------------------------
| Admin set Camps
|------------------------------------------------------------------------------------
*/
  public function setCamps(){
    $app = JFactory::getApplication();
    $jinput = $app->input;

    $obj = new stdClass();
    $obj->id = $jinput->get('id','','STRING');
    $obj->group = $jinput->get('group','','STRING');
    $obj->box = $jinput->get('box','','STRING');
    $obj->camp = $jinput->get('camp','','STRING');
    $obj->site = $jinput->get('site','','STRING');
    $obj->coordinates = $jinput->get('coordinates','','STRING');
    $obj->status = $jinput->get('status','','STRING');
    

    if ($obj->id != "") { // Edit
      $this->getModel('admin')->setEditCamps($obj);
    }else{ // New Camps
      $this->getModel('admin')->setCamps($obj);
    }

    
    $app->redirect('index.php?option=com_hajj&view=adminCamps', 'تم حفظ المخيم بنجاح', 'success');
  }


/*
|------------------------------------------------------------------------------------
| Admin set Program
|------------------------------------------------------------------------------------
*/
  public function setBranch(){
    $app = JFactory::getApplication();
    $jinput = $app->input;

    $obj = new stdClass();
    $obj->id = $jinput->get('id','','STRING');
    $obj->name = $jinput->get('name','','STRING');
    $obj->status = $jinput->get('status','','STRING');

    if ($obj->id != "") { // Edit
      $this->getModel('admin')->setEditBranch($obj);
    }else{ // New Branch
      $this->getModel('admin')->setBranch($obj);
    }
    
    $app->redirect('index.php?option=com_hajj&view=adminBranchs', 'تم حفظ البيانات بنجاح', 'success');
  }

/*
|------------------------------------------------------------------------------------
| Admin set Program
|------------------------------------------------------------------------------------
*/
  public function benefits(){
    $result = $this->getModel("Admin")->getBenefits();

    $view   = $this->getView('adminbenefits', 'html'); //get the view
    $view->assignRef('data', $result); // assign data from the model
    $view->display(); // display the view
  }

/*
|------------------------------------------------------------------------------------
| set Admin Information
|------------------------------------------------------------------------------------
*/
  public function setAdminInfo(){

    $app = JFactory::getApplication();
    $jinput = $app->input;

    $txt                      = new stdClass();
    $txt->name                = $jinput->get('name','','STRING');
    $txt->commercial_register = $jinput->get('commercial_register','','STRING');
    $txt->address             = $jinput->get('address','','STRING');
    $txt->email               = $jinput->get('email','','STRING');
    $txt->tel                 = $jinput->get('tel','','STRING');
    $txt->fax                 = $jinput->get('fax','','STRING');
    $txt->mobile              = $jinput->get('mobile','','STRING');
    $txt->logo                = $jinput->get('logo','','STRING');

    $obj        = new stdClass();
    $obj->name  = "adminInfo";
    $obj->value = json_encode($txt);

    $this->getModel('admin')->setAdminInfo($obj);

    $app->redirect('index.php?option=com_hajj&view=administration', 'تم حفظ الإدارة العامة بنجاح', 'success');
  }

/*
|------------------------------------------------------------------------------------
| set Register Status
|------------------------------------------------------------------------------------
*/
  public function setRegisterStatus(){
    $app = JFactory::getApplication();
    $jinput = $app->input;

    $obj        = new stdClass();
    $obj->name  = "register_status";
    $obj->value = $jinput->get("status", 0);

    $this->getModel('admin')->setAdminRegisterStatus($obj);

    $app->redirect('index.php?option=com_hajj&view=adminregisterstatus', 'تم حفظ حالة الحجز بنجاح', 'success');
  }


/*
|------------------------------------------------------------------------------------
| set Combine Addons
|------------------------------------------------------------------------------------
*/
  public function setCombineAddons(){
    $app = JFactory::getApplication();
    $jinput = $app->input;

    $obj           = new stdClass();
    $obj->original = $jinput->get("original", '', 'STRING');
    $addons        = $jinput->get("addons",  '', 'ARRAY');
    $obj->addons   = implode(', ', $addons);

    if($this->getModel('admin')->setCombineAddons($obj)){
      $app->redirect('index.php?option=com_hajj&view=admincombineaddons', 'تم  تعديل المرافقين بنجاح', 'success');
    }else{
      $app->redirect('index.php?option=com_hajj&view=admincombineaddons', 'خطأ SQL', 'error');
    }
  }


}