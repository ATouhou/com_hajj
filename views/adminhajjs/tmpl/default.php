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

$url  = 'index.php?option=com_hajj&task=admin.hajjs&Itemid=241';
$url .= ($this->register_status != "") ? '&register_status='.$this->register_status : '';
$url .= ($this->office_branch != "") ? '&office_branch='.$this->office_branch : '';
$url .= ($this->hajj_program != "") ? '&hajj_program='.$this->hajj_program : '';
$url .= '&p=';

$data = $this->data;
//var_dump($data);

$ProgramList      = HajjFieldHelper::getHajjProgramList($is_admin=true);
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList($is_admin=true);
$ThePagination    = HajjComponentsHelper::getPagination($url, $this->nbHajjs, 20, $this->start);
$ThePager         = HajjComponentsHelper::getPager($this->start, sizeof($data), $url);

?>
<h1>طلبات الحجز</h1>
<?php echo $ThePager ?>
<?php echo $ThePagination; ?>

<?php 
  // Get the Filter Form
  HajjFieldHelper::getFormFilterHajjs($this->register_status, $this->hajj_program, $this->office_branch);
?>
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
      <th>رقم حجز المرافق</th>
      <th>التحويل</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr <?php echo ($value->register_status == 4) ? 'class="success"':''; ?>>
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $value->id ?>"><?php echo $value->id ?></a></td>
      <td><?php echo $value->first_name ?></td>
      <td><?php echo $value->familly_name ?></td>
      <td><?php echo $value->id_number ?></td>
      <td><?php echo $value->mobile ?></td>
      <td><?php echo $OfficeBranchList[$value->office_branch] ?></td>
      <td><?php echo $ProgramList[$value->hajj_program] ?></td>
      <td><?php echo HajjFieldHelper::getNationnality($value->nationality) ?></td>
      <td><?php echo HajjFieldHelper::status_register($value->register_status) ?></td>
      <td><?php echo $value->addon ?></td>
      <td><?php echo ($value->transfer_status)? 'موقف':'نشط'  ?></td>
    </tr>
  <?php endforeach ?>
</table>


<?php echo $ThePager ?>
<?php echo $ThePagination ?>