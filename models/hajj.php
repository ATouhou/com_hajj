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

class HajjModelHajj extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Set new Hajj
|------------------------------------------------------------------------------------
*/
  public function setNewHajj($object) {
    $db = JFactory::getDbo();
    $result = $db->insertObject('#__hajj_users', $object);
    return $db->insertid();
  }

/*
|------------------------------------------------------------------------------------
| Get Id number
|------------------------------------------------------------------------------------
*/
  public function getIdNumber($ID){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);      
    $query
        ->select($db->quoteName(array('id')))
        ->from($db->quoteName('#__hajj_users'))
        ->where($db->quoteName('id_user') . ' = '. $ID);

    $db->setQuery($query);
    $results = $db->loadObject();
    return $results->id;
  }

/*
|------------------------------------------------------------------------------------
| Set New Hajj Addon
|------------------------------------------------------------------------------------
*/
  public function setNewHajjAddon($object){
    $db = JFactory::getDbo();
    $result = $db->insertObject('#__hajj_users', $object);
    return $db->insertid();
  }


/*
|------------------------------------------------------------------------------------
| Get info Hajj
|------------------------------------------------------------------------------------
*/
  public function getHajj($ID){
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);        
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_users'))
        ->where($db->quoteName('id_user') . ' = '. $ID);
    
    $db->setQuery($query);
    $results = $db->loadObject();
    return $results;
  }



/*
|------------------------------------------------------------------------------------
| Edit Hajj
|------------------------------------------------------------------------------------
*/
  public function setEditHajj($object){

    JFactory::getDbo()->updateObject('#__hajj_users', $object, 'id_user');

    $userObject           = new stdClass();
    $userObject->id       = $object->id_user;
    $userObject->email    = $object->email;
    $userObject->password = md5($object->mobile);
    JFactory::getDbo()->updateObject('#__users', $userObject, 'id');
  }

/*
|------------------------------------------------------------------------------------
| get Register Status
|------------------------------------------------------------------------------------
*/
  public function getRegisterStatus($ID){

    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);
    $query
        ->select($db->quoteName(array('register_status', 'id')))
        ->from($db->quoteName('#__hajj_users'))
        ->where($db->quoteName('id_user') . ' = '. $ID);
    
    $db->setQuery($query);
    $results = $db->loadObject();
    return $results; 
  }

/*
|------------------------------------------------------------------------------------
| get List of addons
|------------------------------------------------------------------------------------
*/ 
public function getAddons($ID){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);
    $query
        ->select("*")
        ->from($db->quoteName('#__hajj_users'))
        ->where($db->quoteName('addon') . ' = '. $ID);
    
    $db->setQuery($query);
    $results = $db->loadObjectList();
    return $results; 
  }

/*
|------------------------------------------------------------------------------------
| Remove Hajj
|------------------------------------------------------------------------------------
*/
  public function removeHajj($ID, $admin=false){ // If admin remove the hajj so we update SMS5

    // Update the status of the HAJJ
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);
    
    $object = new stdClass();
    $object->id_user = $ID;
    $object->register_status = 5;
    if ($admin) {
      $object->sms5 = "تم إلغاء الحجز";
    }
    $result = JFactory::getDbo()->updateObject('#__hajj_users', $object, 'id_user');
    
    
    // Delete user in Joomla
    JUser::getInstance($ID)->delete();
    return $result;
  }

}