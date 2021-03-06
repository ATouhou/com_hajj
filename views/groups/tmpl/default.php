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
$toEdit = $this->toEdit;

//var_dump($toEdit);

?>

<?php if ($toEdit == ""): ?>
    <div class="accordion" id="accordion2">
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            <span class="btn">اضافة</span>
          </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse">
          <div class="accordion-inner">
          
          <?php
            require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
            HajjFieldHelper::getFormGroup($toEdit);
          ?>
          </div>
        </div>
      </div>
    </div>
<?php 
  else: 
    require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
    HajjFieldHelper::getFormGroup($toEdit);
  endif 
?>

<h1>المجموعات</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>رقم المجموعة</th>
      <th>اسم المجموعة</th>
      <th>حالة المجموعة</th>
      <th>عدد الأفراد</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&view=groups&Itemid=<?php echo $this->Itemid ?>&id=<?php echo $value->id ?>"><?php echo $value->num_group ?></a></td>
      <td><?php echo $value->name ?></td>
      <td><?php echo ($value->status == 0) ? "ايقاف" : "نشط" ?></td>
      <td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241"><?php echo $value->count ?></a></td>
    </tr>
  <?php endforeach ?>
</table>
