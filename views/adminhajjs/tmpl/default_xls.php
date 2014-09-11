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

$ProgramList      = HajjFieldHelper::getHajjProgramList($is_admin=true);
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList($is_admin=true);
$sexe = array(
  'm' => 'رجال',
  'f' => 'نساء',
  );

$file="طلبات الحجز.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

ob_start(); 
?>
<table id="tblExport" class="allhajjs table table-condensed table-bordered mt30">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الاول</th>
      <th>العائلة</th>
      <th>الجنس</th>
      <th>رقم الهوية</th>
      <th>الجوال</th>
      <th>فرع التسجيل</th>
      <th>برنامج الحج</th>
      <th>الجنسية</th>
      <th>حالة الحجز</th>
      <th>رقم حجز المرافق</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr <?php echo ($value->register_status == 4) ? 'class="success"':''; ?>>
      <td><?php echo $value->id ?></td>
      <td><?php echo $value->first_name ?></td>
      <td><?php echo $value->familly_name ?></td>
      <td><?php echo $sexe[$value->sexe] ?></td>
      <td><?php echo $value->id_number ?></td>
      <td><?php echo $value->mobile ?></td>
      <td><?php echo $OfficeBranchList[$value->office_branch] ?></td>
      <td><?php echo $ProgramList[$value->hajj_program] ?></td>
      <td><?php echo HajjFieldHelper::getNationnality($value->nationality) ?></td>
      <td><?php echo HajjFieldHelper::status_register($value->register_status) ?></td>
      <td><?php echo $value->addon ?></td>
    </tr>
  <?php endforeach ?>
</table>
<?php
$content = ob_get_contents();
ob_get_clean();
echo $content;
exit ();