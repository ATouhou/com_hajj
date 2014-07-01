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
?>

<p>مرحبا <?php echo $user->first_name . " " . $user->second_name . " " . $user->familly_name; ?></p>
<p>شكرا لك على اختيارك للشركة.</p>
<p>.رقم حجزك : <?php echo $user->id ?></p>
<p>تم تسجيل دخولك و.يمكنك الآن الاستفادة من خدماتنا الالكترونية.</p>
