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
class hajjViewAcceptHajj extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
      {   
      $jinput  = JFactory::getApplication()->input;
      $offset  = $jinput->get('p','1');
      $Itemid  = $jinput->get('Itemid','0', 'STRING');
      
      // Pagination
      $limit   = 20;
      $start   = ($offset - 1) * $limit ;
      $model   = JModelLegacy::getInstance('Admin', 'HajjModel');
      $where   = 'register_status = 1';
      
      $user_id = JFactory::getUser()->id;
      $group   = JAccess::getGroupsByUser($user_id, false)[0];

      $this->manager = false;

      if ($group == 12) { // This is a Manager
        $personnelsModel = JModelLegacy::getInstance('Personnels', 'HajjModel'); // Get the model
        $office_branch   = $personnelsModel->getPersonnels('id_user = '.$user_id)[0]->office_branch; // Get the branch
        $where          .= ' AND office_branch = ' . $office_branch; // Set the branch for the select
        $this->manager   = true;
      }

      $this->result  = $model->getHajjs($start, $limit,$where);
      $this->nbHajjs = $model->getNbHajjs($where);
      $this->start   = $offset;
      $this->Itemid  = $Itemid;

      parent::display($tpl);
  }

}