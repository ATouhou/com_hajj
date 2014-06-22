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
  public function setnewHajj(
    $id_user,
    $first_name,
    $second_name,
    $third_name,
    $familly_name,
    $sexe,
    $nationality,
    $id_number,
    $birthday,
    $job,
    $rh,
    $address,
    $mobile,
    $email,
    $office_branch,
    $hajj_program)
  {
    $object = new stdClass();
    $object->id_user       = $id_user;
    $object->first_name    = $first_name;
    $object->second_name   = $second_name;
    $object->third_name    = $third_name;
    $object->familly_name  = $familly_name;
    $object->sexe          = $sexe;
    $object->nationality   = $nationality;
    $object->id_number     = $id_number;
    $object->birthday      = $birthday;
    $object->job           = $job;
    $object->rh            = $rh;
    $object->address       = $address;
    $object->mobile        = $mobile;
    $object->email         = $email;
    $object->office_branch = $office_branch;
    $object->hajj_program  = $hajj_program;

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
  public function setNewHajjAddon($id_number, $addon, $email, $first_name, $mobile, $second_name, $office_branch, $third_name, $hajj_program, $familly_name){
    $object = new stdClass();

    $object->id_number     = $id_number; 
    $object->addon         = $addon; 
    $object->email         = $email; 
    $object->first_name    = $first_name; 
    $object->mobile        = $mobile; 
    $object->second_name   = $second_name; 
    $object->office_branch = $office_branch; 
    $object->third_name    = $third_name; 
    $object->hajj_program  = $hajj_program; 
    $object->familly_name  = $familly_name; 

    $db = JFactory::getDbo();
    $result = $db->insertObject('#__hajj_users', $object);
    return $db->insertid();
  }


/*
|------------------------------------------------------------------------------------
| Test
|------------------------------------------------------------------------------------
*/
  public function test(){
    echo "test";
  }

}