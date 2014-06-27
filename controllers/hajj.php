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

    $obj                = new stdClass();
    $obj->first_name    = $jinput->get('first_name','','STRING');
    $obj->second_name   = $jinput->get('second_name','','STRING');
    $obj->third_name    = $jinput->get('third_name','','STRING');
    $obj->familly_name  = $jinput->get('familly_name','','STRING');
    $obj->sexe          = $jinput->get('sexe','','STRING');
    $obj->nationality   = $jinput->get('nationality','','STRING');
    $obj->id_number     = $jinput->get('id_number','','STRING');
    $obj->birthday      = $jinput->get('birthday1','','STRING') . '/';
    $obj->birthday     .= $jinput->get('birthday2','','STRING') . '/';
    $obj->birthday     .= $jinput->get('birthday3','','STRING');
    $obj->job           = $jinput->get('job','','STRING');
    $obj->rh            = $jinput->get('rh','','STRING');
    $obj->address       = $jinput->get('address','','STRING');
    $obj->mobile        = $jinput->get('mobile','','STRING');
    $obj->email         = $jinput->get('email','','STRING');
    $obj->office_branch = $jinput->get('office_branch','','STRING');
    $obj->hajj_program  = $jinput->get('hajj_program','','STRING');
    $obj->addon         = JFactory::getUser()->id;


    require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';
    $id_user = HajjFrontendHelper::register_user($obj->id_number, $obj->mobile, $obj->email, $obj->first_name);
    //var_dump($userid);

    if ($id_user == 0) { // Problem
      $app->redirect("index.php?option=com_hajj&view=newhajj", 
      "عذرا..رقم الهوية مسجل لدينا",
      'danger');
    }

    $obj->id_user = $id_user;
    $id = $this->getModel('hajj')->setNewHajj($obj);

    if ($obj->addon != 0) {// Addon
        $app->redirect("index.php?option=com_hajj&view=addons", "تم إضافة المرافق بنجاح", "success");
    }else{ // New hajj
        // Auto login
        HajjFrontendHelper::autologin($obj->id_number, $obj->mobile);
        $app->redirect("index.php?option=com_hajj&view=dashboard&id=".$id);
    }
  }

/*
|------------------------------------------------------------------------------------
| Edit Hajj 
|------------------------------------------------------------------------------------
*/
  public function setEditHajj(){
    $app = JFactory::getApplication();
    $jinput = $app->input;

    $obj = new stdClass();
    $obj->id_user       = $jinput->get('id_user','','STRING');
    $obj->first_name    = $jinput->get('first_name','','STRING');
    $obj->second_name   = $jinput->get('second_name','','STRING');
    $obj->third_name    = $jinput->get('third_name','','STRING');
    $obj->familly_name  = $jinput->get('familly_name','','STRING');
    $obj->sexe          = $jinput->get('sexe','','STRING');
    $obj->nationality   = $jinput->get('nationality','','STRING');
    $obj->birthday      = $jinput->get('birthday1','','STRING') . '/';
    $obj->birthday     .= $jinput->get('birthday2','','STRING') . '/';
    $obj->birthday     .= $jinput->get('birthday3','','STRING');
    $obj->job           = $jinput->get('job','','STRING');
    $obj->rh            = $jinput->get('rh','','STRING');
    $obj->address       = $jinput->get('address','','STRING');
    $obj->mobile        = $jinput->get('mobile','','STRING');
    $obj->email         = $jinput->get('email','','STRING');
    $obj->office_branch = $jinput->get('office_branch','','STRING');
    $obj->hajj_program  = $jinput->get('hajj_program','','STRING');

    $this->getModel('Hajj')->setEditHajj($obj);
    $app->redirect("index.php?option=com_hajj&view=edithajj", 
      "تم التعديل بنجاح",
      'success');
  }


}