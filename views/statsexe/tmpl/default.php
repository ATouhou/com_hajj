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
$sexe = array("m" => "رجال", "f" => "نسـاء");

//var_dump($data);

$th = '';
$td = '';
foreach ($data as $key => $value) {
  $th .= '<th>'.$sexe[$value->sexe].'</th>';
  $td .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&sexe='.$value->sexe.'">'.$value->count.'</a></td>';
}

?>

<h1>تقرير حسب رجال/نسـاء</h1>
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