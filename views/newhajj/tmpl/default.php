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

?>

<form action="index.php?option=com_hajj&task=hajj.setnewhajj" method="post">
  <div class="row-fluid">
    <div class="span4">
      <label for="third_name">الاسم الثالث</label>
      <input type="text" name="third_name" id="third_name" required>
    </div>
    <div class="span4">
      <label for="second_name">الاسم الثاني</label>
      <input type="text" name="second_name" id="second_name" required>
    </div>
    <div class="span4">
      <label for="first_name">الاسم الاول</label>
      <input type="text" name="first_name" id="first_name" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label for="nationality">الجنسية</label>
      <?php HajjFieldHelper::getListNationnality() ?>
    </div>
    <div class="span4">
      <label for="sexe">الجنس</label>
      <select name="sexe" id="sexe" required>
        <option></option>
        <option value="m">ذكر</option>
        <option value="f">انثى</option>
      </select>
    </div>
    <div class="span4">
      <label for="familly_name">العائلة</label>
      <input type="text" name="familly_name" id="familly_name" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label for="id_number">رقم الهوية</label>
      <input type="text" name="id_number" id="id_number" required>
    </div>
    <div class="span4">
      <label for="birthday">تاريخ الميلاد</label>
      <?php HajjFieldHelper::getBirthday() ?>
    </div>
    <div class="span4">
      <label for="job">الوظيفة</label>
      <input type="text" name="job" id="job" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label for="rh">فصيلة الدم</label>
      <?php HajjFieldHelper::getRH() ?>
    </div>
    <div class="span4">
      <label for="address">العنوان</label>
      <input type="text" name="address" id="address" required>
    </div>
    <div class="span4">
      <label for="mobile">الجوال</label>
      <input type="text" name="mobile" id="mobile" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <label for="email">البريد الالكتروني</label>
      <input type="text" name="email" id="email" required>
    </div>
    <div class="span4">
      <label for="office_branch">فرع التسجيل</label>
      <?php HajjFieldHelper::GetOfficeBranch() ?>
    </div>
    <div class="span4">
      <label for="hajj_program">برنامج الحج</label>
      <?php HajjFieldHelper::getHajjProgram() ?>
    </div>
  </div>
  <input type="submit" value="حجز و تسجيل" class="btn btn-success">
</form>