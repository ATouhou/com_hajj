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

$data = $this->data->results;


$file="الدفعــات.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

ob_start(); 
?>

<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>رقم الدفعة</th>
      <th>الاسم الاول</th>
      <th>برنامج الحج</th>
      <th>الحساب</th>
      <th>المبلغ</th>
      <th>التاريخ</th>
      <th>حالة الدفعة</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $payment): ?>
    <?php 
      switch ($payment->status) {
        case '1':
          $class="bg-orange";
          break;
        
        case '2':
          $class="bg-green";
          break;
        
        case '3':
          $class="bg-red";
          break;
        
        default:
          $class='';
          break;
      }
     ?>
    <tr class="<?php echo $class ?>">
      <td><?php echo $payment->id_hajj ?></td>
      <td><?php echo $payment->id ?></td>
      <td><?php echo $payment->first_name ?></td>
      <td><?php echo $payment->program_name ?></td>
      <td><?php echo HajjFieldHelper::$account_owner[$payment->account-1] ?></td>
      <td><?php echo $payment->amount ?></td>
      <td><?php echo $payment->date ?></td>
      <td><?php echo HajjFieldHelper::$status_payment[$payment->status-1] ?></td>
      
     
    </tr>
  <?php endforeach ?>
</table>
<?php
$content = ob_get_contents();
ob_get_clean();
echo $content;
exit ();
