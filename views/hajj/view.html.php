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
class hajjViewHajj extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      /*
        08 -> Super Users
        10 -> HajjAdmin
        11 -> HajjFinance
        12 -> HajjManager
      */
      $app = JFactory::getApplication();
      $user_id = JFactory::getUser()->id;
      $group   = JAccess::getGroupsByUser($user_id, false)[0];

      // Check privilege
      if ($group != 8 && $group != 10 && $group != 11 && $group != 12 ) {
        return JError::raiseWarning(404, "you have not access to this page");
      }

      $where   = "1=1";

      if($group == 12){// this is a manager :)
        $modelPersonnels = JModelLegacy::getInstance('Personnels', 'HajjModel');
        $office_branch   = $modelPersonnels->getPersonnels('users.id = '.$user_id)[0]->office_branch;
        $where          .= ' AND office_branch = '.$office_branch;
      }

      $modelStat      = JModelLegacy::getInstance('Stats', 'HajjModel');
      $modelAdmin     = JModelLegacy::getInstance('Admin', 'HajjModel');
      
      $this->Program  = $modelStat->getProgram($where);
      $this->Register = $modelStat->getRegister($where);
      $this->Sexe     = $modelStat->getSexe($where);
      $this->Branch   = $modelStat->getSimpleBranch($where);
      $where         .=' AND register_status = 1';
      $orderby        = 'id DESC';
      $this->NewHajjs = $modelAdmin->getHajjs(0,10, $where, $orderby);

      parent::display($tpl);
  }

}