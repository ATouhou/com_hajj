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

<form class="mt30" action="index.php?option=com_hajj&task=admin.setRegisterStatus" method="post" accept-charset="utf-8">
  <div class="row-fluid">
    <div class="span4">
      <input type="submit" class="btn btn-success" name="" value="تحديث">
    </div>
    <div class="span4">
      <select name="status">
        <option value="1" <?php echo ($this->status == 1)? "selected" : "" ?>>لا</option>
        <option value="0" <?php echo ($this->status == 0)? "selected" : "" ?>>نعم</option>
      </select>
    </div>
    <div class="span4">
      <h3 class="m0">إيقاف الحجز الإلكتروني</h3>
    </div>
  </div>



</form>
