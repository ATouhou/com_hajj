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
require_once JPATH_COMPONENT.'/helpers/' .'components.php';

$url      = 'index.php?option=com_hajj&task=admin.Benefits&Itemid=247';
$url .= ($this->id_hajj != "") ? '&id_hajj='.$this->id_hajj : '';
$url .= ($this->hajj_program != "") ? '&hajj_program='.$this->hajj_program : '';
$url .= ($this->current_payment != "") ? '&current_payment='.$this->current_payment : '';
$url .= ($this->status_addon != "") ? '&status_addon='.$this->status_addon : '';
$url .='&p=';

$Hajjs    = $this->data->Hajjs;
$Payments = $this->data->Payments;

$ThePagination    = HajjComponentsHelper::getPagination($url, $this->nbBenefits, 20, $this->start);
$ThePager         = HajjComponentsHelper::getPager($this->start, sizeof($Hajjs), $url);

//var_dump($Payments);

?>
<h1>المستحقات والأرصدة</h1>
<?php echo $ThePager ?>
<?php echo $ThePagination; ?>

<?php HajjFieldHelper::getFormFilterBenefits($this->id_hajj, $this->hajj_program, $this->current_payment , $this->status_addon); ?>

<ul class="inline help">
  <li><span class="carret bg-red"></span> لا يوجد مبلغ مطلوب</li>
  <li><span class="carret bg-orange"></span> لم يتم الدفع</li>
  <li><span class="carret bg-yellow"></span> دفع جزئي</li>
</ul>

<table class="allhajjs table table-condensed table-bordered mt25">
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

          // Get the color
          $class='';
          if ($topay==0 && $paid==0) {
            $class="bg-red";
          }else if($topay>0 && $paid==0){
            $class="bg-orange";
          }else if($topay>0 && $paid>0){
            $class="bg-yellow";
          }else if($topay == $paid){
            $class="bg-green";
          }
    ?>
    <tr class="<?php echo $class ?>">
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $hajj->id ?>"><?php echo $hajj->id ?></a></td>
      <td><?php echo $hajj->first_name ?></td>
      <td><?php echo $hajj->familly_name ?></td>
      <td><?php echo $hajj->name ?></td>
      <td><?php echo $hajj->nb_addon ?></td>
      <td><?php echo $hajj->nb_addon+1 ?></td>
      <td><?php echo $topay ?></td>
      <td>
        <?php if ($paid): ?>
          <a href="index.php?option=com_hajj&view=payments&Itemid=249&id_hajj=<?php echo $hajj->id ?>"><?php echo $paid ?></a>
        <?php else: ?>
            <?php echo $paid ?>
        <?php endif ?>
        </td>
      <td><?php echo $rest ?></td>
    </tr>
  <?php endforeach ?>
  
</table>


<?php echo $ThePager ?>
<?php echo $ThePagination ?>