<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$hajjs = $this->hajjs;
//var_dump($hajjs);

?>
<h2>تنشيط/إيقاف التحويل</h2>
<form class="mt30" action="index.php?option=com_hajj&task=admin.setTransferStatus" method="post" accept-charset="utf-8">
  <div class="row-fluid">
    <div class="span4">
      <input type="submit" class="btn btn-success" name="" value="تحديث">
    </div>
    <div class="span4">
      <select name="transfer_status">
        <option value="0">لا</option>
        <option value="1">نعم</option>
      </select>
    </div>
    <div class="span4">
      <select name="id[]" multiple required>
        <?php foreach ($hajjs as $key => $hajj): ?>
            <option value="<?php echo $hajj->id ?>"><?php echo $hajj->id . ' - ' . $hajj->first_name . ' ' .$hajj->familly_name  ?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
</form>


