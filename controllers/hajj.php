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

class HajjControllerHajj extends JControllerLegacy
{

/*
|------------------------------------------------------------------------------------
| Edit Hajj 
|------------------------------------------------------------------------------------
*/
  public function setEditHajj(){
    $app = JFactory::getApplication();
    $jinput = $app->input;

    $obj = new stdClass();
    $obj->id_user         = $jinput->get('id_user','','STRING');
    $obj->first_name      = $jinput->get('first_name','','STRING');
    $obj->second_name     = $jinput->get('second_name','','STRING');
    $obj->third_name      = $jinput->get('third_name','','STRING');
    $obj->familly_name    = $jinput->get('familly_name','','STRING');
    $obj->sexe            = $jinput->get('sexe','','STRING');
    $obj->nationality     = $jinput->get('nationality','','STRING');
    $obj->birthday        = $jinput->get('birthday1','','STRING') . '/';
    $obj->birthday       .= $jinput->get('birthday2','','STRING') . '/';
    $obj->birthday       .= $jinput->get('birthday3','','STRING');
    $obj->job             = $jinput->get('job','','STRING');
    $obj->rh              = $jinput->get('rh','','STRING');
    $obj->address         = $jinput->get('address','','STRING');
    $obj->mobile          = $jinput->get('mobile','','STRING');
    $obj->email           = $jinput->get('email','','STRING');
    $obj->office_branch   = $jinput->get('office_branch','','STRING');
    $obj->hajj_program    = $jinput->get('hajj_program','','STRING');
    $obj->register_status = $jinput->get('register_status','','STRING');
    


    //$this->getModel('Hajj')->setEditHajj($obj);
    if ($obj->register_status == "") {// Not Admin
      // Save obejct and redirect
      $this->getModel('Hajj')->setEditHajj($obj);
      $redirect = $_SERVER['HTTP_REFERER'];
      $pattern = '/&id=\w+/i';
      $redirect  =preg_replace($pattern, '', $redirect);

    }else{// This is an admin
      $obj->topay = $jinput->get('topay','','STRING');
      switch ($obj->register_status) {  // Switch to send SMS
        case '2':
          // Accepted
          // أخي الحاج نشكر لكم اختياركم لشركة فوج مكة ونذكركم بموعد سداد المبلغ المستحق ،خلال اسبوع من تاريخه حتى يتم تأكيد حجزكم لحج هذا العام ، وتقبلوا تحياتنا وتقديرنا . تنبيه : لمعرفة طريقة السداد نأمل منكم الدخول على موقع الشركة .
          $obj->sms2 = "أخي الحاج نشكر لكم اختياركم لشركة فوج مكة ونذكركم بموعد سداد المبلغ المستحق ،خلال اسبوع من تاريخه حتى يتم تأكيد حجزكم لحج هذا العام ، وتقبلوا تحياتنا وتقديرنا . تنبيه : لمعرفة طريقة السداد نأمل منكم الدخول على موقع الشركة .";
          $msgcode = "0623062E064A002006270644062D0627062C00200646063406430631002006440643064500200627062E062A064A0627063106430645002006440634063106430629002006410648062C00200645064306290020064806460630064306310643064500200628064506480639062F00200633062F0627062F002006270644064506280644063A00200627064406450633062A062D06420020060C062E0644062706440020062706330628064806390020064506460020062A06270631064A062E06470020062D062A06490020064A062A06450020062A06230643064A062F0020062D062C06320643064500200644062D062C00200647063006270020062706440639062706450020060C00200648062A064206280644064806270020062A062D064A0627062A0646062700200648062A0642062F064A0631064606270020002E000A062A06460628064A06470020003A0020064406450639063106410629002006370631064A064206290020062706440633062F0627062F0020064606230645064400200645064606430645002006270644062F062E0648064400200639064406490020064506480642063900200627064406340631064306290020002E";
          break;
        
        case '3':
          // Refused
          // نعتذر عن قبول طلبكم 
          $obj->sms3 = "نعتذر عن قبول طلبكم";
          $msgcode = "06460639062A06300631002006390646002006420628064806440020063706440628064306450020000A";
          break;
        
        case '4':
          // tama daf3
          // تم اعتماد تسجيلكم في الشركة لحج هذا العام وستصلكم رسالة حين اعتماد العقد من الوزارة
          $obj->sms4 = "تم اعتماد تسجيلكم في الشركة لحج هذا العام وستصلكم رسالة حين اعتماد العقد من الوزارة";
          $msgcode = "062A0645002006270639062A06450627062F0020062A0633062C064A06440643064500200641064A002006270644063406310643062900200644062D062C0020064706300627002006270644063906270645002006480633062A06350644064306450020063106330627064406290020062D064A0646002006270639062A06450627062F00200627064406390642062F00200645064600200627064406480632062706310629000A";
          break;
        
        default:
          $msgcode = "";
          break;
      }

      if ($msgcode != "") {// Send the SMS
        require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';
        if (HajjFrontendHelper::sendTheSMS($obj->mobile, $msgcode) != "1") { // If SMS Failed
          $obj->sms2 = $obj->sms3 = $obj->sms4 = "";
        }
      }
      $redirect = "index.php?option=com_hajj&task=admin.hajjs";
    }

    $this->getModel('Hajj')->setEditHajj($obj);

    // Check if delete User needed
    if ($obj->register_status == 5) {// We delete the user
      $id = $jinput->get('id','','STRING');
      $app->redirect("index.php?option=com_hajj&view=adminremove&id=" . $id);
    }
    
    $app->redirect($redirect, 
      "تم التعديل بنجاح",
      'success');
  }

/*
|------------------------------------------------------------------------------------
| Remove Hajj
|------------------------------------------------------------------------------------
*/
  public function removeHajj(){
    
    $app = JFactory::getApplication();
    $id_user = JFactory::getUser()->id;
    $model= $this->getModel('Hajj');

    // Get the ID of Hajj
    $id = $model->getIdNumber($id_user);

    // Delete the user
    $model->removeHajj($id);
    
    // Update the payment for Hajj
    require_once JPATH_COMPONENT . '/helpers/hajj.php';
    $Hajj = $model->getHajj($id_user);

    // Check if it's an addon or not
    $addon = ($Hajj->addon == '') ? $Hajj->id : $Hajj->addon;
    HajjFrontendHelper::updateToPayHajj($addon); // Update the payment
    
    $app->logout();
    $app->redirect("index.php");

    
  }

/*
|------------------------------------------------------------------------------------
| Add new Payments
|------------------------------------------------------------------------------------
*/
  public function setPayment(){
    
    $app = JFactory::getApplication();
    $jinput = $app->input;
    $jfiles = $jinput->files;
    
    $obj                = new stdClass();
    $obj->id            = $jinput->get('id');
    $obj->id_hajj       = $jinput->get('id_hajj', "", 'STRING');
    $obj->amount        = $jinput->get('amount', 0);
    $obj->date          = $jinput->get('date', 0, 'DATE');
    $obj->account       = $jinput->get('account', "", 'STRING');
    $obj->account_owner = $jinput->get('account_owner', 0);
    $obj->status        = $jinput->get('status', 1);
    $attachment         = $jfiles->get('attachment');

    // Define errorMSG
    $errorMSG = "";
    $fileUploaded = ($attachment['name'] == '') ? False : True ; 

    // If new item and no file
    if ($obj->id == 0 && !$fileUploaded) {
      $errorMSG = "يرجى ارفاق السند (png/jpg)";
    }
    
    // Check Errors
    if ($attachment['error'] != 0) {
      $errorMSG = "خطأ في ملف";
    }

    //check for filesize
    if ($attachment['size'] > 2000000) {
      $errorMSG = "ملف أكبر من 2MB";
    }

    // Check for Extension
    if ($attachment['type'] != "" && $attachment['type'] != "application/pdf" && $attachment['type'] != "image/jpeg" && $attachment['type'] != "image/png" ) {
      $errorMSG = "يرجى ارفاق السند (png/jpg)";
    }


    // Make the redirection
    if ($errorMSG != "" && $obj->id == 0) { // Error and new Item
      $app->redirect("index.php?option=com_hajj&view=payments", $errorMSG, 'error');
    }else{// No error
      if ($obj->id == 0) {// New Item
        $obj->id = $this->getModel('Payments')->setPayments($obj);
        $txt     = "تمت الإضافة بنجاح";
      }else{ // Edit Item
        $this->getModel('Payments')->editPayments($obj);
        $txt = "تم التعديل بنجاح";
      }
    }

    // Move the file
    if ($fileUploaded) {
      jimport('joomla.filesystem.file');
      jimport('joomla.filesystem.folder');
      $name         = $obj->id;
      $originalname = $attachment['name'];
      $fileTemp     = $attachment['tmp_name'];
      $ext          = array_pop(explode('.', $originalname));
      $fileName     = $name . "." . $ext;
      $uploadPath   = JPATH_SITE.'/media/com_hajj/upload/img-'.$fileName;
      if(!JFile::upload($fileTemp, $uploadPath)){
        echo JText::_( 'ERROR MOVING FILE' );
        $txt .= ", ولم يتم ارفاق السند";
      }else{
        $obj->attachment = 'img-' . $fileName;
        $this->getModel('Payments')->editPayments($obj);
        $txt .= ", و تم ارفاق السند";
      }
    }

    $app->redirect("index.php?option=com_hajj&view=payments", $txt, 'success');
  }

}