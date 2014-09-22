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
$data   = $this->data;
$hajjs  = $this->hajjs;
$groups = $this->groups;
$toEdit = $this->toEdit;

//var_dump($data);

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
            HajjFieldHelper::getFormGroupMember($groups,$hajjs, $toEdit);
          ?>
          </div>
        </div>
      </div>
    </div>
<?php 
  else: 
    require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
    HajjFieldHelper::getFormGroupMember($groups, $hajjs);
  endif 
?>

<h1>أعضاء المجموعة</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>المجموعة</th>
      <th>اسم المجموعة</th>
      <th>رقم الحجز</th>
      <th>الاسم</th>
      <th>رقم الهوية</th>
      <th>ترتيب العضو</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><?php echo $value->num_group ?></td>
      <td><?php echo $value->name ?></td>
      <td><?php echo $value->id ?></td>
      <td><?php echo $value->first_name ?></td>
      <td><?php echo $value->id_number ?></td>
      <td><?php echo $value->order_in_group ?></td>
    </tr>
  <?php endforeach ?>
</table>
