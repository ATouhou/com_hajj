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
$data         = $this->data;
$toEdit       = $this->toEdit;

$officeBranch = HajjFieldHelper::$officeBranch;
$authority    = HajjFieldHelper::$authority;
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
                HajjFieldHelper::getFormPersonnel($toEdit);
              ?>
            </div>
          </div>
        </div>
      </div>
  <?php 
    else: 
      require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
      HajjFieldHelper::getFormPersonnel($toEdit);
    endif 
  ?>



<h1>شاشة الموظفين‎</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>اسم الموظف</th>
      <th>اسم المستخدم</th>
      <th>رقم الجوال</th>
      <th>البريد الالكتروني</th>
      <th>الفرع</th>
      <th>الصلاحيات</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&view=adminPersonnel&Itemid=<?php echo $this->Itemid ?>&id=<?php echo $value->id ?>"><?php echo $value->name ?></a></td>
      <td><?php echo $value->username ?></td>
      <td><?php echo $value->phone ?></td>
      <td><?php echo $value->email ?></td>
      <td><?php echo $officeBranch[$value->office_branch-1] ?></td>
      <td><?php echo $authority[$value->authority]?></td>
    </tr>
  <?php endforeach ?>
</table>
