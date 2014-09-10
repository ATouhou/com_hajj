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
  public function getMyPayments($id, $offset=0, $limit=0){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('Payments.*', 'HU.first_name', 'HU.register_status AS register_status', 'HP.name AS program_name'))
        ->from($db->quoteName('#__hajj_payments','Payments'))
        ->innerJoin('#__hajj_users as HU on (Payments.id_hajj = HU.id )')
        ->innerJoin('#__hajj_program as HP on (HU.hajj_program = HP.id )')
        ->where($db->quoteName('id_hajj') . ' = '. $id);
    
    $db->setQuery($query, $offset, $limit);
    $obj = new stdClass();
    $obj->results = $db->loadObjectList();

    $db->execute();
    $obj->nbRows= $db->getNumRows();
    
    return $obj;
  }
  
/*
|------------------------------------------------------------------------------------
| Get All Payments
|------------------------------------------------------------------------------------
*/
  public function getPayments($where='', $offset=0, $limit=0){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('Payments.*', 'HU.first_name', 'HU.register_status AS register_status', 'HP.name AS program_name'))
        ->from($db->quoteName('#__hajj_payments','Payments'))
        ->innerJoin('#__hajj_users as HU on (Payments.id_hajj = HU.id )')
        ->innerJoin('#__hajj_program as HP on (HU.hajj_program = HP.id )')
        ->order('id_hajj');

    if ($where!='') {
      $query->where($where);
    }
    
    $db->setQuery($query, $offset, $limit);
    $obj = new stdClass();
    $obj->results = $db->loadObjectList();

    $db->setQuery($query);
    $db->execute();
    $obj->nbRows= $db->getNumRows();
    
    return $obj;
  }
  
/*
|------------------------------------------------------------------------------------
| Get All Payments by Branch
|------------------------------------------------------------------------------------
*/
  public function getPaymentsByBranch($where='', $branch='', $offset=0, $limit=0){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('Payments.*', 'HU.first_name', 'HU.register_status AS register_status', 'HP.name AS program_name'))
        ->from($db->quoteName('#__hajj_payments', 'Payments'))
        ->innerJoin('#__hajj_users as HU on (Payments.id_hajj = HU.id and HU.office_branch = ' . $branch.')')
        ->innerJoin('#__hajj_program as HP on (HU.hajj_program = HP.id )')
        ->order('id_hajj');

    if ($where!='') {
      $query->where($where);
    }
    $db->setQuery($query, $offset, $limit);
    $obj = new stdClass();
    $obj->results = $db->loadObjectList();

    $db->execute();
    $obj->nbRows= $db->getNumRows();
    
    return $obj;
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