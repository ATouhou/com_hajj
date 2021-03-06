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
  public function getHajjs($offset=0, $limit=0, $where='', $orderby=""){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_users'));
        
    if ($where!='') {
      $query->where($where);
    }

    if ($orderby!='') {
      $query->order($orderby);
    }
    
    $db->setQuery($query, $offset, $limit);
    $results = $db->loadObjectList();
    
    return $results;
  }

  
/*
|------------------------------------------------------------------------------------
| Get Nb Hajjs
|------------------------------------------------------------------------------------
*/
  public function getNbHajjs($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('id')
        ->from($db->quoteName('#__hajj_users'));
    if ($where!='') {
      $query->where($where);
    }
    
    $db->setQuery($query);
    $db->execute();
    $result = $db->getNumRows();
    
    return $result;
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
  public function getSMS($offset=0, $limit=0){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select($db->quoteName(array('id', 'first_name', 'familly_name', 'register_status', 'sms1', 'sms2', 'sms3', 'sms4')))
        ->from($db->quoteName('#__hajj_users'));
    
    $db->setQuery($query, $offset, $limit);
    $results = $db->loadObjectList();
    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Get Nb SMS
|------------------------------------------------------------------------------------
*/
  public function getNbSMS(){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('id')
        ->from($db->quoteName('#__hajj_users'));
    
    
    $db->setQuery($query);
    $db->execute();
    $result = $db->getNumRows();
    
    return $result;
  }


/*
|------------------------------------------------------------------------------------
| Get All Programs
|------------------------------------------------------------------------------------
*/  
    public function getPrograms(){
      $db = JFactory::getDBO();
    
      $query = $db->getQuery(true);    
      $query
          ->select('*')
          ->from($db->quoteName('#__hajj_program'));
      
      $db->setQuery($query);
      $results = $db->loadObjectList();
      return $results;
    }
   

/*
|------------------------------------------------------------------------------------
| Get All Programs
|------------------------------------------------------------------------------------
*/  
    public function getCamps(){
      $db = JFactory::getDBO();
    
      $query = $db->getQuery(true);    
      $query
          ->select('*')
          ->from($db->quoteName('#__hajj_camps'));
      
      $db->setQuery($query);
      $results = $db->loadObjectList();
      return $results;
    }
   
/*
|------------------------------------------------------------------------------------
| set New Program
|------------------------------------------------------------------------------------
*/   
  public function setProgram($obj){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);
    
    $result = JFactory::getDbo()->insertObject('#__hajj_program', $obj);
    return $result;
  }
   
/*
|------------------------------------------------------------------------------------
| set New Camps
|------------------------------------------------------------------------------------
*/   
  public function setCamps($obj){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);
    
    $result = JFactory::getDbo()->insertObject('#__hajj_camps', $obj);
    return $result;
  }

/*
|------------------------------------------------------------------------------------
| set edit Program
|------------------------------------------------------------------------------------
*/   
  public function setEditProgram($obj){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);

    $result = JFactory::getDbo()->updateObject('#__hajj_program', $obj, 'id');
    return $result;
  }

/*
|------------------------------------------------------------------------------------
| set edit Camps
|------------------------------------------------------------------------------------
*/   
  public function setEditCamps($obj){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);

    $result = JFactory::getDbo()->updateObject('#__hajj_camps', $obj, 'id');
    return $result;
  }


/*
|------------------------------------------------------------------------------------
| Get All Branch
|------------------------------------------------------------------------------------
*/  
    public function getBranchs(){
      $db = JFactory::getDBO();
    
      $query = $db->getQuery(true);    
      $query
          ->select('*')
          ->from($db->quoteName('#__hajj_branch'));
      
      $db->setQuery($query);
      $results = $db->loadObjectList();
      return $results;
    }
   
/*
|------------------------------------------------------------------------------------
| set New Program
|------------------------------------------------------------------------------------
*/   
  public function setBranch($obj){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);
    
    $result = JFactory::getDbo()->insertObject('#__hajj_branch', $obj);
    return $result;
  }

/*
|------------------------------------------------------------------------------------
| set edit Branch
|------------------------------------------------------------------------------------
*/   
  public function setEditBranch($obj){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);

    $result = JFactory::getDbo()->updateObject('#__hajj_branch', $obj, 'id');
    return $result;
  }

