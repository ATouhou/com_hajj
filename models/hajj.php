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
    $result = JFactory::getDbo()->insertObject('#__hajj_users', $object);
    return $result;
  }

}