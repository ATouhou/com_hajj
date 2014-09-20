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
    $office_branch        = $jinput->get('office_branch','','STRING');
    $hajj_program         = $jinput->get('hajj_program','','STRING');
    $obj->observation     = $jinput->get('observation','','STRING');
    $obj->sort_bed        = $jinput->get('sort_bed', 0);
    $obj->relationship    = $jinput->get('relationship', 0);
    $obj->register_status = $jinput->get('register_status','','STRING');
    $obj->expiration_date = $jinput->get('expiration_date1','','STRING') . '/';
    $obj->expiration_date .= $jinput->get('expiration_date2','','STRING') . '/';
    $obj->expiration_date .= $jinput->get('expiration_date3','','STRING');

    if ($office_branch !='') {
      $obj->office_branch= $office_branch;
    }

    if ($hajj_program !='') {
      $obj->hajj_program= $hajj_program;
    }

    

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
          // أخي الحاج تم استلام المبلغ وبناء عليه تم اعتماد تسجيلكم في الشركة لحج هذا العام وستصلكم رسالة حين اعتماد العقد من الوزارة. فضلا راجع بريدك الالكتروني للاطلاع على سند القبض.
          $obj->sms4 = "أخي الحاج تم استلام المبلغ وبناء عليه تم اعتماد تسجيلكم في الشركة لحج هذا العام وستصلكم رسالة حين اعتماد العقد من الوزارة. فضلا راجع بريدك الالكتروني للاطلاع على سند القبض.";
          $msgcode = "0623062E064A002006270644062D0627062C0020062A0645002006270633062A064406270645002006270644064506280644063A002006480628064606270621002006390644064A06470020062A0645002006270639062A06450627062F0020062A0633062C064A06440643064500200641064A002006270644063406310643062900200644062D062C0020064706300627002006270644063906270645002006480633062A06350644064306450020063106330627064406290020062D064A0646002006270639062A06450627062F00200627064406390642062F00200645064600200627064406480632062706310629002E00200641063606440627002006310627062C0639002006280631064A062F0643002006270644062706440643062A063106480646064A002006440644062706370644062706390020063906440649002006330646062F002006270644064206280636002E";
          break;
        
        case '6':
          // الرفع للوزارة raf3 lilwizara
          // أخي الحاج نأمل منكم رفع المستندات المطلوبة عن طريق خدماتنا الالكترونية او تسليمها لفرع الشركة. لمعرفة المستندات المطلوبة فضلا راجع خدمات التسجيل.
          $obj->sms6 = "أخي الحاج نأمل منكم رفع المستندات المطلوبة عن طريق خدماتنا الالكترونية او تسليمها لفرع الشركة. لمعرفة المستندات المطلوبة فضلا راجع خدمات التسجيل. ";
          $msgcode = "0623062E064A002006270644062D0627062C0020064606230645064400200645064606430645002006310641063900200627064406450633062A0646062F0627062A002006270644064506370644064806280629002006390646002006370631064A06420020062E062F06450627062A06460627002006270644062706440643062A063106480646064A06290020062706480020062A06330644064A064506470627002006440641063106390020062706440634063106430629002E002006440645063906310641062900200627064406450633062A0646062F0627062A00200627064406450637064406480628062900200641063606440627002006310627062C06390020062E062F06450627062A002006270644062A0633062C064A0644002E";
          break;
        
        case '7':
          // تصريح Tasrih
          // أخي الحاج تم استخراج تصريح الحج الخاص بكم من الوزارة. للاطلاع على التصريح فضلا راجع خدمات التسجيل.
          $obj->sms6 = "أخي الحاج تم استخراج تصريح الحج الخاص بكم من الوزارة. للاطلاع على التصريح فضلا راجع خدمات التسجيل. ";
          $msgcode = "0623062E064A002006270644062D0627062C0020062A0645002006270633062A062E06310627062C0020062A06350631064A062D002006270644062D062C002006270644062E06270635002006280643064500200645064600200627064406480632062706310629002E002006440644062706370644062706390020063906440649002006270644062A06350631064A062D00200641063606440627002006310627062C06390020062E062F06450627062A002006270644062A0633062C064A0644002E";
          break;
        
        default:
          $msgcode = "";
          break;
      }

      if ($msgcode != "") {// Send the SMS
        require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';
        if (HajjFrontendHelper::sendTheSMS($obj->mobile, $msgcode) != "1") { // If SMS Failed
          $obj->sms2 = $obj->sms3 = $obj->sms4 = $obj->sms6 = "";
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
    $obj->account_owner = $jinput->get('account_owner', "", 'STRING');
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
    if ($attachment['name'] != "" && $errorMSG != "") { // Error and new Item
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

/*
|------------------------------------------------------------------------------------
| Add Documents View
|------------------------------------------------------------------------------------
*/
  public function addDocument(){
    /*
      02 -> Hajj
      08 -> Super Users
      10 -> HajjAdmin
      11 -> HajjFinance
      12 -> HajjManager
    */

    // Get the type of user
      $app   = JFactory::getApplication();
      $ID    = JFactory::getUser()->id;
      $group = JAccess::getGroupsByUser($ID, false)[0];
      if (!$ID) {
        jimport( 'joomla.error.error' );
        return JError::raiseWarning(404, "JText::_('JERROR_ALERTNOAUTHOR')");
      }
      
      $where = 'register_status = 6'; // Only Tama daf3 Hajj

    // Get list of id_hajj for the form
      if ($group == 2) { // This is a hajj
        // Get the id hajj
        $id_hajj        = $this->getModel('hajj')->getIdNumber($ID);
        $where          .= ' AND id = '.$id_hajj.' OR addon = '.$id_hajj; // We display the hajj and the addon
      }else if  ($group == 12){ //HajjManager
        $office_branch  = $this->getModel('Personnels')->getPersonnels('id_user = '.$ID)[0]->office_branch;// Get the branch of the Manager
        $where          .= ' AND office_branch = '.$office_branch;
      }

      $allHajjs = $this->getModel('admin')->getHajjs(0,0,$where);

    // get the table of List Document
      // Construct the id list
      $idsHajjs = array();
      foreach ($allHajjs as $key => $hajj) {
        array_push($idsHajjs, $hajj->id);
      }

      $idsHajjsString = implode(', ', $idsHajjs);
      
      $where = ($idsHajjsString == '') ? 'Documents.id_hajj IN (0)': 'Documents.id_hajj IN ('.$idsHajjsString.')';
      $data = $this->getModel('Documents')->getDocuments($where);
      $view = $this->getView('addDocument', 'html'); //get the view

      // Check if we have something to edit
      $id = $app->input->get('id','');
      $toEdit='';
      if ($id != '') { // Something to edit
        foreach ($data as $key => $value) {
          if ($value->id == $id) {
            $toEdit = $value;
          }
        }
      }
      
      $view->assignRef('data', $data); // assign data from the model
      $view->assignRef('allHajjs', $allHajjs); // assign idsHajjs from the model
      $view->assignRef('toEdit', $toEdit); // assign idsHajjs from the model
      $view->display(); // display the view

  }

/*
|------------------------------------------------------------------------------------
| Set the Documents 
|------------------------------------------------------------------------------------
*/
  public function setDocument(){
    $app = JFactory::getApplication();
    $jinput = $app->input;
    $jfiles = $jinput->files;

    $obj           = new stdClass();
    $obj->id       = $jinput->get('id', '0');
    $obj->id_hajj  = $jinput->get('id_hajj', '0');
    $obj->document = $jinput->get('document', '0');
    $attachment    = $jfiles->get('attachment');

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
      $app->redirect("index.php?option=com_hajj&task=hajj.addpasse", $errorMSG, 'error');
    }else{// No error
      if ($obj->id == 0) { // New Item
        $obj->id = $this->getModel('Documents')->setDocument($obj);
        $txt     = "تمت الإضافة بنجاح";
      }else{ // Edit Item
        $this->getModel('Documents')->editDocument($obj);
        $txt = "تم التعديل بنجاح";
      }
    }

    // Move the file
    if ($fileUploaded) {
      jimport('joomla.filesystem.file');
      jimport('joomla.filesystem.folder');
      $name         = $obj->id_hajj.'-'.$obj->document;// idhhaj-document    Ex : 102-2
      $originalname = $attachment['name'];
      $fileTemp     = $attachment['tmp_name'];
      $ext          = array_pop(explode('.', $originalname));
      $fileName     = $name . "." . $ext;
      $uploadPath   = JPATH_SITE.'/media/com_hajj/documents/img-'.$fileName;
      if(!JFile::upload($fileTemp, $uploadPath)){
        echo JText::_( 'ERROR MOVING FILE' );
        $txt .= ", ولم يتم ارفاق السند";
      }else{
        $obj->link = 'img-' . $fileName;
        $this->getModel('Documents')->editDocument($obj);
        $txt .= ", و تم ارفاق السند";
      }
    }

    $app->redirect("index.php?option=com_hajj&task=hajj.addpasse", $txt, 'success');


  }

/*
|------------------------------------------------------------------------------------
| Get the attachment for Document
|------------------------------------------------------------------------------------
*/
  public function getImgDocument(){
    $app     = JFactory::getApplication();
    $jinput  = $app->input;
    $imgName = $jinput->get("img");
    header('Content-Type: image/jpeg');
    readfile(JPATH_SITE.'/media/com_hajj/documents/' . $imgName);
    exit;
  }

/*
|------------------------------------------------------------------------------------
| Add Passe View
|------------------------------------------------------------------------------------
*/
  public function addPasse(){
    /*
      02 -> Hajj
      08 -> Super Users
      10 -> HajjAdmin
      11 -> HajjFinance
      12 -> HajjManager
    */

    // Get the type of user
      $app   = JFactory::getApplication();
      $ID    = JFactory::getUser()->id;
      $group = JAccess::getGroupsByUser($ID, false)[0];

      if ($group==1 || $group == 2) {
        exit(0);
      }
      $is_manager = ($group  == 12) ? true : false;

      $where = 'register_status = 7'; // Only Tasrih Hajj

      $allHajjs = $this->getModel('admin')->getHajjs(0,0,$where);

    // get the table of List Document
      // Construct the id list
      $idsHajjs = array();
      foreach ($allHajjs as $key => $hajj) {
        array_push($idsHajjs, $hajj->id);
      }

      $idsHajjsString = implode(', ', $idsHajjs);
      
      $where = ($idsHajjsString == '') ? 'Passes.id_hajj IN (0)': 'Passes.id_hajj IN ('.$idsHajjsString.')';
      $data = $this->getModel('Passes')->getPasses($where);
      $view = $this->getView('addPasses', 'html'); //get the view

      // Check if we have something to edit
      $id = $app->input->get('id','');
      $toEdit='';
      if ($id != '') { // Something to edit
        foreach ($data as $key => $value) {
          if ($value->id == $id) {
            $toEdit = $value;
          }
        }
      }
      
      $view->assignRef('data', $data); // assign data from the model
      $view->assignRef('allHajjs', $allHajjs); // assign idsHajjs from the model
      $view->assignRef('toEdit', $toEdit); // assign idsHajjs from the model
      $view->assignRef('is_manager', $is_manager); // assign idsHajjs from the model
      $view->display(); // display the view

  }

/*
|------------------------------------------------------------------------------------
| Set the Passe 
|------------------------------------------------------------------------------------
*/
  public function setPasse(){
    $app = JFactory::getApplication();
    $jinput = $app->input;
    $jfiles = $jinput->files;

    $obj           = new stdClass();
    $obj->id       = $jinput->get('id', '0');
    $obj->id_hajj  = $jinput->get('id_hajj', '0');
    $obj->pass_num = $jinput->get('pass_num', '0');
    $attachment    = $jfiles->get('attachment');

    // Define errorMSG
    $errorMSG = "";
    $fileUploaded = ($attachment['name'] == '') ? False : True ; 

    // If new item and no file
    if ($obj->id == 0 && !$fileUploaded) {
      $errorMSG = "يرجى ارفاق التصريح (pdf)";
    }

    // Check Errors
    if ($attachment['error'] != 0) {
      $errorMSG = "خطأ في ملف";
    }

    //check for filesize
    if ($attachment['size'] > 20000000) {
      $errorMSG = "ملف أكبر من 20MB";
    }

    // Check for Extension
    if ($attachment['type'] != "" && $attachment['type'] != "application/pdf" ) {
      $errorMSG = "يرجى ارفاق ملف التصريح (pdf)";
    }

   
    // Make the redirection
    if ($errorMSG != "" && $obj->id == 0) { // Error and new Item
      $app->redirect("index.php?option=com_hajj&task=hajj.addpasse", $errorMSG, 'error');
    }else{// No error
      if ($obj->id == 0) { // New Item
        $obj->id = $this->getModel('Passes')->setPasse($obj);
        $txt     = "تمت الإضافة بنجاح";
      }else{ // Edit Item
        $this->getModel('Passes')->editPasse($obj);
        $txt = "تم التعديل بنجاح";
      }
    }

    // Move the file
    if ($fileUploaded) {
      jimport('joomla.filesystem.file');
      jimport('joomla.filesystem.folder');
      $name         = $obj->id_hajj;
      $originalname = $attachment['name'];
      $fileTemp     = $attachment['tmp_name'];
      $ext          = array_pop(explode('.', $originalname));
      $fileName     = $name . "." . $ext;
      $uploadPath   = JPATH_SITE.'/media/com_hajj/passes/pdf-'.$fileName;
      if(!JFile::upload($fileTemp, $uploadPath)){
        echo JText::_( 'ERROR MOVING FILE' );
        $txt .= ", ولم يتم ارفاق السند";
      }else{
        $obj->link = 'pdf-' . $fileName;
        $this->getModel('Passes')->editPasse($obj);
        $txt .= ", و تم ارفاق التصريح";
      }
    }

    $app->redirect("index.php?option=com_hajj&task=hajj.addpasse", $txt, 'success');


  }

/*
|------------------------------------------------------------------------------------
| Get the attachment for Passe
|------------------------------------------------------------------------------------
*/
  public function getImgPasse(){
    $app     = JFactory::getApplication();
    $jinput  = $app->input;
    $imgName = $jinput->get("pdf");
    header('Content-Type: application/pdf');
    readfile(JPATH_SITE.'/media/com_hajj/passes/' . $imgName);
    exit;
  }

/*
|------------------------------------------------------------------------------------
| Add contract
|------------------------------------------------------------------------------------
*/
  public function addContract(){
    /*
      02 -> Hajj
      08 -> Super Users
      10 -> HajjAdmin
      11 -> HajjFinance
      12 -> HajjManager
    */

    // Get the type of user
      $app   = JFactory::getApplication();
      $ID    = JFactory::getUser()->id;
      $group = JAccess::getGroupsByUser($ID, false)[0];

      if ($group==1 || $group == 2) {
        exit(0);
      }
      $is_manager = ($group  == 12) ? true : false;

      $where = 'register_status = 7'; // Only Tasrih Hajj

      $allHajjs = $this->getModel('admin')->getHajjs(0,0,$where);

    // get the table of List Document
      // Construct the id list
      $idsHajjs = array();
      foreach ($allHajjs as $key => $hajj) {
        array_push($idsHajjs, $hajj->id);
      }

      $idsHajjsString = implode(', ', $idsHajjs);
      
      $where = ($idsHajjsString == '') ? 'Contracts.id_hajj IN (0)': 'Contracts.id_hajj IN ('.$idsHajjsString.')';
      $data = $this->getModel('Contracts')->getContracts($where);
      $view = $this->getView('contract', 'html'); //get the view

      // Check if we have something to edit
      $id = $app->input->get('id','');
      $toEdit='';
      if ($id != '') { // Something to edit
        foreach ($data as $key => $value) {
          if ($value->id == $id) {
            $toEdit = $value;
          }
        }
      }
      
      $view->assignRef('data', $data); // assign data from the model
      $view->assignRef('allHajjs', $allHajjs); // assign idsHajjs from the model
      $view->assignRef('toEdit', $toEdit); // assign idsHajjs from the model
      $view->assignRef('is_manager', $is_manager); // assign idsHajjs from the model
      $view->display(); // display the view

  }

/*
|------------------------------------------------------------------------------------
| Set the Documents 
|------------------------------------------------------------------------------------
*/
  public function setContract(){
    $app = JFactory::getApplication();
    $jinput = $app->input;
    $jfiles = $jinput->files;

    $obj                = new stdClass();
    $obj->id            = $jinput->get('id', '0');
    $obj->id_hajj       = $jinput->get('id_hajj', '0');
    $obj->contract_num  = $jinput->get('contract_num', '0');
    $obj->date_contract = $jinput->get('date_contract', '0');
    $attachment         = $jfiles->get('attachment');

    // Define errorMSG
    $errorMSG = "";
    $fileUploaded = ($attachment['name'] == '') ? False : True ; 

    // If new item and no file
    if ($obj->id == 0 && !$fileUploaded) {
      $errorMSG = "يرجى ارفاق التصريح (pdf)";
    }

    // Check Errors
    if ($attachment['error'] != 0) {
      $errorMSG = "خطأ في ملف";
    }

    //check for filesize
    if ($attachment['size'] > 20000000) {
      $errorMSG = "ملف أكبر من 20MB";
    }

    // Check for Extension
    if ($attachment['type'] != "" && $attachment['type'] != "application/pdf" ) {
      $errorMSG = "يرجى ارفاق ملف التصريح (pdf)";
    }

   
    // Make the redirection
    if ($errorMSG != "" && $obj->id == 0) { // Error and new Item
      $app->redirect("index.php?option=com_hajj&task=hajj.addcontract", $errorMSG, 'error');
    }else{// No error
      if ($obj->id == 0) { // New Item
        $obj->id = $this->getModel('Contracts')->setContract($obj);
        // Update the Field sign_contract
        $HajjObj                = new stdClass();
        $HajjObj->id            = $obj->id_hajj;
        $HajjObj->sign_contract = 1;
        $this->getModel('Admin')->updateHajj($HajjObj);
        $txt     = "تمت الإضافة بنجاح";
      }else{ // Edit Item
        $this->getModel('Contracts')->editContract($obj);
        $txt = "تم التعديل بنجاح";
      }
    }

    // Move the file
    if ($fileUploaded) {
      jimport('joomla.filesystem.file');
      jimport('joomla.filesystem.folder');
      $name         = $obj->id_hajj;
      $originalname = $attachment['name'];
      $fileTemp     = $attachment['tmp_name'];
      $ext          = array_pop(explode('.', $originalname));
      $fileName     = $name . "." . $ext;
      $uploadPath   = JPATH_SITE.'/media/com_hajj/contracts/pdf-'.$fileName;
      if(!JFile::upload($fileTemp, $uploadPath)){
        echo JText::_( 'ERROR MOVING FILE' );
        $txt .= ", ولم يتم ارفاق السند";
      }else{
        $obj->link = 'pdf-' . $fileName;
        $this->getModel('Contracts')->editContract($obj);
        $txt .= ", و تم ارفاق التصريح";
      }
    }

    $app->redirect("index.php?option=com_hajj&task=hajj.addcontract", $txt, 'success');


  }

/*
|------------------------------------------------------------------------------------
| Get the attachment for Pass
|------------------------------------------------------------------------------------
*/
  public function getImgContract(){
    $app     = JFactory::getApplication();
    $jinput  = $app->input;
    $imgName = $jinput->get("pdf");
    header('Content-Type: application/pdf');
    readfile(JPATH_SITE.'/media/com_hajj/contracts/' . $imgName);
    exit;
  }

}