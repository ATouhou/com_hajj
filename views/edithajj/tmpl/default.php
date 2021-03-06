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
$is_addon = $this->is_addon;

?>

<?php if ($data->register_status == '2'): // you can add Payment ?>
  <div class="alert alert-info fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
    <strong>أخي الحاج</strong>  يمكنكم اضافة المبلغ المستحق من شاشة الدفعات مع ارفاق وصل الدفع
  </div>
<?php endif ?>

<?php if ($data->register_status == '2'): // you can add Payment ?>
  <div class="alert fade in alert-error">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>لا يمكنك تعديل البيانات</strong> لقد تم توقيف التحويل لديك
  </div>
<?php endif ?>

<h2>رقم حجزك <?php echo $data->id ?></h2>
<?php 

$all_read_only = ($data->transfer_status || $data->register_status == '4') ? TRUE : FALSE ;
HajjFieldHelper::getEditFormHajj($data, $is_hajj=false, $all_read_only, $is_addon);