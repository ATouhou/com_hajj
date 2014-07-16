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

<h2>سيتم الغاء حجز رقم <?php echo $this->id ?>، هل انت موافق للمتابعة؟</h2>
<a href="index.php?option=com_hajj&amp;task=admin.removehajj&id=<?php echo $this->id ?>" class="btn btn-danger">موافق</a>