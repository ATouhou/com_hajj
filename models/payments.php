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

class HajjModelPayments extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Get My Payments
|------------------------------------------------------------------------------------
*/
  public function getMyPayments($id){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_payments'))
        ->where($db->quoteName('id_hajj') . ' = '. $id);
    
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Get All Payments
|------------------------------------------------------------------------------------
*/
  public function getPayments(){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_payments'));
    
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Set Payments
|------------------------------------------------------------------------------------
*/
  public function setPayments($object){
    $db = JFactory::getDBO();
    
    $result = JFactory::getDbo()->insertObject('#__hajj_payments', $object);
    return $db->insertid();
  }

/*
|------------------------------------------------------------------------------------
| Edit Payments
|------------------------------------------------------------------------------------
*/
  public function editPayments($object){

    $result = JFactory::getDbo()->updateObject('#__hajj_payments', $object, "id");
    return $result;
  }
  

}