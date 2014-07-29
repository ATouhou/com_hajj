<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$user = $this->data;
//var_dump($user);
?>

<?php if ($user->register_status == 2): // Accepted ?>
  <h2> رقم الحجز : <?php echo $user->id ?> </h2>
  <h2>مبلغ الحجز : <?php echo $user->topay ?> ريال<h2>
<?php else: // Not accepted ?>
  <h3>لا يمكنكم الإطلاع على طريقة الدفع حتى تتم مراجعة طلبكم</h3>
<?php endif ?>