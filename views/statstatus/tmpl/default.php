<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
require_once JPATH_COMPONENT.'/helpers/' .'fields.php';
$status_hajjs = HajjFieldHelper::$status_hajjs;

$data = $this->data;
var_dump($data);

$th = '';
$td = '';
foreach ($data as $key => $value) {
  $th .= '<th>'.$status_hajjs[$value->register_status-1].'</th>';
  $td .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&register_status='.$value->register_status.'">'.$value->count.'</a></td>';
}

?>

<h1>تقرير حسب حالة الحجز</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
    <?php echo $th ?>
    </tr>
  </thead>
  <tr>
    <?php echo $td ?>
  </tr>
</table>