/*
|------------------------------------------------------------------------------------
| Get All Benefits
|------------------------------------------------------------------------------------
*/
  public function getBenefits($offset=0, $limit=0, $where='', $having='', $order='HU.id'){
    $db = JFactory::getDBO();    

    // Get the list of HAJJS with the addons
    $query = $db->getQuery(true);    
    $query
        ->select(array('HU.id', 'HU.first_name', 'HU.familly_name', 'HP.name', 'HU.office_branch', 'COUNT(fils.id) AS nb_addon', 'HU.topay', 'HU.paid'))
        ->from($db->quoteName('#__hajj_users', 'HU'))
        ->join('INNER', $db->quoteName('#__hajj_program', 'HP') . 
          ' ON (' . $db->quoteName('HP.id') . ' = ' . $db->quoteName('HU.hajj_program') . ')')
        ->leftJoin('#__hajj_users as fils ON (fils.addon = HU.id AND fils.register_status != 5 AND fils.register_status != 3)')
        ->where($db->quoteName('HU.addon') . ' = 0')
        ->where($db->quoteName('HU.register_status') . ' = 2 ')
        ->group($db->quoteName('HU.id'))
        ->order($db->quoteName($order));

    if ($where!='') {
      $query->where($where);
    }
    
    if ($having!='') {
      $query->having($having);
    }

    $db->setQuery($query, $offset, $limit);
    $Hajjs = $db->loadObjectList();
    
    $db->setQuery($query);
    $db->execute();
    $nbRows = $db->getNumRows();


    // Get the SUM of Payments
    $query = $db->getQuery(true);    
    $query
        ->select(array('id_hajj','sum(amount) AS amount'))
        ->from($db->quoteName('#__hajj_users', 'HU'))
        ->rightJoin('#__hajj_payments as Payment ON Payment.id_hajj = HU.id ')
        ->where($db->quoteName('Payment.status') . ' = 2')
        ->group($db->quoteName('Payment.id_hajj'));
        
    $db->setQuery($query);
    $Payments_tmp = $db->loadObjectList();

    // Recreate the payments array id=>sum
    $Payments = array();
    foreach ($Payments_tmp as $key => $value) {
      $Payments[$value->id_hajj] = $value->amount;
    }

    $results = new stdClass();
    $results->Payments = $Payments;
    $results->Hajjs = $Hajjs;
    $results->nbRows = $nbRows;

    return $results;
  }
  
/*
|------------------------------------------------------------------------------------
| Get price of program
|------------------------------------------------------------------------------------
*/
  public function getPriceProgram($ID){
    $db = JFactory::getDBO();    

    $query = $db->getQuery(true);    
    $query
        ->select($db->quoteName(array('price_program')))
        ->from($db->quoteName('#__hajj_program'))
        ->where($db->quoteName('id') . ' = '. $ID);
    
    $db->setQuery($query);
    $results = $db->loadObject()->price_program;
    
    return $results;
  }

/*
|------------------------------------------------------------------------------------
| set Admin Info
|------------------------------------------------------------------------------------
*/   
  public function setAdminInfo($obj){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);

    $result = JFactory::getDbo()->updateObject('#__hajj_options', $obj, 'name');
    return $result;
  }

/*
|------------------------------------------------------------------------------------
| get Admin Info
|------------------------------------------------------------------------------------
*/   
  public function getAdminInfo(){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('value')
        ->from($db->quoteName('#__hajj_options'))
        ->where($db->quoteName('name') . ' = '. $db->quote('adminInfo'));

    $db->setQuery($query);
    $results = $db->loadObject();
    return json_decode($results->value);
  }

/*
|------------------------------------------------------------------------------------
| get Register Status
|------------------------------------------------------------------------------------
*/   
  public function getRegisterStatus(){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('value')
        ->from($db->quoteName('#__hajj_options'))
        ->where($db->quoteName('name') . ' = '. $db->quote('register_status'));

    $db->setQuery($query);
    $result = $db->loadObject();
    return $result->value;
  }

/*
|------------------------------------------------------------------------------------
| set Admin Register Status
|------------------------------------------------------------------------------------
*/   
  public function setAdminRegisterStatus($obj){
    $db = JFactory::getDBO();
    $query = $db->getQuery(TRUE);

    $result = JFactory::getDbo()->updateObject('#__hajj_options', $obj, 'name');
    return $result;
  }

