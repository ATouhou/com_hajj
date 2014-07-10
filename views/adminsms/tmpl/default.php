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
$data = $this->data;
//var_dump($data);

?>
<h1>حالة الرسائل</h1>

<table class="allhajjs table table-condensed table-bordered ">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الاول</th>
      <th>العائلة</th>
      <th>حالة الحجز</th>
      <th>الرسالة الأولى</th>
      <th>الرسالة الثانية</th>
      <th>الرسالة الثالثة</th>
      <th>الرسالة الرابعة</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><?php echo $value->id ?></td>
      <td><?php echo $value->first_name ?></td>
      <td><?php echo $value->familly_name ?></td>
      <td><?php echo HajjFieldHelper::status_register($value->register_status) ?></td>
      <td><?php echo ($value->sms1 != "")? "أرسل" : "" ?></td>
      <td><?php echo ($value->sms2 != "")? "أرسل" : "" ?></td>
      <td><?php echo ($value->sms3 != "")? "أرسل" : "" ?></td>
      <td><?php echo ($value->sms4 != "")? "أرسل" : "" ?></td>
    </tr>
  <?php endforeach ?>
</table>
