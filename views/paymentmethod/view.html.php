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
class hajjViewPaymentMethod extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      $app = JFactory::getApplication();
      $ID = JFactory::getUser()->id;
      $model    = JModelLegacy::getInstance('Hajj', 'HajjModel');
      $register_status = (int)$model->getHajj($ID)->register_status;
      if ($register_status == 2) {// 
        $app->redirect('index.php?option=com_content&view=article&id=58');
      }
      parent::display($tpl);
  }

}