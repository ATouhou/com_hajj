<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Call list fields
require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
//var_dump($this->data);
$data = $this->data;

// If new register
$data->register_status = ($data->register_status == "") ? "انتظار وقت اصدار التصاريح" : $data->register_status; 
?>

<div class="row-fluid">
  <div class="span10"><input type="text" name="" value="<?php echo $data->id ?>" disabled></div>
  <div class="span2">رقم الحجز</div>
</div>
<div class="row-fluid">
  <div class="span10"><input type="text" name="" value="<?php echo $data->register_status ?>" disabled></div>
  <div class="span2">حالة الحجز</div>
</div>

<p>شكرا لك على رغبتك في الحج معنا...باذن الله ستصلكم رسالة نصية بحالة الحجز حالما يتم تحديثها</p>