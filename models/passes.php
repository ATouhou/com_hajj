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

class HajjModelPasses extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Get All Passes
|------------------------------------------------------------------------------------
*/
  public function getPasses($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('Passes.*', 'HU.first_name', 'HU.id_number', 'HU.sexe', 'HU.relationship', 'HU.nationality'))
        ->from($db->quoteName('#__hajj_passes','Passes'))
        ->leftJoin('#__hajj_users as HU ON HU.id = Passes.id_hajj')
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
| Set Passe
|------------------------------------------------------------------------------------
*/
  public function setPasse($object){
    $db = JFactory::getDBO();
    
    $result = JFactory::getDbo()->insertObject('#__hajj_passes', $object);
    return $db->insertid();
  }

/*
|------------------------------------------------------------------------------------
| Edit Passes
|------------------------------------------------------------------------------------
*/
  public function editPasse($object){
    $result = JFactory::getDbo()->updateObject('#__hajj_passes', $object, "id");
    return $result;
  }
  

}