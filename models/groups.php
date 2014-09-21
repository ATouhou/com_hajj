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
        ->select('*')
        ->from($db->quoteName('#__hajj_group') , 'group');
        //->leftJoin('#__users as users ON users.id = group.id_user');

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