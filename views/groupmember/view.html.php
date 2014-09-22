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
class hajjViewGroupMember extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      $model           = JModelLegacy::getInstance('Groups', 'HajjModel');
      $this->groups    = $model->getGroups();
      $jinput          = JFactory::getApplication()->input;
      
      // Get the filter
      $this->id_number = $jinput->get('idnumber');
      $this->group     = $jinput->get('group');
      
      // Contruct the where
      $where           = '1=1';
      $where          .= ($this->id_number!=0)? ' AND users.id_number = '.$this->id_number : '';
      $where          .= ($this->group!=0)? ' AND users.group_id = '.$this->group : '';
      $this->data      = $model->getGroupsMember($where);
      
      $modelHajj       = JModelLegacy::getInstance('Admin', 'HajjModel');
      $where           = 'register_status != 3 AND register_status != 5 AND register_status != 9';
      $this->hajjs     = $modelHajj->getHajjs(0, 0, $where);
      
      
      $id              = $jinput->get('id', 0);
      $this->toEdit    = "";
      
      $this->Itemid    = $jinput->get("Itemid", 0);
      
      if ($id) { // Get the info to edit
        foreach ($this->data as $key => $value) {
          if ($value->id == $id) {
            $this->toEdit = $this->data[$key];
            break;
          }
        }
      }

      // get groups

      parent::display($tpl);
  }

}