/*
|------------------------------------------------------------------------------------
| set Combine Addons
|------------------------------------------------------------------------------------
*/   
  public function setCombineAddons($obj){

    //UPDATE `#__hajj_users` SET `addon`=101 WHERE `#__hajj_users`.`id` in (102,103,104)
    //UPDATE `#__hajj_users` SET `addon = 101` WHERE `id in ( 102, 103, 104)`

    $db = JFactory::getDbo();
    $query = $db->getQuery(true);

    $query->update($db->quoteName('#__hajj_users'))
          ->set($db->quoteName('addon') . ' = '.$obj->original)
          ->where($db->quoteName('id') .  'in ( ' . $obj->addons .')');

    $db->setQuery($query);
    $result = $db->query();
    return($result);
  }

/*
|------------------------------------------------------------------------------------
| set Combine Addons
|------------------------------------------------------------------------------------
*/   
  public function setTransferStatus($obj){

    $db = JFactory::getDbo();
    $query = $db->getQuery(true);

    $query->update($db->quoteName('#__hajj_users'))
          ->set($db->quoteName('transfer_status') . ' = '.$obj->transfer_status)
          ->where($db->quoteName('id') .  'in ( ' . $obj->id .')');

    $db->setQuery($query);
    $result = $db->query();
    return($result);
  }

/*
|------------------------------------------------------------------------------------
| set 1 for empty register_status
|------------------------------------------------------------------------------------
*/
  public function updateEmptyStatus(){
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
     
    // Fields to update.
    $fields = array(
        $db->quoteName('register_status') . ' = "1"' 
    );
     
    // Conditions for which records should be updated.
    $conditions = array(
        $db->quoteName('register_status') . ' = ""' 
    );
     
    $query->update($db->quoteName('#__hajj_users'))->set($fields)->where($conditions);
     
    $db->setQuery($query);
     
    $result = $db->query();
  }

/*
|------------------------------------------------------------------------------------
| Accept a Hajj
|------------------------------------------------------------------------------------
*/
  public function updateHajj($obj){
    return JFactory::getDbo()->updateObject('#__hajj_users', $obj, 'id');
  }   

/*
|------------------------------------------------------------------------------------
| Accept a Hajj
|------------------------------------------------------------------------------------
*/
  public function updateHajjByNumGroup($old_num, $group_num){
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
     
    // Fields to update.
    $fields = array(
        $db->quoteName('group_id') . ' = ' . $group_num
    );
     
    // Conditions for which records should be updated.
    $conditions = array(
        $db->quoteName('group_id') . ' = ' . $old_num
    );
     
    $query->update($db->quoteName('#__hajj_users'))->set($fields)->where($conditions);
    $db->setQuery($query);
    $result = $db->query();
  }   

/*
|------------------------------------------------------------------------------------
| get Hajjs with Document 
|------------------------------------------------------------------------------------
*/
  public function getHajjWithDocument($where=""){
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query
        ->select(array('HU.*', 'Documents.document', 'Documents.link'))
        ->from($db->quoteName('#__hajj_users', 'HU'))
        ->innerjoin('#__hajj_documents as Documents ON (Documents.id_hajj = HU.id)')
        ->order('HU.id');
    
    if ($where!="") {
      $query->where($where);
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();

    return $results;
  }

/*
|------------------------------------------------------------------------------------
| Get addon
|------------------------------------------------------------------------------------
*/
  public function getAddonHajjs($where){
    $db = JFactory::getDBO();    

    // Get the list of HAJJS with the addons
    $query = $db->getQuery(true);    
    $query
        ->select(array('HU.*', 'COUNT(fils.id) AS nb_addon', 'HP.name AS program_name', 'HB.name AS branch_name' ))
        ->from($db->quoteName('#__hajj_users', 'HU'))
        ->join('INNER', $db->quoteName('#__hajj_program', 'HP') . 
          ' ON (' . $db->quoteName('HP.id') . ' = ' . $db->quoteName('HU.hajj_program') . ')')
        ->join('INNER', $db->quoteName('#__hajj_branch', 'HB') . 
          ' ON (' . $db->quoteName('HB.id') . ' = ' . $db->quoteName('HU.office_branch') . ')')

        ->leftJoin('#__hajj_users as fils ON (fils.addon = HU.id AND fils.register_status != 5 AND fils.register_status != 3)')
        ->where($db->quoteName('HU.addon') . ' = 0')
        ->where($db->quoteName('HU.group_id') . ' = 0')
        ->group($db->quoteName('HU.id'));

    if ($where!='') {
      $query->where($where);
    }

    $db->setQuery($query);
    $results = $db->loadObjectList();

    $Hajjs=array();
    // select only nb_addon>0
    foreach ($results as $key => $value) {
      if ($value->nb_addon!=0) {
       array_push( $Hajjs, $value);
      }
    }

    return $Hajjs;
    
  }

}