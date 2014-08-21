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
class hajjViewaddons extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      $model      = JModelLegacy::getInstance('Hajj', 'HajjModel');
      
      $id_user    = JFactory::getUser()->id;
      $ID         = $model->getIdNumber($id_user);// Get the Hajj ID
      $this->hajj = $model->getHajj($id_user); // Info of hajj parent

      $this->addons = "";
      if (!$this->hajj->addon) { // This is an addon
        $this->addons = $model->getAddons($ID); // Info of hajj addon
      }
      
      // If we select an id we sould edit it in the form
      $jinput       = JFactory::getApplication()->input;
      $id           = $jinput->get('id', 0);
      $this->toEdit = "";

      if ($id) { // Get the info to edit
        foreach ($this->addons as $key => $value) {
          if ($value->id == $id) {
            $this->toEdit = $this->addons[$key];
            break;
          }
        }
      }

      parent::display($tpl);
  }

}