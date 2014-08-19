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
class hajjViewToPay extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      $ID = JFactory::getUser()->id;
      $model    = JModelLegacy::getInstance('Hajj', 'HajjModel');
      $this->hajj = $model->getHajj($ID);

      // Check if it's an addon or no
      $this->parent="";
      $parent = $this->hajj->addon;
      if ($parent) {// He's an addon
        $this->parent = $model->getHajjByIdHajj($parent);
      }
      
      parent::display($tpl);
  }

}