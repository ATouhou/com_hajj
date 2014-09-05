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
//var_dump($data);

$th = '';
$td = '';

foreach ($data as $key => $value) {
  $th .= '<th>'.$status_hajjs[$value->register_status-1].'</th>';
  $url = ($value->register_status == 3 || $value->register_status == 5)? 
    'index.php?option=com_hajj&task=admin.hajjs&deny=1&Itemid=289' :
    'index.php?option=com_hajj&task=admin.hajjs&Itemid=241&register_status='.$value->register_status.'';
  $td .= '<td><a href="'.$url.'">'.$value->count.'</a></td>';
}

?>

<h1>تقرير حسب حالة الحجز</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
    <?php foreach ($status_hajjs as $key => $status_hajj): ?>
      <th><?php echo $status_hajj ?></th>
    <?php endforeach ?>
    </tr>
  </thead>
  <tr>
  <?php foreach ($status_hajjs as $status_hajj_i => $status_hajj): ?>
        <?php 
          $txt = ''; 
          $url = ($status_hajj_i+1 == 3 || $status_hajj_i+1 == 5)? 
        'index.php?option=com_hajj&task=admin.hajjs&deny=1&Itemid=289' :
        'index.php?option=com_hajj&task=admin.hajjs&Itemid=241&register_status='.($status_hajj_i+1).'';
        ?>
        <?php foreach ($data as $x => $value): ?>
          <?php if ($value->register_status == $status_hajj_i+1): ?>
            <?php $txt = $value->count; break; ?>
          <?php endif ?>
        <?php endforeach ?>
      <td>
        <a href="<?php echo $url ?>"><?php echo ($txt != '')? $txt: 0;?></a>
      </td>
  <?php endforeach ?>
  </tr>
 
</table>