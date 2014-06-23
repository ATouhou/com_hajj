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

/*
|------------------------------------------------------------------------------------
| Set New Hajj
|------------------------------------------------------------------------------------
*/
  public function setNewHajj(){

    $app = JFactory::getApplication();
    $jinput = $app->input;

    $first_name    = $jinput->get('first_name','','STRING');
    $second_name   = $jinput->get('second_name','','STRING');
    $third_name    = $jinput->get('third_name','','STRING');
    $familly_name  = $jinput->get('familly_name','','STRING');
    $sexe          = $jinput->get('sexe','','STRING');
    $nationality   = $jinput->get('nationality','','STRING');
    $id_number     = $jinput->get('id_number','','STRING');
    $birthday      = $jinput->get('birthday1','','STRING') . '/';
    $birthday      .= $jinput->get('birthday2','','STRING') . '/';
    $birthday      .= $jinput->get('birthday3','','STRING');
    $job           = $jinput->get('job','','STRING');
    $rh            = $jinput->get('rh','','STRING');
    $address       = $jinput->get('address','','STRING');
    $mobile        = $jinput->get('mobile','','STRING');
    $email         = $jinput->get('email','','STRING');
    $office_branch = $jinput->get('office_branch','','STRING');
    $hajj_program  = $jinput->get('hajj_program','','STRING');


    require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';
    $id_user = HajjFrontendHelper::register_user($id_number, $mobile, $email, $first_name);
    //var_dump($userid);

    if ($id_user == 0) { // Problem
      $app->redirect("index.php?option=com_hajj&view=newhajj", 
      "عذرا..رقم الهوية مسجل لدينا",
      'danger');
    }

    $id = $this->getModel('hajj')->setnewHajj(
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
      $hajj_program
    );

    // Auto login
    HajjFrontendHelper::autologin($id_number, $mobile);

    $app->redirect("index.php?option=com_hajj&view=newhajjaddon", 
      "شكرا لك على رغبتك في الحج معنا...رقم حجزك : $id <br>يمكنك تسجيل الدخول للموقع والاستفادة من خدماتنا باستخدما اسم المستخدم وكلمة السر: رقم الهوية و الجوال",
      'success');
  }

/*
|------------------------------------------------------------------------------------
| Set Hajj Addon
|------------------------------------------------------------------------------------
*/
  public function setnewHajjAddon(){
    $app = JFactory::getApplication();
    $jinput = $app->input;

    $id_number     = $jinput->get('id_number', '', 'STRING');
    $addon         = $jinput->get('addon', '', 'STRING');
    $email         = $jinput->get('email', '', 'STRING');
    $first_name    = $jinput->get('first_name', '', 'STRING');
    $mobile        = $jinput->get('mobile', '', 'STRING');
    $second_name   = $jinput->get('second_name', '', 'STRING');
    $office_branch = $jinput->get('office_branch', '', 'STRING');
    $third_name    = $jinput->get('third_name', '', 'STRING');
    $hajj_program  = $jinput->get('hajj_program', '', 'STRING');
    $familly_name  = $jinput->get('familly_name', '', 'STRING');

    $id_user = $this->getModel('Hajj')->setNewHajjAddon($id_number,
        $addon,
        $email,
        $first_name,
        $mobile,
        $second_name,
        $office_branch,
        $third_name,
        $hajj_program,
        $familly_name
    );

    $app->redirect("index.php?option=com_hajj&view=newhajjaddon", 
      "شكرا لك على رغبتك في الحج معنا...رقم حجزك : $id_user <br>يمكنك تسجيل الدخول للموقع والاستفادة من خدماتنا باستخدما اسم المستخدم وكلمة السر: رقم الهوية و الجوال",
      'success');
    
  }
  

}