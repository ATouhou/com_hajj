<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$hajjs = $this->hajj;

require_once JPATH_COMPONENT.'/helpers/' .'fields.php';

$ProgramList      = HajjFieldHelper::getHajjProgramList($is_admin=true);
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList($is_admin=true);

?>
<h1>بحث سريع</h1>

<form action="index.php?option=com_hajj&view=speedsearch" method="post" accept-charset="utf-8">
  <div class="row-fluid">
    <div class="span3">
      <input type="submit" name="submit" value="بحث" class="btn btn-success mt25">
    </div>

    <div class="span3">
      <label for="mobile">الجوال</label>
      <input type="text" name="mobile" value="" placeholder="">
    </div>

    <div class="span3">
      <label for="id_number">الهوية/الإقامة</label>
      <input type="text" name="id_number" value="" placeholder="">
    </div>

    <div class="span3">
      <label for="id">رقم الحجز</label>
      <input type="text" name="id" value="" placeholder="">
    </div>
  </div>
</form>

<?php if ($hajjs): ?>
  <div class="table-responsive">
    <table class="allhajjs table table-condensed table-bordered ">
      <thead>
        <tr>
          <th>الحجز</th>
          <th>الاسم الاول</th>
          <th>الاسم الثاني</th>
          <th>الاسم الثالث</th>
          <th>العائلة</th>
          <th>رقم الهوية</th>
          <th>الجوال</th>
          <th>فرع التسجيل</th>
          <th>برنامج الحج</th>
          <th>الجنسية</th>
          <th>حالة الحجز</th>
          <th>توقيت التسجيل</th>
          <th>رقم حجز المرافق</th>
          <th>التحويل</th>
        </tr>
      </thead>
      <?php foreach ($hajjs as $key => $hajj): ?>
        <tr>
          <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $hajj->id ?>"><?php echo $hajj->id ?></a></td>
          <td><?php echo $hajj->first_name ?></td>
          <td><?php echo $hajj->second_name ?></td>
          <td><?php echo $hajj->third_name ?></td>
          <td><?php echo $hajj->familly_name ?></td>
          <td><?php echo $hajj->id_number ?></td>
          <td><?php echo $hajj->mobile ?></td>
          <td><?php echo $OfficeBranchList[$hajj->office_branch] ?></td>
          <td><?php echo $ProgramList[$hajj->hajj_program] ?></td>
          <td><?php echo HajjFieldHelper::getNationnality($hajj->nationality) ?></td>
          <td><?php echo HajjFieldHelper::status_register($hajj->register_status) ?></td>
          <td><?php echo $hajj->date_register ?></td>
          <td><?php echo $hajj->addon ?></td>
          <td><?php echo ($hajj->transfer_status)? 'موقف':'نشط'  ?></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
<?php else: ?>
  <h2>لا شيء</h2>
<?php endif ?>

