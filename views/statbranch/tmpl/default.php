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

?>

<h1>تقرير حسب فروع التسجيل</h1>
<table class="allhajjs table table-condensed table-bordered">
  
<?php foreach ($data as $key => $value): ?>
  <thead>
    <tr>
      <td>
        عدد الطلبات في فرع : <strong><?php echo $value->office_branch ?> </strong>
        و ببرنامج : <strong><?php echo $value->hajj_program ?></strong> => <strong><?php echo $sexe[$value->sexe] ?></strong> : 
      </td>
      <td>
        <?php echo $value->count ?>
      </td>
    </tr> 
  </thead>
<?php endforeach ?>
</table>