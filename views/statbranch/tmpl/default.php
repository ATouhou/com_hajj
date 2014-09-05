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
$sexe = array(
  'm' => 'رجال',
  'f' => 'نساء',
  );

$th1 = $th2 ='';
$td = '';
$i=0;
while ($i < count($data)) {
  $th1 .= '<th colspan=2>'.$data[$i]->name.'</th>'; //  get the first title
  $th2 .= '<th>'.$sexe[$data[$i+1]->sexe].'</th>'; //  get the second title
  $td  .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$data[$i+1]->id.'&sexe='.$data[$i+1]->sexe.'">'.$data[$i+1]->count.'</a></td>'; //  get the first value
  
  $th2 .= '<th>'.$sexe[$data[$i]->sexe].'</th>'; //  get the second title
  $td  .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$data[$i]->id.'&sexe='.$data[$i]->sexe.'">'.$data[$i]->count.'</a></td>'; //  get the first value

  $i = $i+2;

}

?>

<h1>تقرير حسب فروع التسجيل</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
    <?php echo $th1 ?>
    </tr>
    <tr>
    <?php echo $th2 ?>
    </tr>

  </thead>
  <tr>
    <?php echo $td ?>
  </tr>
</table>