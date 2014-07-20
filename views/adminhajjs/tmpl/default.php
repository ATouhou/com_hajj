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
//var_dump($data);
$ProgramList = HajjFieldHelper::getHajjProgramList();
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList();


?>
<h1>طلبات الحجز</h1>
<table class="allhajjs table table-condensed table-bordered ">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الاول</th>
      <th>العائلة</th>
      <th>رقم الهوية</th>
      <th>الجوال</th>
      <th>فرع التسجيل</th>
      <th>برنامج الحج</th>
      <th>الجنسية</th>
      <th>حالة الحجز</th>
      <th>توقت التسجيل</th>
      <th>رقم حجز المرافق</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $value->id ?>"><?php echo $value->id ?></a></td>
      <td><?php echo $value->first_name ?></td>
      <td><?php echo $value->familly_name ?></td>
      <td><?php echo $value->id_number ?></td>
      <td><?php echo $value->mobile ?></td>
      <td><?php echo $OfficeBranchList[$value->office_branch] ?></td>
      <td><?php echo $ProgramList[$value->hajj_program] ?></td>
      <td><?php echo HajjFieldHelper::getNationnality($value->nationality) ?></td>
      <td><?php echo HajjFieldHelper::status_register($value->register_status) ?></td>
      <td><?php echo $value->date_register ?></td>
      <td><?php echo $value->addon ?></td>
    </tr>
  <?php endforeach ?>
</table>
