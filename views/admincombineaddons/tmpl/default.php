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

//var_dump($data);

?>
<h1> ضم مرافق</h1>
<form action="index.php?option=com_hajj&task=admin.setCombineAddons" method="post" accept-charset="utf-8" class="mt30">
  <div class="row-fluid">
    <div class="span4 offset4">
      <select name="original">
      <option value="0">0 - فصل مرافق</option>
      <?php foreach ($data as $key => $hajjs): ?>
          <option value="<?php echo $hajjs->id ?>"><?php echo $hajjs->id . ' - ' . $hajjs->first_name . ' ' .$hajjs->familly_name  ?></option>
      <?php endforeach ?>
      </select>
    </div>
    <div class="span4">
      <h4 class="m0">رقم حجز الأصل</h4>
    </div>
  </div>
  
  <div class="row-fluid mt30">
    <div class="span4 offset4">
      <select name="addons[]" multiple>
      <?php foreach ($data as $key => $hajjs): ?>
          <option value="<?php echo $hajjs->id ?>"><?php echo $hajjs->id . ' - ' . $hajjs->first_name . ' ' .$hajjs->familly_name  ?></option>
      <?php endforeach ?>
      </select>
    </div>
    <div class="span4">
      <h4 class="m0">رقم حجز المرافق</h4>
    </div>
  </div>

  <input type="submit" name="" value="تحديث" class="btn btn-danger mt30">


</form>
