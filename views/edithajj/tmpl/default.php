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
//var_dump($this->data);
$data = $this->data;
?>
<h2>رقم حجزك <?php echo $data->id ?></h2>
<form action="index.php?option=com_hajj&task=hajj.setedithajj" method="post">
  <input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
  <div class="row-fluid">
    <div class="span4">
      <label for="third_name">الاسم الثالث</label>
      <input type="text" name="third_name" id="third_name" value="<?php echo $data->third_name ?>" required>
    </div>
    <div class="span4">
      <label for="second_name">الاسم الثاني</label>
      <input type="text" name="second_name" id="second_name" value="<?php echo $data->second_name ?>" required>
    </div>
    <div class="span4">
      <label for="first_name">الاسم الاول</label>
      <input type="text" name="first_name" id="first_name" value="<?php echo $data->first_name ?>" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label for="nationality">الجنسية</label>
      <?php HajjFieldHelper::getListNationnality($data->nationality) ?>
    </div>
    <div class="span4">
      <label for="sexe">الجنس</label>
      <?php HajjFieldHelper::getsexe($data->sexe) ?>
    </div>
    <div class="span4">
      <label for="familly_name">العائلة</label>
      <input type="text" name="familly_name" id="familly_name" value="<?php echo $data->familly_name ?>" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label for="id_number">رقم الهوية</label>
      <input type="text" name="id_number" id="id_number" value="<?php echo $data->id_number ?>" disabled>
    </div>
    <div class="span4">
      <label for="birthday">تاريخ الميلاد</label>
      <?php HajjFieldHelper::getBirthday($data->birthday) ?>
    </div>
    <div class="span4">
      <label for="job">الوظيفة</label>
      <input type="text" name="job" id="job" value="<?php echo $data->job ?>" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label for="rh">فصيلة الدم</label>
      <?php HajjFieldHelper::getRH($data->rh) ?>
    </div>
    <div class="span4">
      <label for="address">العنوان</label>
      <input type="text" name="address" id="address" value="<?php echo $data->address ?>" required>
    </div>
    <div class="span4">
      <label for="mobile">الجوال</label>
      <input type="text" name="mobile" id="mobile" value="<?php echo $data->mobile ?>" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label for="email">البريد الالكتروني</label>
      <input type="text" name="email" id="email" value="<?php echo $data->email ?>" required>
    </div>
    <div class="span4">
      <label for="office_branch">فرع التسجيل</label>
      <?php HajjFieldHelper::GetOfficeBranch($data->office_branch) ?>
    </div>
    <div class="span4">
      <label for="hajj_program">برنامج الحج</label>
      <?php HajjFieldHelper::getHajjProgram($data->hajj_program) ?>
    </div>
  </div>
  <input type="submit" value="حفظ التعديل" class="btn btn-success">
</form>