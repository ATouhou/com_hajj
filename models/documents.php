<?php
/**
 * @version     1.0.0
 * @package     com_Hajj
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http://www.behance.net/kossa
 */
 
// No direct access
defined('_JEXEC') or die;

class HajjModelDocuments extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Get All Documents
|------------------------------------------------------------------------------------
*/
  public function getDocuments($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_documents'));

    if ($where!='') {
      $query->where($where);
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Set Document
|------------------------------------------------------------------------------------
*/
  public function setDocument($object){
    $db = JFactory::getDBO();
    
    $result = JFactory::getDbo()->insertObject('#__hajj_documents', $object);
    return $db->insertid();
  }

/*
|------------------------------------------------------------------------------------
| Edit Documents
|------------------------------------------------------------------------------------
*/
  public function editDocument($object){
    $result = JFactory::getDbo()->updateObject('#__hajj_documents', $object, "id");
    return $result;
  }
  

}