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

class HajjModelPersonnels extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Get All Personnels
|------------------------------------------------------------------------------------
*/
  public function getPersonnels($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('personnel.*', 'users.name', 'users.username', 'users.email'))
        ->from($db->quoteName('#__hajj_personnels') . 'AS personnel')
        ->leftJoin('#__users as users ON users.id = personnel.id_user');

    if ($where!='') {
      $query->where($where);
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Set Personnel
|------------------------------------------------------------------------------------
*/
  public function setPersonnel($object){
    $db = JFactory::getDBO();
    
    $result = JFactory::getDbo()->insertObject('#__hajj_personnels', $object);
    return $db->insertid();
  }

/*
|------------------------------------------------------------------------------------
| Edit Personnels
|------------------------------------------------------------------------------------
*/
  public function editPersonnel($object){
    $result = JFactory::getDbo()->updateObject('#__hajj_personnels', $object, "id");
    return $result;
  }
  

}