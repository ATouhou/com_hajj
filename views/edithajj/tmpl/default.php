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

?>

<h2>رقم حجزك <?php echo $data->id ?></h2>
<?php 
$all_read_only = ($data->transfer_status) ? TRUE : FALSE ;
HajjFieldHelper::getEditFormHajj($data, $is_hajj=false, $all_read_only);