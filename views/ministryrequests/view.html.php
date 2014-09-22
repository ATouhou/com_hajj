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
class hajjViewMinistryRequests extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      
      $app         = JFactory::getApplication();
      $jinput      = $app->input;

      $this->id_number       = $jinput->get('id_number','', 'STRING');
      $this->register_status = $jinput->get('register_status','', 'STRING');
      $this->office_branch   = $jinput->get('office_branch','', 'STRING');
      $this->hajj_program    = $jinput->get('hajj_program','', 'STRING');
      $this->sexe            = $jinput->get('sexe','', 'STRING');
      $this->group_id        = $jinput->get('group_id','', 'STRING');

      // construct my where
      $where  = '1 = 1';
      $where .= ($this->id_number!='') ? ' AND id_number = '.$this->id_number: '';
      $where .= ($this->register_status!='') ? ' AND register_status = '.$this->register_status: '';
      $where .= ($this->office_branch!='') ? ' AND office_branch = '.$this->office_branch: '';
      $where .= ($this->hajj_program!='') ? ' AND hajj_program = '.$this->hajj_program: '';
      $where .= ($this->sexe!='') ? ' AND sexe = "'.$this->sexe.'"': '';
      $where .= ($this->group_id!='') ? ' AND group_id = "'.$this->group_id.'"': '';

      $where       .= ' AND gama_status = 0 AND register_status = 6';
      $model        = JModelLegacy::getInstance('admin', 'HajjModel');
      $this->hajjs  = $model->getHajjs(0, 0, $where);
      
      $model        = JModelLegacy::getInstance('groups', 'HajjModel');
      $where        = 'Group.status = 1';
      $this->groups = $model->getAllGroups($where);

      parent::display();
  }

}