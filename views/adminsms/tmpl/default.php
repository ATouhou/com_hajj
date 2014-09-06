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
require_once JPATH_COMPONENT.'/helpers/' .'components.php';

$data          = $this->data;
$url           = 'index.php?option=com_hajj&task=admin.sms&Itemid=242&p=';
$ThePagination = HajjComponentsHelper::getPagination($url, $this->nbSMS, 20, $this->start);
$ThePager      = HajjComponentsHelper::getPager($this->start, sizeof($data), $url);
?>
<h1>حالة الرسائل</h1>
<?php echo $ThePager ?>
<?php echo $ThePagination; ?>

<table class="allhajjs table table-condensed table-bordered ">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الاول</th>
      <th>العائلة</th>
      <th>حالة الحجز</th>
      <th>التسجيل</th>
      <th>القبول</th>
      <th>مرفوض</th>
      <th>تم الدفع</th>
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

<?php echo $ThePager ?>
<?php echo $ThePagination ?>