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

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   

      $jinput = JFactory::getApplication()->input;
      $id = $jinput->get('id','');
      $id_number   = $jinput->get('id_number','');
      $mobile    = $jinput->get('mobile','');
      
      $where = '1=1';
      $where .= ($id!='') ? ' AND id = '.$id: '';
      $where .= ($id_number!='') ? ' AND id_number = '.$id_number: '';
      $where .= ($mobile!='') ? ' AND mobile = '.$mobile: '';

      $this->hajj = "";
      if ($id!="" || $id_number!="" || $mobile!="" ) {
        $model      = JModelLegacy::getInstance('Admin', 'HajjModel');
        $this->hajj = $model->getHajjs($start=0, $limit=0,$where);
      }

      parent::display($tpl);
  }

}