<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<form action="index.php?option=com_hajj&task=hajj.setnewhajjaddon" method="post">
  <div class="row-fluid">
    <div class="span6">
      <label for="id_number">رقم الهوية</label>
      <input type="text" name="id_number" id="id_number">
    </div>
    <div class="span6">
      <label for="addon">رقم الحجز</label>
      <input type="text" name="addon" id="addon" value="<?php echo $this->id ?>">
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <label for="email">البريد الالكتروني</label>
      <input type="text" name="email" id="email">
    </div>
    <div class="span6">
      <label for="first_name">الاسم الاول</label>
      <input type="text" name="first_name" id="first_name">
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <label for="mobile">الجوال</label>
      <input type="text" name="mobile" id="mobile">
    </div>
    <div class="span6">
      <label for="second_name">الاسم الثاني</label>
      <input type="text" name="second_name" id="second_name">
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <label for="office_branch">فرع التسجيل</label>
      <input type="text" name="office_branch" id="office_branch">
    </div>
    <div class="span6">
      <label for="third_name">الاسم الثالث</label>
      <input type="text" name="third_name" id="third_name">
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <label for="hajj_program">برنامج الحج</label>
      <input type="text" name="hajj_program" id="hajj_program">
    </div>
    <div class="span6">
      <label for="familly_name">العائلة</label>
      <input type="text" name="familly_name" id="familly_name">
    </div>
  </div>
  <input type="submit" value="حجز و تسجيل" class="btn btn-success">
</form>