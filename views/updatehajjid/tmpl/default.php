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
    HajjFieldHelper::getFormUpdateHajjId($toEdit);
  endif 
?>


<h1>تحديث الهوية</h1>

<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الأول</th>
      <th>العائلة</th>
      <th>رقم الهوية/الإقامة </th>
      <th>صورة الهوية/الإقامة</th>
      <th>الإجراء</th>
    </tr>
  </thead>
  <?php foreach ($hajjs as $key => $hajj): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&view=UpdateHajjId&Itemid=296&id=<?php echo $hajj->id ?>"><?php echo $hajj->id ?></a></td>
      <td><?php echo $hajj->first_name ?></td>
      <td><?php echo $hajj->familly_name ?></td>
      <td><?php echo $hajj->id_number ?></td>
      <td><a href="index.php?option=com_hajj&task=hajj.getImgDocument&img=<?php echo $hajj->link ?>" title="">صورة الهوية/الإقامة</a></td>
      <td><a href="index.php?option=com_hajj&view=UpdateHajjId&Itemid=296&id=<?php echo $hajj->id ?>" class="btn btn-success">تحديث</a></td>
    </tr>
  <?php endforeach ?>
</table>
