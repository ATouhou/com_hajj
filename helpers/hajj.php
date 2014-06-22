<?php

/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http://www.behance.net/kossa
 */
defined('_JEXEC') or die;

class HajjFrontendHelper {

/*
|------------------------------------------------------------------------------------
| Register new User "Hajj"
|------------------------------------------------------------------------------------
*/
  public static function register_user ($id_number, $mobile, $email, $first_name){ 
      
    jimport('joomla.user.helper');
    
    $data = array(
      "name"=>$first_name,
      "username"=>$id_number,
      "password"=>$mobile,
      "password2"=>$mobile,
      "email"=>$email,
      "block"=>0,
      "groups"=>array("1","2")
    );

    $user = new JUser;
    //Write to database
    if(!$user->bind($data)) {
      throw new Exception("Could not bind data. Error: " . $user->getError());
    }
    if (!$user->save()) {
    //throw new Exception("Could not save user. Error: " . $user->getError());
    echo "<br>Could not save user $first_name - " . $user->getError();
    }
    return $user->id;
   }

/*
|------------------------------------------------------------------------------------
| Auto login after register
|------------------------------------------------------------------------------------
*/
  public function autologin($username, $password){

    $credentials = array();
    $credentials['username'] = $username;
    $credentials['password'] = $password;
    $options = array();
    
    $app = JFactory::getApplication();
    $rslt = $app->login( $credentials, $options );
  }      
}
