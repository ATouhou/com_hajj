<?php
/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http://www.behance.net/kossa
 */
 
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class HajjControllerAjax extends JControllerLegacy
{

  /*
  |------------------------------------------------------------------------------------
  | Get the to pay and paid for an id
  |------------------------------------------------------------------------------------
  */
  public function getTopayPaid(){
    $jinput = JFactory::getApplication()->input;
    $id = $jinput->get('id',0);

    $result   = $this->getModel('admin')->getBenefits(0, 0, 'HU.id='.$id);
    $Payments = $result->Payments;
    $Hajjs    = $result->Hajjs;

    $id       = (empty($Hajjs[0]->id)) ? 0 : $Hajjs[0]->id;
    $topay    = (empty($Hajjs[0]->topay)) ? 0 : $Hajjs[0]->topay;
    $paid    = (empty($Payments[$id])) ? 0 : $Payments[$id] ;

    $obj = new stdClass();
    $obj->topay=$topay;
    $obj->paid=$paid;

    echo(json_encode($obj));
    exit();
  }

  

}