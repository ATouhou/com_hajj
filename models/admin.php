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
  public function getHajjs($offset=0, $limit=0){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_users'));
    
    $db->setQuery($query, $offset, $limit);
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
  public function getBenefits(){
    $db = JFactory::getDBO();    

    $query = $db->getQuery(true);    
    $query
        ->select(array('SUM(Payments.amount) AS amount', 'HU.id', 'HU.first_name', 'HU.familly_name', 'HP.name', 'COUNT(fils.id) AS nb_addon', 'HU.topay', 'HU.paid'))
        ->from($db->quoteName('#__hajj_users', 'HU'))
        ->join('INNER', $db->quoteName('#__hajj_program', 'HP') . 
          ' ON (' . $db->quoteName('HP.id') . ' = ' . $db->quoteName('HU.hajj_program') . ')')
        ->leftJoin('#__hajj_users as fils ON fils.addon = HU.id ')
        ->leftJoin('#__hajj_payments as Payments on Payments.id_hajj = HU.id')
        ->group($db->quoteName('HU.id'))
        ->where($db->quoteName('HU.addon') . ' = 0 AND HU.register_status = 2')
        ->order($db->quoteName('HU.id'));
    
    $db->setQuery($query);
    $results = $db->loadObjectList();
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

}