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
      // Get the id of hajj
      $idUser       = JFactory::getUser()->id;
      $model        = JModelLegacy::getInstance('hajj', 'HajjModel');
      $this->idHajj = $model->getIdNumber($idUser);

      
      // Get the DATA
      $model        = JModelLegacy::getInstance('Payments', 'HajjModel');
      $this->data   = $model->getMyPayments($this->idHajj);
      
      // If we select an id we sould edit it in the form
      $jinput       = JFactory::getApplication()->input;
      $id           = $jinput->get('id', 0);
      $this->toEdit = "";

      if ($id) { // Get the info to edit
        foreach ($this->data as $key => $value) {
          if ($value->id == $id) {
            $this->toEdit = $this->data[$key];
            break;
          }
        }
      }

      // Get the idpayment in case edit 
      $this->idPayment = $jinput->get('id', 0);
      

      parent::display($tpl);
  }

}