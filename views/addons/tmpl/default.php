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

?>
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
        HajjFieldHelper::getFormHajj(true);
      ?>
      </div>
    </div>
  </div>
</div>

<h2>قائمة المرافقين</h2>
<table class="table table-bordered list-addons">
  <tr>
    <th>رقم الحجز</th>
    <th>الاسم الاول</th>
    <th>العائلة</th>
    <th>رقم الهوية</th>
    <th>الجوال</th>
    <th>فرع التسجيل</th>
    <th>برنامج الحج </th>

<?php foreach ($data as $key => $hajj): ?>
  <tr>
    <td><?php echo $hajj->id ?></td>
    <td><?php echo $hajj->first_name ?></td>
    <td><?php echo $hajj->familly_name ?></td>
    <td><?php echo $hajj->id_number ?></td>
    <td><?php echo $hajj->mobile ?></td>
    <td><?php echo $hajj->office_branch ?></td>
    <td><?php echo $hajj->hajj_program ?></td>
  </tr>
<?php endforeach ?>

  </tr>
</table>

