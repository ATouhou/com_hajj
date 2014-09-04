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

$data   = $this->data;
$Hajjs  = $this->allHajjs;
$toEdit =$this->toEdit;


//var_dump($data);
//var_dump($Hajjs);

?>
<h1>المستندات المطلوبة</h1>
<div class="row-fluid">
  <div class="span6">
    <h4>لغير السعوديين (رجال + نساء) :</h4>
    <ol>
      <li>خطاب الكفيل من الجوازات</li>
      <li>عدد ٤ صور شمسية</li>
      <li>صورة الإقامة</li>
      <li>كرت التطعيم + فصيلة الدم</li>
    </ol>
    
  </div>
  <div class="span6">
    <h4>للسعوديين :</h4>
      <ul>
        <li>الرجال :
          <ol>
            <li>البطاقة الشخصية</li>
            <li>عدد ٤ صور شخصية</li>
            <li>كرت التطعيم + فصيلة الدم</li>
          </ol>
        </li>
        <li>النساء :
          <ol>
            <li>صورة كرت العائلة أو البطاقة الشخصية</li>
            <li>كرت التطعيم + فصيلة الدم</li>
          </ol>
          
        </li>
      </ul>
  </div>
</div>



<?php if ($toEdit == ""): ?>
    <div class="accordion" id="accordion2">
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            <span class="btn">اضافة</span>
          </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse">
          <div class="accordion-inner">
          
          <?php
            HajjFieldHelper::getFormAddDocument($Hajjs,$toEdit);
          ?>
          </div>
        </div>
      </div>
    </div>
  <?php 
    else: 
      HajjFieldHelper::getFormAddDocument($Hajjs,$toEdit);
    endif 
  ?>




<table class="allhajjs table table-condensed table-bordered">
  <thead>
    <tr>
      <th>رقم الحجز</th>
      <th>نوع المستند</th>
      <th>المستند</th>
    </tr>
  </thead>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><a href="index.php?option=com_hajj&task=hajj.adddocument&id=<?php echo $value->id ?>"><?php echo $value->id_hajj ?></a></td>
      <td><?php echo HajjFieldHelper::$documents[$value->document] ?></td>
      <td>
        <a target="_blank" href="<?php echo 'index.php?option=com_hajj&task=hajj.getImgDocument&img='.$value->link; ?>">المستند</a>
      </td>
    </tr>
    <?php endforeach ?>
</table>
