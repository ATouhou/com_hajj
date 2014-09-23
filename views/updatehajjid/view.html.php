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
class hajjViewUpdateHajjId extends JViewLegacy
{

  /**
   * Display the view
   */
  public function display($tpl = null)
  {   
      
      // get Hajj with photo
      $model           = JModelLegacy::getInstance('Admin', 'HajjModel');
      $where           = "Documents.document = 0 OR Documents.document = 1";
      $this->hajjs     = $model->getHajjWithDocument($where);
      $jinput          = JFactory::getApplication()->input;

      
      $this->toEdit    = "";
      $id              = $jinput->get('id', 0);
      $this->Itemid    = $jinput->get("Itemid", 0);
     
      if ($id) { // Get the info to edit
        foreach ($this->hajjs as $key => $value) {
          if ($value->id == $id) {
            $this->toEdit = $this->hajjs[$key];
            break;
          }
        }
      }

      parent::display($tpl);
  }

}