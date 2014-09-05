<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$hajj = $this->hajj;
$parent = $this->parent;


?>

<?php if ($parent==""): // This is the parent ?>
  <?php if ($hajj->register_status != 1): // Accepted ?>
    <h2> رقم الحجز : <?php echo $hajj->id ?> </h2>
    <h3>مبلغ الحجز : <?php echo $hajj->topay ?> ريال</h3>
  <?php else: // Not accepted ?>
    <h3>لا يمكنكم الإطلاع على طريقة الدفع حتى تتم مراجعة طلبكم</h3>
  <?php endif ?>
<?php else: // This is the Addon?>
   <?php if ($parent->register_status != 1): // Accepted ?>
    <h2> رقم الحجز : <?php echo $hajj->id ?> </h2>
    <h3>المبلغ المطلوب <?php echo $parent->topay ?> وسيتم سداده من رقم الحجز الأصل : <?php echo $parent->id ?></h3>
  <?php else: // Not accepted ?>
    <h3>لا يمكنكم الإطلاع على طريقة الدفع حتى تتم مراجعة طلبكم</h3>
  <?php endif ?>
<?php endif ?>
