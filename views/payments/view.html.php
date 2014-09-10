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
      $this->id_hajj      = $jinput->get('id_hajj','');
      $this->id_filter    = $jinput->get('id_filter','');
      $this->date_filter  = $jinput->get('date_filter','');
      $this->hajj_program = $jinput->get('hajj_program','');
      $this->account      = $jinput->get('account','');
      $this->status       = $jinput->get('status','');
      
      $where = '1=1';
      $where .= ($this->id_hajj!='') ? ' AND id_hajj = '.$this->id_hajj: '';
      $where .= ($this->id_filter!='') ? ' AND Payments.id = '.$this->id_filter: '';
      $where .= ($this->date_filter!='') ? ' AND date = "'.$this->date_filter.'"': '';
      $where .= ($this->hajj_program!='') ? ' AND HP.id = "'.$this->hajj_program.'"': '';
      $where .= ($this->account!='') ? ' AND Payments.account = "'.$this->account.'"': '';
      $where .= ($this->status!='') ? ' AND Payments.status = "'.$this->status.'"': '';

      // Pagination
      $this->Itemid = $jinput->get('Itemid','1');
      $offset = $jinput->get('p','1');
      $limit   = 20;
      $start   = ($offset - 1) * $limit ;

      // Get the DATA
      $model        = JModelLegacy::getInstance('Payments', 'HajjModel');
      if ($this->is_admin) { // An admin
        $this->data = $model->getPayments($where, $start, $limit);
      }else if($this->is_manager){ // A manager
        $this->data = $model->getPaymentsByBranch($where, $managerObject->office_branch, $start, $limit);
      }else{ // Simple hajj
        $this->data = $model->getMyPayments($this->idHajj, $start, $limit);
      }
      $this->start = $offset;

      // If we select an id we sould edit it in the form
      $id           = $jinput->get('id', 0);
      $this->toEdit = "";

      if ($id) { // Get the info to edit
        $result = $model->getPayments('Payments.ID = '.$id)->results[0];
        if ($result->register_status == 2) {
          $this->toEdit = $result;
          $this->idHajj=$this->toEdit->id_hajj;
        }
      }

      // Get the idpayment in case edit 
      $this->idPayment = $jinput->get('id', 0);

      

      parent::display($tpl);
  }

}