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
$Nationnality = HajjFieldHelper::$Nationnality;

$data = $this->data;
$sexe = array("m" => "رجال", "f" => "نسـاء");

//var_dump($data);


?>

<h1>تقرير حسب البلد</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>البلد</th>
      <th>العدد</th>
    </tr>
  </thead>
  
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><?php echo $Nationnality[$value->nationality-1] ?></td>
      <td><?php echo $value->count ?></td>
    </tr>
  <?php endforeach ?>

</table>