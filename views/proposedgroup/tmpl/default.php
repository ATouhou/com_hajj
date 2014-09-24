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

$hajjs  = $this->hajjs;
$toEdit = $this->toEdit;

//var_dump($hajjs);

?>

<?php if ($toEdit != ""):
    require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
    HajjFieldHelper::getFormProposedGroup($toEdit);
  endif 
?>


<h1>المجموعات المقترحة</h1>

<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الأول</th>
      <th>العائلة</th>
      <th>برنامج الحج</th>
      <th>عدد المرافقين</th>
      <th>العدد الكلي</th>
      <th>الإجراء</th>
    </tr>
  </thead>
  <?php foreach ($hajjs as $key => $hajj): ?>
    <tr>
      <td><?php echo $hajj->id ?></td>
      <td><?php echo $hajj->first_name ?></td>
      <td><?php echo $hajj->familly_name ?></td>
      <td><?php echo $hajj->program_name ?></td>
      <td><?php echo $hajj->nb_addon ?></td>
      <td><?php echo $hajj->nb_addon+1 ?></td>
      <td><a href="index.php?option=com_hajj&view=proposedGroup&Itemid=297&id=<?php echo $hajj->id ?>" class="btn btn-info">انشاء مجموعة</a></td>
    </tr>
  <?php endforeach ?>
</table>
