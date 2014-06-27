<?php
/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http://www.behance.net/kossa
 */

defined('_JEXEC') or die;

if (file_exists(JPATH_BASE."/media/jui/js/bootstrap.min.js")){
    JHtml::_('bootstrap.framework');
}

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JControllerLegacy::getInstance('Hajj');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
