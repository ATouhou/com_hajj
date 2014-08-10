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
class hajjViewAdminPrograms extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      $model        = JModelLegacy::getInstance('Admin', 'HajjModel');
      $this->data   = $model->getPrograms();
      $jinput       = JFactory::getApplication()->input;
      $id           = $jinput->get('id', 0);
      $this->toEdit = "";
      
      $this->Itemid = $jinput->get("Itemid", 0);
      if ($this->Itemid == 244) {
        $this->readonly = TRUE;
      }else{
        $this->readonly = FALSE;
      }

      if ($id) { // Get the info to edit
        foreach ($this->data as $key => $value) {
          if ($value->id == $id) {
            $this->toEdit = $this->data[$key];
            break;
          }
        }
      }
      parent::display($tpl);
  }

}