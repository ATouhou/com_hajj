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
class hajjViewStatNationality extends JViewLegacy
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
      $user_id = JFactory::getUser()->id;
      $group   = JAccess::getGroupsByUser($user_id, false)[0];
      $where   = "";

      if($group == 12){// this is a manager :)
        $modelPersonnels = JModelLegacy::getInstance('Personnels', 'HajjModel');
        $office_branch = $modelPersonnels->getPersonnels('users.id = '.$user_id)[0]->office_branch;
        $where = 'office_branch = '.$office_branch;
      }
      $model      = JModelLegacy::getInstance('Stats', 'HajjModel');
      $this->data = $model->getNationality($where);

      parent::display($tpl);
  }

}