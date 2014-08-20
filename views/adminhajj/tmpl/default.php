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
$addons = $this->addons;
$ProgramList = HajjFieldHelper::getHajjProgramList();
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList();

?>
<h1>تعديل <?php echo $data->id ?></h1>

<?php 
HajjFieldHelper::getEditFormHajj($data, $is_admin=true); // True for Admin

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
    <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $hajj->id ?>"><?php echo $hajj->id ?></a></td>
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