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
$addons = $this->addons;
$hajj = $this->hajj;
$toEdit = $this->toEdit;
$ProgramList = HajjFieldHelper::getHajjProgramList();
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList();


// Check if this is an addon => he cannot add another addon
if ($addons==""): ?>
  <h3>رقم حجزك مسجل كمرافق، لذا لا يمكنكم تسجيل مرافق لكم</h3>
  <?php return ?>
<?php endif ?>

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
        require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
        HajjFieldHelper::getFormHajj($addon = true, $hajj);
      ?>
      </div>
    </div>
  </div>
</div>
<?php 
  else: 
    echo "<h2>رقم حجز ". $toEdit->id ."</h2>";
    HajjFieldHelper::getEditFormHajj($toEdit, $is_admin=false, $all_read_only=false, $is_addon=true);
  endif 
?>


<h2>قائمة المرافقين</h2>
<table class="table table-bordered list-addons">
  <tr>
    <th>رقم الحجز</th>
    <th>الاسم الاول</th>
    <th>العائلة</th>
    <th>رقم الهوية</th>
    <th>الجوال</th>
    <th>فرع التسجيل</th>
    <th>برنامج الحج </th>

<?php foreach ($addons as $key => $hajj): ?>
  <tr>
    <td><a href="index.php?option=com_hajj&view=addons&Itemid=238&id=<?php echo $hajj->id ?>"><?php echo $hajj->id ?></a></td>
    <td><?php echo $hajj->first_name ?></td>
    <td><?php echo $hajj->familly_name ?></td>
    <td><?php echo $hajj->id_number ?></td>
    <td><?php echo $hajj->mobile ?></td>
    <td><?php echo $OfficeBranchList[$hajj->office_branch] ?></td>
    <td><?php echo $ProgramList[$hajj->hajj_program] ?></td>
  </tr>
<?php endforeach ?>

  </tr>
</table>

