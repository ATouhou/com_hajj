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
require_once JPATH_COMPONENT.'/helpers/' .'hajj.php';
$data = $this->data;
//var_dump($data);

?>
<h1>المستحقات</h1>
<table class="allhajjs table table-condensed table-bordered ">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الاول</th>
      <th>العائلة</th>
      <th>برنامج الحج</th>
      <th>عدد المرافقين</th>
      <th>العدد الكلي</th>
      <th>المبلغ المطلوب</th>
      <th>المبلغ المتبقي</th>
    </tr>
  </thead>

  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $value->id ?>"><?php echo $value->id ?></a></td>
      <td><?php echo $value->first_name ?></td>
      <td><?php echo $value->familly_name ?></td>
      <td><?php echo $value->name ?></td>
      <td><?php echo $value->nb_addon ?></td>
      <td><?php echo $value->nb_addon+1 ?></td>
      <td><?php echo $value->topay ?></td>
      <td><?php echo $value->paid ?></td>
    </tr>
  <?php endforeach ?>
  
</table>
