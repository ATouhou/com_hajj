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
class hajjViewActionMinistry extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null){
      $jinput  = JFactory::getApplication()->input;
      $offset  = $jinput->get('p','1');
      $Itemid  = $jinput->get('Itemid','0', 'STRING');
      
      // Pagination
      $limit   = 20;
      $start   = ($offset - 1) * $limit ;
      $model   = JModelLegacy::getInstance('Admin', 'HajjModel');
      $where   = 'register_status = 6 AND gama_status = 1';
      
      $this->result  = $model->getHajjs($start, $limit,$where);
      $this->nbHajjs = $model->getNbHajjs($where);
      $this->start   = $offset;
      $this->Itemid  = $Itemid;

      parent::display($tpl);
  }

}