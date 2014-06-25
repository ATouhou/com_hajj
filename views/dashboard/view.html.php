<?php
/**
 * @version     1.0.0
 * @package     com_weandlife
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http://www.behance.net/kossa
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Weandlife.
 */
class hajjViewDashBoard extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      $app = JFactory::getApplication();
      $jinput = $app->input;
      $this->id    = $jinput->get('id','0','STRING');
      parent::display($tpl);
  }

}