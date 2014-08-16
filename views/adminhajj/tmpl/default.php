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
$data = $this->data;
//var_dump($data);

?>
<h1>تعديل <?php echo $data->id ?></h1>

<?php 
HajjFieldHelper::getEditFormHajj($data, $is_admin=true); // True for Admin