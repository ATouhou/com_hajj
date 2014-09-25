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

$url  = 'index.php?option=com_hajj&view=actionministry&Itemid='.$this->Itemid;
$url .= '&p=';

$data = $this->result;
//var_dump($data);

$ProgramList      = HajjFieldHelper::getHajjProgramList($is_admin=true);
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList($is_admin=true);
$ThePagination    = HajjComponentsHelper::getPagination($url, $this->nbHajjs, 20, $this->start);
$ThePager         = HajjComponentsHelper::getPager($this->start, sizeof($data), $url);
$sexe = array(
  'm' => 'رجال',
  'f' => 'نساء',
  );
?>
<h1>نتيجة الرفع للوزارة</h1>
<?php echo $ThePager ?>
<?php echo $ThePagination; ?>


<?php HajjComponentsHelper::export() ?>
<table id="tblExport" class="allhajjs table table-condensed table-bordered mt30">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الثالث</th>
      <th>العائلة</th>
      <th>الجنس</th>
      <th>الجنسية</th>
      <th colspan="2">الإجراءات</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr <?php echo ($value->register_status == 4) ? 'class="success"':''; ?>>
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $value->id ?>"><?php echo $value->id ?></a></td>
      <td><?php echo $value->third_name ?></td>
      <td><?php echo $value->familly_name ?></td>
      <td><?php echo $sexe[$value->sexe] ?></td>
      <td><?php echo HajjFieldHelper::$Nationnality[$value->nationality-1] ?></td>
      <td><a class="btn btn-success" href="index.php?option=com_hajj&task=admin.ministryAction&value=7&id=<?php echo $value->id ?>">اخراج تصريح </a></td>
      <td><a class="btn btn-danger" href="index.php?option=com_hajj&task=admin.ministryAction&value=9&id=<?php echo $value->id ?>">رفض تصريح </a></td>
    </tr>
  <?php endforeach ?>
</table>

<?php echo $ThePager ?>
<?php echo $ThePagination ?>