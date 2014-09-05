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
class hajjViewSpeedSearch extends JViewLegacy
{
  /*
    08 -> Super Users
    10 -> HajjAdmin
    11 -> HajjFinance
    12 -> HajjManager
  */
  private $allowedGroup = array(8,10,11,12);
  private $group;
  private $user_id;

  public function __construct(){
   
    $this->user_id = JFactory::getUser()->id;
    $this->group   = JAccess::getGroupsByUser($this->user_id, false)[0];

    parent::__construct();
  }


  /**
   * Display the view
   */
  public function display($tpl = null)
  {   

      $jinput       = JFactory::getApplication()->input;
      $id           = $jinput->get('id','');
      $first_name   = $jinput->get('first_name','', 'STRING');
      $second_name  = $jinput->get('second_name','', 'STRING');
      $third_name   = $jinput->get('third_name','', 'STRING');
      $familly_name = $jinput->get('familly_name','', 'STRING');
      $id_number    = $jinput->get('id_number','');
      $mobile       = $jinput->get('mobile','');

      $where='1=1 ';
      if ($this->group == 12) { // This is a Manager
        $personnelsModel =  JModelLegacy::getInstance('Personnels', 'HajjModel'); // Get the model
        $office_branch   = $personnelsModel->getPersonnels('id_user = '.$this->user_id)[0]->office_branch; // Get the branch
        $where           .= ' AND office_branch = ' . $office_branch; // Set the branch for the select
      }

      $where .= ($id!='') ? ' AND id = '.$id: '';
      $where .= ($first_name!='') ? ' AND first_name = "'.$first_name.'"': '';
      $where .= ($second_name!='') ? ' AND second_name = "'.$second_name.'"': '';
      $where .= ($third_name!='') ? ' AND third_name = "'.$third_name.'"': '';
      $where .= ($familly_name!='') ? ' AND familly_name = "'.$familly_name.'"': '';
      $where .= ($id_number!='') ? ' AND id_number = '.$id_number: '';
      $where .= ($mobile!='') ? ' AND mobile = '.$mobile: '';


      $this->hajj = "";
      if ($id!="" || $id_number!="" || $mobile!="" || $first_name != "" || $second_name != "" || $third_name != "" || $familly_name!="") {
        $model      = JModelLegacy::getInstance('Admin', 'HajjModel');
        $this->hajj = $model->getHajjs($start=0, $limit=0,$where);
      }

      parent::display($tpl);
  }

}