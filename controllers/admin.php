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

class HajjControllerAdmin extends JControllerLegacy
{

/*
|------------------------------------------------------------------------------------
| Change the construct
|------------------------------------------------------------------------------------
*/
  public function __construct(){
   
    if (!JFactory::getUser()->authorise('core.manage', 'com_hajj'))
    {
      return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
    }
    parent::__construct();
  }

/*
|------------------------------------------------------------------------------------
| Get List of hajjs
|------------------------------------------------------------------------------------
*/
  public function Hajjs(){
    $result = $this->getModel("Admin")->getHajjs();

    $view   = $this->getView('adminhajjs', 'html'); //get the view
    $view->assignRef('data', $result); // assign data from the model
    $view->display(); // display the view
  }

/*
|------------------------------------------------------------------------------------
| Get only one Hajj
|------------------------------------------------------------------------------------
*/
  public function Hajj(){
    $jinput = JFactory::getApplication()->input;

    $id = $jinput->get('id','','STRING');

    $result = $this->getModel("Admin")->getHajj($id);

    $view   = $this->getView('adminhajj', 'html'); //get the view
    $view->assignRef('data', $result); // assign data from the model
    $view->display(); // display the view
  }

/*
|------------------------------------------------------------------------------------
| 
|------------------------------------------------------------------------------------
*/




}