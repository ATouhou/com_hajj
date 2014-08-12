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
$toEdit = $this->toEdit;

//var_dump($data);
?>

<?php if ($toEdit == ""): ?>
  <div class="accordion" id="accordion2">
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
          <span class="btn">اضافة</span>
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse">
        <div class="accordion-inner">
        
        <?php
          HajjFieldHelper::getFormPayment($toEdit, $this->idHajj, $this->idPayment);
        ?>
        </div>
      </div>
    </div>
  </div>
<?php 
  else: 
    HajjFieldHelper::getFormPayment($toEdit, $this->idHajj, $this->idPayment);
  endif 
?>

<h1>شاشة الدفعــات</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>رقم الدفعة</th>
      <th>الحجز</th>
      <th>الحساب</th>
      <th>صاحب الحساب</th>
      <th>المبلغ</th>
      <th>التاريخ</th>
      <th>حالة الدفعة</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $payment): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&view=payments&id=<?php echo $payment->id ?>"><?php echo $payment->id ?></a></td>
      <td><?php echo $payment->id_hajj ?></td>
      <td><?php echo HajjFieldHelper::$account_owner[$payment->account-1] ?></td>
      <td><?php echo $payment->account_owner ?></td>
      <td><?php echo $payment->amount ?></td>
      <td><?php echo $payment->date ?></td>
      <td><?php echo HajjFieldHelper::$status_payment[$payment->status-1] ?></td>
     
    </tr>
  <?php endforeach ?>
</table>
