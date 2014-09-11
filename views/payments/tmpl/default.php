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
var_dump($this->sumPayments);
$data          = $this->data->results;
$nbRows        = $this->data->nbRows;
$toEdit        = $this->toEdit;

$url           = 'index.php?option=com_hajj&view=payments&Itemid='.$this->Itemid;
$url          .= ($this->id_hajj != "") ? '&id_hajj='.$this->id_hajj : '';
$url          .= ($this->id_filter != "") ? '&id_filter='.$this->id_filter : '';
$url          .= ($this->date_filter != "") ? '&date_filter='.$this->date_filter : '';
$url          .= ($this->hajj_program != "") ? '&hajj_program='.$this->hajj_program : '';
$url          .= ($this->account != "") ? '&account='.$this->account : '';
$url          .= ($this->status != "") ? '&status='.$this->status : '';
$url          .= '&p=';


$urlXLS = $url . $this->start . '&form=xls';
$ThePagination = HajjComponentsHelper::getPagination($url, $nbRows, 20, $this->start);
$ThePager      = HajjComponentsHelper::getPager($this->start, sizeof($data), $url);

$codeColor = array("bg-orange", "bg-green", "bg-red")
?>
<?php if (!$this->is_manager): ?>
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
<?php endif ?>


<h1>شاشة الدفعــات</h1>

<?php 
  // Get the Filter Form
  HajjFieldHelper::getFormFilterPayments($this->date_filter, $this->id_filter, $this->id_hajj, $this->hajj_program, $this->account, $this->status);
?>
<a href="<?php echo $urlXLS  ?>" class="btn btn-info mt10 pull-left">تصدير الى إكسل</a>
<div class="clearfix"></div>
<?php echo $ThePager ?>
<?php echo $ThePagination; ?>



<!-- Display The Sum -->
<?php
$th = $td = $li = '';
$sum = 0;
foreach ($this->sumPayments as $key => $value):
  $x = intval($value->amount);
  $sum += $x;
  $th .= '<th>'. HajjFieldHelper::$status_payment[$value->status-1] .'</th>';
  $td .= '<td class="'.$codeColor[$value->status-1].'">'. number_format($x,0,",",".") .' ريال</td>';
  $li .= '<li><span class="carret '.$codeColor[$value->status-1].'"></span>'.  HajjFieldHelper::$status_payment[$value->status-1] .'</li>';
endforeach;
$th .= '<th>المجموع الكلي</th>';
$td .= '<td>'.number_format($sum,0,",",".").' ريال</td>';
?>


<ul class="inline help">
  <?php echo $li ?>
</ul>

<table class="allhajjs table table-condensed table-bordered mt25">
  <thead>
    <tr>
      <?php echo $th ?>
    </tr>
    <tr>
      <?php echo $td ?>
    </tr>
  </thead>

</table>

<table class="allhajjs table table-condensed table-bordered mt25">
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
      <?php if ($this->is_admin): ?>
        <th>السند</th>
      <?php endif ?>
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
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $payment->id_hajj ?>"><?php echo $payment->id_hajj ?></a></td>
      <td><a href="index.php?option=com_hajj&view=payments&id=<?php echo $payment->id ?>"><?php echo $payment->id ?></a></td>
      <td><?php echo $payment->first_name ?></td>
      <td><?php echo $payment->program_name ?></td>
      <td><?php echo HajjFieldHelper::$account_owner[$payment->account-1] ?></td>
      <td><?php echo $payment->amount ?></td>
      <td><?php echo $payment->date ?></td>
      <td><?php echo HajjFieldHelper::$status_payment[$payment->status-1] ?></td>
      <?php if ($this->is_admin): ?>
        <td>
          <?php if ($payment->attachment): ?>
            <a href="<?php echo 'index.php?option=com_hajj&task=admin.getImgPayment&img='.$payment->attachment; ?>">السند</a>
          <?php endif ?>
        </td>
      <?php endif ?>
     
    </tr>
  <?php endforeach ?>
</table>

<?php echo $ThePager ?>
<?php echo $ThePagination; ?>
