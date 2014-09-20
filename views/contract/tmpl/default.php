<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
require_once JPATH_COMPONENT.'/helpers/' .'fields.php';

$data       = $this->data;
$Hajjs      = $this->allHajjs;
$toEdit     =$this->toEdit;
$is_manager =$this->is_manager;

$ProgramList      = HajjFieldHelper::getHajjProgramList($is_admin=true);
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList($is_admin=true);

//var_dump($data);
//var_dump($Hajjs);

?>
<h1>شاشة العقود</h1>

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
              HajjFieldHelper::getFormAddContracts($Hajjs,$toEdit);
            ?>
            </div>
          </div>
        </div>
      </div>
    <?php 
      else: 
        HajjFieldHelper::getFormAddContracts($Hajjs,$toEdit);
      endif 
    ?>

<table class="allhajjs table table-condensed table-bordered mt30">
  <thead>
    <tr>
      <th>رقم الحجز</th>
      <th>الاسم الأول</th>
      <th>العائلة</th>
      <th>فرع التسجيل</th>
      <th>برنامج الحج</th>
      <th>رقم حجز المرافق</th>
      <th>رقم العقد </th>
      <th>تاريخ العقد </th>
      <th>ارفاق العقد</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $hajj): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&task=hajj.addContract&id=<?php echo $hajj->id ?>"><?php echo $hajj->id_hajj ?></a></td>
      <td><?php echo $hajj->first_name ?></td>
      <td><?php echo $hajj->familly_name ?></td>
      <td><?php echo $OfficeBranchList[$hajj->office_branch] ?></td>
      <td><?php echo $ProgramList[$hajj->hajj_program] ?></td>
      <td><?php echo $hajj->addon ?></td>
      <td><?php echo $hajj->contract_num ?></td>
      <td><?php echo $hajj->date_contract ?></td>
      <td>
        <a target="_blank" href="<?php echo 'index.php?option=com_hajj&task=hajj.getImgContract&pdf='.$hajj->link; ?>">العقد</a>
      </td>
    </tr>
    <?php endforeach ?>
</table>
