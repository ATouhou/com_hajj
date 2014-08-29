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
$ProgramList = HajjFieldHelper::getHajjProgramList($is_admin=true);
$data = $this->data;
$toEdit = $this->toEdit;

//var_dump($data);

?>

  <?php if ($toEdit == ""): ?>
    <?php if (!$this->readonly): ?>
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
                HajjFieldHelper::getFormtents($toEdit, $this->readonly);
              ?>
            </div>
          </div>
        </div>
      </div>
    <?php endif ?>
  <?php 
    else: 
      require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
      HajjFieldHelper::getFormtents($toEdit, $this->readonly);
    endif 
  ?>



<h1>شاشة الخيام</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>رقم الخيمة</th>
      <th>المخيم</th>
      <th>برنامج الحج</th>
      <th>مخصص الى</th>
      <th>عدد الأسرة</th>
      <th>أسرة شاغرة</th>
      <th>أسرة محجوزة</th>
      <th>حالة الخيمة</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&view=admintents&Itemid=<?php echo $this->Itemid ?>&id=<?php echo $value->id ?>"><?php echo $value->id ?></a></td>
      <td><?php echo $value->name ?></td>
      <td><?php echo $ProgramList[$value->hajj_program] ?></td>
      <td><?php echo HajjFieldHelper::$sexe[$value->sexe] ?></td>
      <td><?php echo $value->nb_family ?></td>
      <td></td>
      <td></td>
      <td><?php echo HajjFieldHelper::$status_tents[$value->status] ?></td>
    </tr>
  <?php endforeach ?>
</table>
