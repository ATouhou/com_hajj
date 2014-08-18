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

$Hajjs = $this->data->Hajjs;
$Payments = $this->data->Payments;

//var_dump($Payments);

?>
<h1>المستحقات والأرصدة</h1>
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
      <th>المبلغ المدفوع</th>
      <th>الرصيد</th>
    </tr>
  </thead>

  <?php foreach ($Hajjs as $key => $hajj): ?>
    <?php 
          // Retrieve the values
          $ID    = $hajj->id;
          $topay = $hajj->topay;
          $paid  = (!isset($Payments[$ID])) ? 0 : $Payments[$ID];
          $rest  = $topay - $paid;
    ?>
    <tr>
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $hajj->id ?>"><?php echo $hajj->id ?></a></td>
      <td><?php echo $hajj->first_name ?></td>
      <td><?php echo $hajj->familly_name ?></td>
      <td><?php echo $hajj->name ?></td>
      <td><?php echo $hajj->nb_addon ?></td>
      <td><?php echo $hajj->nb_addon+1 ?></td>
      <td><?php echo $topay ?></td>
      <td><?php echo $paid ?></td>
      <td><?php echo $rest ?></td>
    </tr>
  <?php endforeach ?>
  
</table>
