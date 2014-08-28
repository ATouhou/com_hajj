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

class HajjModelTents extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Get My Tents
|------------------------------------------------------------------------------------
*/
  public function getMyTents($id){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_tents'))
        ->where($db->quoteName('id_hajj') . ' = '. $id);
    
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Get All Tents
|------------------------------------------------------------------------------------
*/
  public function getTents(){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_tents'));
    
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Set Tents
|------------------------------------------------------------------------------------
*/
  public function setTents($object){
    $db = JFactory::getDBO();
    
    $result = JFactory::getDbo()->insertObject('#__hajj_tents', $object);
    return $db->insertid();
  }

/*
|------------------------------------------------------------------------------------
| Edit Tents
|------------------------------------------------------------------------------------
*/
  public function editTents($object){

    $result = JFactory::getDbo()->updateObject('#__hajj_tents', $object, "id");
    return $result;
  }
  

}