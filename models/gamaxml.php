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

class HajjModelGamaXML extends JModelLegacy {

/*
|------------------------------------------------------------------------------------
| Set the content
|------------------------------------------------------------------------------------
*/
  public function setXMLContent($XMLObject){
    $db = JFactory::getDBO();
    $result = $db->insertObject('#__hajj_gama_xml', $XMLObject);
    return $db->insertid();
  }

  public function getXMLObject($id){
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);    
    $query
        ->select('*')
        ->from($db->quoteName('#__hajj_gama_xml'))
        ->where($db->quoteName('id') . ' = '. $id);
    
    $db->setQuery($query);
    $results = $db->loadObject();
    return $results;
  }

}