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

$th = '';
$td = '';
foreach ($data as $key => $value) {
  $th .= '<th>'.$value->name.'</th>';
  $td .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$value->id.'">'.$value->count.'</a></td>';
}

?>

<h1>تقرير حسب فروع التسجيل</h1>
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