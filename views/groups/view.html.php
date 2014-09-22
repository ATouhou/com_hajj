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
class hajjViewGroups extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      $jinput       = JFactory::getApplication()->input;
      $model        = JModelLegacy::getInstance('Groups', 'HajjModel');
      $num_group    = $jinput->get("group", "");
      $where        = ($num_group != "") ? 'Group.num_group = '.$num_group: '';
      $this->data   = $model->getGroups($where);
      $id           = $jinput->get('id', 0);
      $this->toEdit = "";
      
      $this->Itemid = $jinput->get("Itemid", 0);
      
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