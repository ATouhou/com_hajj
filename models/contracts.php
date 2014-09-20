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

class HajjModelContracts extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Get All Contracts
|------------------------------------------------------------------------------------
*/
  public function getContracts($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('Contracts.*', 'HU.first_name', 'HU.familly_name', 'HU.office_branch', 'HU.hajj_program', 'HU.addon' ))
        ->from($db->quoteName('#__hajj_contracts','Contracts'))
        ->leftJoin('#__hajj_users as HU ON HU.id = Contracts.id_hajj')
        ->where('register_status = ' . 7);// only hajj = Tasrih

    if ($where!='') {
      $query->where($where);
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Set Contract
|------------------------------------------------------------------------------------
*/
  public function setContract($object){
    $db = JFactory::getDBO();
    
    $result = JFactory::getDbo()->insertObject('#__hajj_contracts', $object);
    return $db->insertid();
  }

/*
|------------------------------------------------------------------------------------
| Edit Contracts
|------------------------------------------------------------------------------------
*/
  public function editContract($object){
    $result = JFactory::getDbo()->updateObject('#__hajj_contracts', $object, "id");
    return $result;
  }
  

}