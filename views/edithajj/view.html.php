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
class hajjViewEditHajj extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      $app = JFactory::getApplication();
      $ID = JFactory::getUser()->id;
      $model    = JModelLegacy::getInstance('Hajj', 'HajjModel');
      $this->data = $model->getHajj($ID);

      // If Empty Data
      if (is_null($this->data)) {
        $app->redirect("index.php");
      }

      // Check if is addon or not
      $this->is_addon = ($this->data->addon) ? True : False;

      if (strpos($this->data->email, "gmail.ww")) {
        $this->data->email = "";
      }
      parent::display($tpl);
  }

}