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

class HajjModelStats extends JModelLegacy {

    /*
    08 -> Super Users
    10 -> HajjAdmin
    11 -> HajjFinance
    12 -> HajjManager
  */
/*
|------------------------------------------------------------------------------------
| Get Status By Status register
|------------------------------------------------------------------------------------
*/
  public function getRegister($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('register_status', 'count(register_status) as count'))
        ->from($db->quoteName('#__hajj_users'))
        ->group($db->quoteName('register_status'));
    if ($where != '') {
        $query->where($where);
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }


/*
|------------------------------------------------------------------------------------
| Get Status By Branch
|------------------------------------------------------------------------------------
*/
  public function getSimpleBranch($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('branch.id as id_branch','branch.name as office_branch', 'count(*) as count'))
        ->from($db->quoteName('#__hajj_users', 'HU'))
        ->where($db->quoteName('register_status') . ' = 1 OR ' . $db->quoteName('register_status') . ' = 2 OR ' . $db->quoteName('register_status') . ' = 4 ')
        ->group($db->quoteName('office_branch'))
        ;

    if ($where != '') {
        $query->innerJoin('#__hajj_branch as branch ON (branch.id=HU.office_branch AND '.$where.')');
    }else{
        $query->innerJoin('#__hajj_branch as branch ON (branch.id=HU.office_branch)');
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }


/*
|------------------------------------------------------------------------------------
| Get Status By Branch
|------------------------------------------------------------------------------------
*/
  public function getBranch($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('branch.id as id_branch','branch.name as office_branch', 'sexe','HP.id AS id_program', 'HP.name AS hajj_program', 'count(*) as count'))
        ->from($db->quoteName('#__hajj_users', 'HU'))
        ->innerJoin('#__hajj_program as HP ON (HP.id = HU.hajj_program)')
        ->where($db->quoteName('register_status') . ' = 1 OR ' . $db->quoteName('register_status') . ' = 2 OR ' . $db->quoteName('register_status') . ' = 4 ')
        ->group($db->quoteName('office_branch'))
        ->group($db->quoteName('hajj_program'))
        ->group($db->quoteName('sexe'))
        ;

    if ($where != '') {
        $query->innerJoin('#__hajj_branch as branch ON (branch.id=HU.office_branch AND '.$where.')');
    }else{
        $query->innerJoin('#__hajj_branch as branch ON (branch.id=HU.office_branch)');
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }


/*
|------------------------------------------------------------------------------------
| Get Status By Program
|------------------------------------------------------------------------------------
*/
  public function getProgram($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('program.id','program.name', 'count(hajj_program) as count'))
        ->from($db->quoteName('#__hajj_users', 'HU'))
        ->where($db->quoteName('HU.register_status') . ' = 1 OR ' . $db->quoteName('HU.register_status') . ' = 2 OR ' . $db->quoteName('HU.register_status') . ' = 4 ')
        ->group($db->quoteName('hajj_program'));
    if ($where!='') {
        $query->innerJoin('#__hajj_program as program ON (program.id=HU.hajj_program AND '.$where.')');
    }else{
        $query->innerJoin('#__hajj_program as program ON (program.id=HU.hajj_program)');
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }

/*
|------------------------------------------------------------------------------------
| Get Status By Sexe
|------------------------------------------------------------------------------------
*/
  public function getSexe($where=''){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('sexe', 'count(sexe) as count'))
        ->from($db->quoteName('#__hajj_users'))
        ->where($db->quoteName('register_status') . ' = 1 OR ' . $db->quoteName('register_status') . ' = 2 OR ' . $db->quoteName('register_status') . ' = 4 ')
        ->group($db->quoteName('sexe'))
        ->order($db->quoteName('sexe'). ' DESC');
    if ($where != '') {
        $query->where($where);
    }
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }
/*
|------------------------------------------------------------------------------------
| Get Status By Sexe
|------------------------------------------------------------------------------------
*/
  public function getNationality($where){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('nationality', 'count(nationality) as count'))
        ->from($db->quoteName('#__hajj_users'))
        ->where($db->quoteName('register_status') . ' = 1 OR ' . $db->quoteName('register_status') . ' = 2 OR ' . $db->quoteName('register_status') . ' = 4 ')
        ->group($db->quoteName('nationality'));
    if ($where != '') {
        $query->where($where);
    }    
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }


}