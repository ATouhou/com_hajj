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

$sexe = array(
  'm' => 'رجال',
  'f' => 'نساء',
  ); 

$th1 = $th2 = $th3 ='';
$th1_sub = $th2_sub = $th3_sub ='';
$td = '';
$i=0;
while ($i < count($data)) {

  $x1 = intval($data[$i]->count);
  $x2 = intval($data[$i+1]->count);
  $x3 = intval($data[$i+2]->count);
  $x4 = intval($data[$i+3]->count);
  $x5 = intval($data[$i+4]->count);
  $x6 = intval($data[$i+5]->count);

  $th1     .= '<th colspan=6>'.$data[$i]->office_branch.'</th>'; // Branch Title
  $th1_sub .= '<th colspan=6>'. ($x1 + $x2 + $x3 + $x4 + $x5 + $x6).'</td>';
  
  $th2     .= '<th colspan=2>'.$data[$i]->hajj_program.'</th>'; // Program Title
  $th2     .= '<th colspan=2>'.$data[$i+2]->hajj_program.'</th>';
  $th2     .= '<th colspan=2>'.$data[$i+4]->hajj_program.'</th>';
  $th2_sub .= '<th colspan=2>'.($x1+$x2).'</th>';
  $th2_sub .= '<th colspan=2>'.($x3+$x4).'</th>';
  $th2_sub .= '<th colspan=2>'.($x5+$x6).'</th>';
  
  $th3     .= '<th>'.$sexe[$data[$i+1]->sexe].'</th>';// Sexe Title
  $th3     .= '<th>'.$sexe[$data[$i]->sexe].'</th>';
  $th3     .= '<th>'.$sexe[$data[$i+1]->sexe].'</th>';// Sexe Title
  $th3     .= '<th>'.$sexe[$data[$i]->sexe].'</th>';
  $th3     .= '<th>'.$sexe[$data[$i+1]->sexe].'</th>';// Sexe Title
  $th3     .= '<th>'.$sexe[$data[$i]->sexe].'</th>';
  
  $td      .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$data[$i+1]->id.'&sexe='.$data[$i+1]->sexe.'">'.$x2.'</a></td>';
  $td      .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$data[$i]->id.'&sexe='.$data[$i]->sexe.'">'.$x1.'</a></td>';
  
  $td      .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$data[$i+3]->id.'&sexe='.$data[$i+3]->sexe.'">'.$x4.'</a></td>';
  $td      .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$data[$i+2]->id.'&sexe='.$data[$i+2]->sexe.'">'.$x3.'</a></td>';
  
  $td      .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$data[$i+5]->id.'&sexe='.$data[$i+5]->sexe.'">'.$x6.'</a></td>';
  $td      .= '<td><a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch='.$data[$i+4]->id.'&sexe='.$data[$i+4]->sexe.'">'.$x5.'</a></td>';

  $i = $i+6;

}

?>

<h1>تقرير حسب فروع التسجيل</h1>
<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
    <?php echo $th1 ?>
    </tr>
    <tr>
    <?php echo $th1_sub ?>
    </tr>
    <tr>
    <?php echo $th2 ?>
    </tr>
    <?php echo $th2_sub ?>
    <tr>
    <?php echo $th3 ?>
    </tr>

  </thead>
  <tr>
    <?php echo $td ?>
  </tr>
</table>