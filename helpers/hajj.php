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


  public static function register_user ($id_number, $mobile, $email, $first_name){ 
      
    $firstname = $first_name; // generate $firstname
    $username = $id_number; // username is the same as user


    /*
    I handle this code as if it is a snippet of a method or function!!

    First set up some variables/objects     */

    // get the ACL
    $acl = JFactory::getACL();

    /* get the com_user params */

    jimport('joomla.application.component.helper'); // include libraries/application/component/helper.php
    $usersParams = JComponentHelper::getParams( 'com_users' ); // load the Params

    // "generate" a new JUser Object
    $user = JFactory::getUser(); // it's important to set the "0" otherwise your admin user information will be loaded

    $data = array(); // array for all user settings

    // get the default usertype
    $usertype = $usersParams->get( 'new_usertype' );
    if (!$usertype) {
        $usertype = 'Registered';
    }

    // set up the "main" user information

    //original logic of name creation
    $data['name'] = $firstname; // add first- and lastname

    $data['username'] = $username; // add username
    $data['email'] = $email; // add email

    /* no need to add the usertype, it will be generated automaticaly from the gid */

    $data['password'] = $mobile; // set the password
    $data['password2'] = $mobile; // confirm the password
    $data['sendEmail'] = 1; // should the user receive system mails?

    /* Now we can decide, if the user will need an activation */

    $data['block'] =0; // don't block the user
    $data['activation'] =0; // don't block the user


    $data['groups'] =array("1","2"); // don't block the user


    /*if (!$user->bind($data)) { // now bind the data to the JUser Object, if it not works....

        JError::raiseWarning('', JText::_( $user->getError())); // ...raise an Warning
        return false; // if you're in a method/function return false

    }

    if (!$user->save()) { // if the user is NOT saved...

        JError::raiseWarning('', JText::_( $user->getError())); // ...raise an Warning
        return false; // if you're in a method/function return false

    }*/


    var_dump($data);
    //$user->bind($data);
    if ($user->save($data)) {
      echo "saved";
    }else{
      var_dump($user->getError());
    }

    $app = JFactory::getApplication();
    $app->logout();
    return $user; // else return the new JUser object
      
   }
}
