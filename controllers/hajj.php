<?php
/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http://www.behance.net/kossa
 */
 
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class HajjControllerHajj extends JControllerLegacy
{

  public function setNewHajj(){

    $app = JFactory::getApplication();
    $jinput = $app->input;

    $first_name    = $jinput->get('first_name','','STRING');
    $second_name   = $jinput->get('second_name','','STRING');
    $third_name    = $jinput->get('third_name','','STRING');
    $familly_name  = $jinput->get('familly_name','','STRING');
    $id_number     = $jinput->get('id_number','','STRING');
    $birthday      = $jinput->get('birthday','','STRING');
    $job           = $jinput->get('job','','STRING');
    $rh            = $jinput->get('rh','','STRING');
    $address       = $jinput->get('address','','STRING');
    $mobile        = $jinput->get('mobile','','STRING');
    $email         = $jinput->get('email','','STRING');
    $office_branch = $jinput->get('office_branch','','STRING');
    $hajj_program  = $jinput->get('hajj_program','','STRING');


    require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';
    $userid = HajjFrontendHelper::register_user($id_number, $mobile, $email, $first_name);
    var_dump($userid);


  }

}