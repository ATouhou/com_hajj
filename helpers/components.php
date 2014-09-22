<?php

/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http
 */
defined('_JEXEC') or die;

class HajjComponentsHelper {

  public static function loadDatePicker(){
    $doc = JFactory::getDocument();
    $doc->addStyleSheet( '//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css' );

    $doc->addScript( '//code.jquery.com/jquery-1.10.2.js' );
    $doc->addScript( '//code.jquery.com/ui/1.11.0/jquery-ui.js' );
    $doc->addScriptDeclaration('
      $(function() {
        $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
      });
    ');
  }

/*
|------------------------------------------------------------------------------------
| Get the pagination
|------------------------------------------------------------------------------------
*/
  public static function getPagination($url='', $nbrows=0, $nbPerPage=20, $currentPage=1){
    $npPage = ceil($nbrows/$nbPerPage);
    ob_start(); 
  ?>
    <div class="text-center mt-50">
      <div class="pagination">
        <ul>
          <?php for ($i = $npPage; $i > 0; $i--): ?>
            <li <?php echo ($i == $currentPage)? 'class="active"' : '';?>>
              <a href="<?php echo $url.$i ?>"><?php echo $i ?></a>
            </li>
          <?php endfor ?>
        </ul>
      </div>
    </div>
  <?php
    $content = ob_get_contents();
    ob_get_clean();
    return $content;
  }

/*
|------------------------------------------------------------------------------------
| Get the pager
|------------------------------------------------------------------------------------
*/
  public static function getPager($start=0, $sizeData=0 ,$url=''){
    ob_start(); 
  ?>
    <ul class="pager">
      <li class="next <?php echo ($start-1 == 0) ? "hidden" : "" ?>"><a href="<?php echo $url,$start-1 ?>">&rarr;سابق </a></li>
      <li class="previous <?php echo ($sizeData < 20 || $sizeData == 0) ? "hidden" : "" ?>"><a href="<?php echo $url, $start + 1 ?>">التالي &larr;</a></li>
    </ul>
  <?php
    $content = ob_get_contents();
    ob_get_clean();
    return $content;
  }

/*
|------------------------------------------------------------------------------------
| Export 
|------------------------------------------------------------------------------------
*/
  public static function export(){
    $doc = JFactory::getDocument();

    //$doc->addScript( '//code.jquery.com/jquery-1.10.2.js' );
    $doc->addScript( JUri::root().'/media/com_hajj/js/export-csv.js' );
    
  }


/*
|------------------------------------------------------------------------------------
| Export 
|------------------------------------------------------------------------------------
*/
  public static function ajaxGetTopayPaid(){
    $doc = JFactory::getDocument();

    //$doc->addScript( '//code.jquery.com/jquery-1.10.2.js' );
    $doc->addScript( JUri::root().'/media/com_hajj/js/ajax-gettopay-paid.js' );
    
  }
/*
|------------------------------------------------------------------------------------
| Export 
|------------------------------------------------------------------------------------
*/
  public static function getMinistryRequests(){
    $doc = JFactory::getDocument();

    //$doc->addScript( '//code.jquery.com/jquery-1.10.2.js' );
    $doc->addScript( JUri::root().'/media/com_hajj/js/ministry-requests.js' );
    
  }

/*
|------------------------------------------------------------------------------------
| Bluid XML From Hajj array Object
|------------------------------------------------------------------------------------
*/
  public static function BuildXML($hajjs){
    $sexe = array('m'=>1, 'f'=>2 );

    $XMLcontent = '<?xml version="1.0" standalone="yes"?>
<DocumentElement>';

  foreach ($hajjs as $key => $hajj) {
    $XMLcontent .='
  <HAJJ_DATA>
    <HD_GROUP_NO>'.$hajj->group_id.'</HD_GROUP_NO>
    <HD_FAMILY_TAG_ID>0</HD_FAMILY_TAG_ID>
    <HD_NO>'.$hajj->order_in_group.'</HD_NO>
    <HD_FULL_NAME>'.$hajj->first_name.' '.$hajj->second_name.'</HD_FULL_NAME>
    <HD_FIRST_NAME_AR>'.$hajj->first_name.'</HD_FIRST_NAME_AR>
    <HD_SECOND_NAME_AR>'.$hajj->second_name.'</HD_SECOND_NAME_AR>
    <HD_THIRD_NAME_AR />
    <HD_FOURTH_NAME_AR />
    <HD_GENDER_ID>'.$sexe[$hajj->sexe].'</HD_GENDER_ID>
    <HD_MARITAL_STATUS_ID>0</HD_MARITAL_STATUS_ID>
    <HD_HDATE_OF_BIRTH>'.$hajj->birthday.'</HD_HDATE_OF_BIRTH>
    <HD_ID_NO>'.$hajj->id_number.'</HD_ID_NO>
    <HD_ID_EXPIRY_HDATE>'.$hajj->expiration_date.'</HD_ID_EXPIRY_HDATE>
    <HD_ID_ISSUED_CITY_ID>0</HD_ID_ISSUED_CITY_ID>
    <HD_MAHRAM_PARENT_NO>0</HD_MAHRAM_PARENT_NO>
    <HD_RELATIONSHIP_ID>'.$hajj->relationship.'</HD_RELATIONSHIP_ID>
    <HD_ID_DPN_COUNT>0</HD_ID_DPN_COUNT>
    <HD_DPN_SERIAL_NO>0</HD_DPN_SERIAL_NO>
    <HD_NATIONALITY_ID>0</HD_NATIONALITY_ID>
    <HD_SPONSOR_ID_NO>0</HD_SPONSOR_ID_NO>
    <HD_EXCEPTION_FLAG>0</HD_EXCEPTION_FLAG>
    <HD_EXCEPTION_REASON />
    <HD_CONTRACT_CITY_ID>0</HD_CONTRACT_CITY_ID>
    <HD_COMPANY_NAME>لاشيء</HD_COMPANY_NAME>
    <HD_PHONE_NO>'.$hajj->first_name.'</HD_PHONE_NO>
    <HD_PO_BOX_NO>0</HD_PO_BOX_NO>
    <HD_CITY_ID>0</HD_CITY_ID>
    <HD_ZIP_CODE>0</HD_ZIP_CODE>
    <HD_REMARKS />
    <HD_GAMA_PARTNER_NAME />
    <HD_APPLICATION_VERSION>3.0.0.0</HD_APPLICATION_VERSION>
  </HAJJ_DATA>
';
    }
      $XMLcontent .='</DocumentElement>';

      return $XMLcontent;
  } 
    
/*
|------------------------------------------------------------------------------------
| Function to Export XML
|------------------------------------------------------------------------------------
*/
  public function exportXML($fileName="file.xml", $XMLObject=''){
    header("Content-type: text/xml");
    header("Content-Disposition: attachment; filename=$fileName");
    echo $XMLObject;
    exit();
  }

}
