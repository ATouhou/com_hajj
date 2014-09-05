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
class hajjViewPayments extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      // Get user group to check if admin
      $user_id        = JFactory::getUser()->id;
      $this->is_admin = $this->is_manager = false;
      $groups         = JAccess::getGroupsByUser($user_id, false);

      if(is_numeric(array_search(10, $groups)) || is_numeric(array_search(8, $groups))){
        $this->is_admin = true;
      }else if(is_numeric(array_search(12, $groups))){
        $this->is_manager = true;

        // Get the branch
        $modelPersonnels = JModelLegacy::getInstance('Personnels', 'HajjModel');
        $managerObject = $modelPersonnels->getPersonnels('users.id = '.$user_id)[0];
      }

      // Get the id of hajj
      $idUser       = JFactory::getUser()->id;
      $model        = JModelLegacy::getInstance('hajj', 'HajjModel');
      $this->idHajj = $model->getIdNumber($idUser);

      
      // Get Filer
      $jinput = JFactory::getApplication()->input;

      // Create Filters
      $this->date_filter    = $jinput->get('date_filter','');
      $this->id_filter      = $jinput->get('id_filter','');
      $this->id_hajj = $jinput->get('id_hajj','');
      
      $where = '1=1';
      $where .= ($this->date_filter!='') ? ' AND date = "'.$this->date_filter.'"': '';
      $where .= ($this->id_filter!='') ? ' AND id = '.$this->id_filter: '';
      $where .= ($this->id_hajj!='') ? ' AND id_hajj = '.$this->id_hajj: '';

      // Get the DATA
      $model        = JModelLegacy::getInstance('Payments', 'HajjModel');
      if ($this->is_admin) { // An admin
        $this->data = $model->getPayments($where);
      }else if($this->is_manager){ // A manager
        $this->data = $model->getPaymentsByBranch($where, $managerObject->office_branch);
      }else{ // Simple hajj
        $this->data = $model->getMyPayments($this->idHajj);
      }
      

      // If we select an id we sould edit it in the form
      $id           = $jinput->get('id', 0);
      $this->toEdit = "";

      if ($id) { // Get the info to edit
        foreach ($this->data as $key => $value) {
          if ($value->id == $id) {
            $this->toEdit = $this->data[$key];
            $this->idHajj = ($this->is_admin) ? $this->toEdit->id_hajj : $this->idHajj;
            break;
          }
        }
      }

      // Get the idpayment in case edit 
      $this->idPayment = $jinput->get('id', 0);

      

      parent::display($tpl);
  }

}