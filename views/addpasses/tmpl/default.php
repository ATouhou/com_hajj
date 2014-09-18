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


//var_dump($data);
//var_dump($Hajjs);

?>
<h1>شاشة التصاريح</h1>

<?php if (!$is_manager): ?>
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
              HajjFieldHelper::getFormAddPasses($Hajjs,$toEdit);
            ?>
            </div>
          </div>
        </div>
      </div>
    <?php 
      else: 
        HajjFieldHelper::getFormAddPasses($Hajjs,$toEdit);
      endif 
    ?>
<?php endif ?>

<table class="allhajjs table table-condensed table-bordered mt30">
  <thead>
    <tr>
      <th>رقم الحجز</th>
      <th>الاسم الأول</th>
      <th>الهوية</th>
      <th>الجنس</th>
      <th>الحالة الاجتماعية</th>
      <th>الجنسية</th>
      <th>رقم التصريح</th>
      <th>ملف التصريح</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&task=hajj.addPasse&id=<?php echo $value->id ?>"><?php echo $value->id_hajj ?></a></td>
      <td><?php echo $value->first_name ?></td>
      <td><?php echo $value->id_number ?></td>
      <td><?php echo ($value->sexe == 'm') ? 'ذكر': 'انثى' ?></td>
      <td><?php echo HajjFieldHelper::$relationship[$value->relationship] ?></td>
      <td><?php echo HajjFieldHelper::getNationnality($value->nationality) ?></td>
      <td><?php echo $value->pass_num ?></td>
      <td>
        <a target="_blank" href="<?php echo 'index.php?option=com_hajj&task=hajj.getImgPasse&pdf='.$value->link; ?>">التصريح</a>
      </td>
    </tr>
    <?php endforeach ?>
</table>
