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
|------------------------------------------------------------------------------------
| Get Status By Status register
|------------------------------------------------------------------------------------
*/
  public function getRegister(){
    $db = JFactory::getDBO();
    
    $query = $db->getQuery(true);    
    $query
        ->select(array('register_status', 'count(register_status) as count'))
        ->from($db->quoteName('#__hajj_users'))
        ->group($db->quoteName('register_status'));
    $db->setQuery($query);
    $results = $db->loadObjectList();
    
    return $results;
  }


}