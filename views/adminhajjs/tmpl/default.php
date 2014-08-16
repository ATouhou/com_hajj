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
$data = $this->data;
//var_dump($data);
$ProgramList = HajjFieldHelper::getHajjProgramList($is_admin=true);
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList($is_admin=true);


?>
<h1>طلبات الحجز</h1>
<ul class="pager">
  <li class="next <?php echo ($this->start-1 == 0) ? "hidden" : "" ?>"><a href="index.php?option=com_hajj&task=admin.hajjs&p=<?php echo $this->start-1 ?>">&rarr;سابق </a></li>
  <li class="previous <?php echo (sizeof($data) < 20 || sizeof($data) == 0) ? "hidden" : "" ?>"><a href="index.php?option=com_hajj&task=admin.hajjs&p=<?php echo $this->start + 1 ?>">التالي &larr;</a></li>
</ul>
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
      <th>توقيت التسجيل</th>
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


<ul class="pager">
  <li class="next <?php echo ($this->start-1 == 0) ? "hidden" : "" ?>"><a href="index.php?option=com_hajj&task=admin.hajjs&p=<?php echo $this->start-1 ?>">&rarr;سابق </a></li>
  <li class="previous <?php echo (sizeof($data) < 20 || sizeof($data) == 0) ? "hidden" : "" ?>"><a href="index.php?option=com_hajj&task=admin.hajjs&p=<?php echo $this->start + 1 ?>">التالي &larr;</a></li>
</ul>