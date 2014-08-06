<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$data = $this->data;

?>

<h1>الإدارة العامة</h1>
<form action="index.php?option=com_hajj&task=admin.setAdminInfo" method="post" accept-charset="utf-8">
  <div class="row-fluid">
    <div class="span6">
      <label for="tel">الهاتف</label>
      <input type="text" name="tel" id="tel" value="<?php echo (isset($data->tel)) ? $data->tel : "" ?>">

      <label for="fax">الفاكس</label>
      <input type="text" name="fax" id="fax" value="<?php echo (isset($data->fax)) ? $data->fax : "" ?>">

      <label for="mobile">الجوال</label>
      <input type="text" name="mobile" id="mobile" value="<?php echo (isset($data->mobile)) ? $data->mobile : "" ?>">

      <label for="logo_field">الشعار</label>
      <textarea name="logo" id="logo_field" row="5" cols="30"><?php echo (isset($data->logo)) ? $data->logo : "" ?></textarea>

    </div>

    <div class="span6">
      <label for="name">الإسم</label>
      <input type="text" name="name" id="name" value="<?php echo (isset($data->name)) ? $data->name : "" ?>" required>

      <label for="commercial_register">السجل التجاري</label>
      <input type="text" name="commercial_register" id="commercial_register" value="<?php echo (isset($data->commercial_register)) ? $data->commercial_register : "" ?>">

      <label for="address">العنوان  الرئيسي</label>
      <input type="text" name="address" id="address" value="<?php echo (isset($data->address)) ? $data->address : "" ?>">

      <label for="email">البريد الالكتروني</label>
      <input type="email" name="email" id="email" required value="<?php echo (isset($data->email)) ? $data->email : "" ?>">

      <br>
      <input type="submit" name="" value="حفــظ" class="btn btn-success">

    </div>
  </div>
</form>