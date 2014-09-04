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
            HajjFieldHelper::getFormPayment($toEdit, $this->idHajj, $this->idPayment, $this->is_admin);
          ?>
          </div>
        </div>
      </div>
    </div>
  <?php 
    else: 
      HajjFieldHelper::getFormPayment($toEdit, $this->idHajj, $this->idPayment, $this->is_admin);
    endif 
  ?>


<h1>شاشة الدفعــات</h1>

<?php 
  // Get the Filter Form
  HajjFieldHelper::getFormFilterPayments($this->date_filter, $this->id_filter, $this->id_hajj);
?>

<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>رقم الدفعة</th>
      <th>الحساب</th>
      <th>صاحب الحساب</th>
      <th>المبلغ</th>
      <th>التاريخ</th>
      <th>حالة الدفعة</th>
      <?php if ($this->is_admin): ?>
        <th>السند</th>
      <?php endif ?>
    </tr>
  </thead>
  <?php foreach ($data as $key => $payment): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $payment->id_hajj ?>"><?php echo $payment->id_hajj ?></a></td>
      <td><a href="index.php?option=com_hajj&view=payments&id=<?php echo $payment->id ?>"><?php echo $payment->id ?></a></td>
      <td><?php echo HajjFieldHelper::$account_owner[$payment->account-1] ?></td>
      <td><?php echo $payment->account_owner ?></td>
      <td><?php echo $payment->amount ?></td>
      <td><?php echo $payment->date ?></td>
      <td><?php echo HajjFieldHelper::$status_payment[$payment->status-1] ?></td>
      <?php if ($this->is_admin): ?>
        <td>
          <a href="<?php echo 'index.php?option=com_hajj&task=admin.getImgPayment&img='.$payment->attachment; ?>">السند</a>
        </td>
      <?php endif ?>
     
    </tr>
  <?php endforeach ?>
</table>