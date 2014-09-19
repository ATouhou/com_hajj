<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
require_once JPATH_COMPONENT.'/helpers/' .'fields.php';

$Hajjs      = $this->hajjs;

$ProgramList      = HajjFieldHelper::getHajjProgramList($is_admin=true);
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList($is_admin=true);

//var_dump($data);
//var_dump($Hajjs);

?>

<h1>طلبات استرجاع المبلغ</h1>

 
<table class="allhajjs table table-condensed table-bordered mt30">
  <thead>
    <tr>
      <th>رقم الحجز</th>
      <th>الاسم الأول</th>
      <th>العائلة</th>
      <th>فرع التسجيل</th>
      <th>برنامج الحج</th>
      <th>رقم حجز المرافق</th>
      <th>الاجراء</th>
    </tr>
  </thead>
  <?php foreach ($Hajjs as $key => $hajj): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&task=task=admin.hajj&id=<?php echo $hajj->id ?>"><?php echo $hajj->id ?></a></td>
      <td><?php echo $hajj->first_name ?></td>
      <td><?php echo $hajj->familly_name ?></td>
      <td><?php echo $OfficeBranchList[$hajj->office_branch] ?></td>
      <td><?php echo $ProgramList[$hajj->hajj_program] ?></td>
      <td><?php echo $hajj->addon ?></td>
      <td>
        <?php if ($hajj->money_back): ?>
          <a href="index.php?option=com_hajj&task=admin.setMoneyBack&id=<?php echo $hajj->id ?>&value=0" class="btn btn-danger">تم ارجاع المبلغ</a>
        <?php else: ?>
          <a href="index.php?option=com_hajj&task=admin.setMoneyBack&id=<?php echo $hajj->id ?>&value=1" class="btn btn-success">تم ارجاع المبلغ</a>
        <?php endif ?>
      </td>
    </tr>
    <?php endforeach ?>
</table>
