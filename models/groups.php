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

class HajjModelGroups extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Get All Groups
|------------------------------------------------------------------------------------
*/
  public function getGroups($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('Group.id', 'Group.num_group', 'Group.name', 'Group.status', 'count(users.group_id) as count' ))
        ->from($db->quoteName('#__hajj_group', 'Group'))
        ->leftJoin('#__hajj_users as users ON users.group_id = Group.num_group')
        ->group($db->quoteName('users.group_id'))
        ->order($db->quoteName('Group.num_group'));

    if ($where!='') {
      $query->where($where);
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Get All Groups Member
|------------------------------------------------------------------------------------
*/
  public function getGroupsMember($where=''){
    $db = JFactory::getDBO();

    $query = $db->getQuery(true);
    $query
        ->select(array('Group.num_group', 'Group.name', 'users.id_number', 'users.first_name', 'users.order_in_group'))
        ->from($db->quoteName('#__hajj_group' , 'Group'))
        ->innerJoin('#__hajj_users as users ON users.group_id = Group.num_group');

    if ($where!='') {
      $query->where($where);
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Set Group
|------------------------------------------------------------------------------------
*/
  public function setGroup($object){
    $db = JFactory::getDBO();
    
    $result = JFactory::getDbo()->insertObject('#__hajj_group', $object);
    return $db->insertid();
  }

/*
|------------------------------------------------------------------------------------
| Edit Groups
|------------------------------------------------------------------------------------
*/
  public function editGroup($object){
    $result = JFactory::getDbo()->updateObject('#__hajj_group', $object, "id");
    return $result;
  }
  

}