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
HajjComponentsHelper::getMinistryRequests();
$hajjs = $this->hajjs;

$sexe = array(
  'm' => 'ذكر',
  'f' => 'انثى',
);

//index.php?option=com_hajj&task=admin.ministryrequests

$NbperPage   = 20; // 20 Items
$TotalPages   = ceil(sizeof($hajjs)/$NbperPage); // Total of page

?>
<h1>طلبات الرفع للوزارة</h1>

<?php 
  $url = "index.php?option=com_hajj&view=ministryrequests&Itemid=294";
  HajjFieldHelper::getFormFilterMinistryRequests($this->id_number, $this->register_status, $this->hajj_program, $this->office_branch, $this->sexe, $url);
 ?>

<!-- Create the pagination -->
<div class="text-center">
  <div class="pagination" id="pagination-ministryrequests">
    <ul>
      <li class="active"><a href="#" data-pagetarget="1">1</a></li>
      <?php for ($i = 2; $i <= $TotalPages; $i++): ?>
        <li><a href="#" data-pagetarget="<?php echo $i ?>"><?php echo $i ?></a></li>
      <?php endfor ?>
    </ul>
  </div>
</div>


<form action="index.php?option=com_hajj&task=admin.ministryrequests" method="post">
  <table class="allhajjs table table-condensed table-bordered mt30" id="ministryrequests-table">
    <thead>
      <tr>
        <th>الحجز</th>
        <th>الهوية/الإقامة</th>
        <th>الاسم الاول</th>
        <th>الاسم الثاني</th>
        <th>الاسم الثالث</th>
        <th>العائلة</th>
        <th>الجنسية</th>
        <th>الجنس</th>
        <th>الحالة الاجتماعية</th>
        <th>صورة شخصية‎</th>
      </tr>
    </thead>

    <?php foreach ($hajjs as $key => $hajj): ?>
      <tr data-page="<?php echo floor($key/$NbperPage)+1 ?>">
        <td>
          <input class="hidden" type="checkbox" name="IDs[]" value="<?php echo $hajj->id ?>">
          <?php echo $hajj->id ?>
        </td>
        <td><?php echo $hajj->id_number ?></td>
        <td><?php echo $hajj->first_name ?></td>
        <td><?php echo $hajj->second_name ?></td>
        <td><?php echo $hajj->third_name ?></td>
        <td><?php echo $hajj->familly_name ?></td>
        <td><?php echo HajjFieldHelper::$Nationnality[$hajj->nationality-1] ?></td>
        <td><?php echo $sexe[$hajj->sexe] ?></td>
        <td><?php echo ($hajj->relationship) ? HajjFieldHelper::$relationship[$hajj->relationship] : '' ?></td>
        <td></td>
      </tr>
    <?php endforeach ?>
  </table>

  <input type="submit" name="" value="تصدير ملف جاما‎" class="btn btn-info mt30">
</form>

<?php 

