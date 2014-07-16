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

class HajjModelAdmin extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Get All Hajjs
|------------------------------------------------------------------------------------
*/
  public function getHajjs(){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_users'));
    
    $db->setQuery($query);
    $results = $db->loadObjectList();
    return $results;
  }

/*
|------------------------------------------------------------------------------------
| Get One Hajj
|------------------------------------------------------------------------------------
*/
  public function getHajj($ID){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_users'))
        ->where($db->quoteName('id') . ' = '. $ID);
    
    $db->setQuery($query);
    $results = $db->loadObject();
    return $results;
  }

/*
|------------------------------------------------------------------------------------
| Get SMS Status
|------------------------------------------------------------------------------------
*/
  public function getSMS(){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select($db->quoteName(array('id', 'first_name', 'familly_name', 'register_status', 'sms1', 'sms2', 'sms3', 'sms4')))
        ->from($db->quoteName('#__hajj_users'));
    
    $db->setQuery($query);
    $results = $db->loadObjectList();
    return $results;
  }

/*
|------------------------------------------------------------------------------------
| Get SMS Status
|------------------------------------------------------------------------------------
*/  

}