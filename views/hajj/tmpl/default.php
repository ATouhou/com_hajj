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


$Programs  = $this->Program;
$Registers = $this->Register;
$Sexes     = $this->Sexe;
$NewHajjs  = $this->NewHajjs;
$Branchs  = $this->Branch;
$ProgramList      = HajjFieldHelper::getHajjProgramList($is_admin=true);
$OfficeBranchList = HajjFieldHelper::getHajjOfficeBranchList($is_admin=true);

$theSexe   = array(
  "m"=>"رجال",
  "f"=>"نسـاء"
);

//var_dump($Programs);
//var_dump($Registers);
//var_dump($Sexes);
//var_dump($NewHajjs);
//var_dump($NewHajjs);
//var_dump($Branchs);


/*
|------------------------------------------------------------------------------------
| Display Stats by Program
|------------------------------------------------------------------------------------
*/
?>

<section class="dash-program">
  <ul class="inline">
  <?php foreach ($Programs as $key => $program): ?>
    <li>
      <a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&hajj_program=<?php echo $program->id ?>">
        <h3><?php echo str_replace("برنامج ", '', $program->name) ?></h3>
        <span><?php echo $program->count ?></span>
      </a>
    </li>
  <?php endforeach ?>
  </ul>
</section>

<?php 

/*
|------------------------------------------------------------------------------------
| Display Stats by Register Status and Sexe
|------------------------------------------------------------------------------------
*/
 ?>

 <div class="row-fluid">
   <div class="span4">
     <section class="dash-sexe">
      <ul class="inline">
      <?php foreach ($Sexes as $key => $sexe): ?>
        <li>
          <a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&sexe=<?php echo $sexe->sexe ?>">
            <h3><?php echo $theSexe[$sexe->sexe] ?></h3>
            <span><?php echo $sexe->count ?></span>
          </a>
        </li>
      <?php endforeach ?>
      </ul>
     </section>
     <section class="dash-branch">
      <ul class="inline">
      <?php foreach ($Branchs as $key => $Branch): ?>
        <li>
          <a href="index.php?option=com_hajj&task=admin.hajjs&Itemid=241&office_branch=<?php echo $Branch->id_branch ?>">
            <h3><?php echo $Branch->office_branch ?></h3>
            <span><?php echo $Branch->count ?></span>
          </a>
        </li>
      <?php endforeach ?>
      </ul>
     </section>
   </div>
   <div class="span8 bdl">
     <section class="dash-register">
      <ul class="inline">
      <?php foreach ($Registers as $key => $register): ?>
        <?php 
          $url = ($register->register_status == 3 || $register->register_status == 5)? 
                'index.php?option=com_hajj&task=admin.hajjs&deny=1&Itemid=289' :
                'index.php?option=com_hajj&task=admin.hajjs&Itemid=241&register_status='.$register->register_status.'';
         ?>
        <li>
          <a href="<?php echo $url ?>"><h3><?php echo HajjFieldHelper::$status_hajjs[$register->register_status-1] ?></h3>
            <span><?php echo $register->count ?></span></a>
        </li>
      <?php endforeach ?>
      </ul>
     </section>
   </div>
 </div>

<?php 

/*
|------------------------------------------------------------------------------------
| Get the latest Registers
|------------------------------------------------------------------------------------
*/
 ?>

 <div class="mt25"></div>
 <h2>المسجلين حديثا</h2>
 <table id="tblExport" class="allhajjs table table-condensed table-bordered mt30">
  <thead>
    <tr>
      <th>الحجز</th>
      <th>الاسم الاول</th>
      <th>العائلة</th>
      <th>فرع التسجيل</th>
      <th>برنامج الحج</th>
      <th>رقم حجز المرافق</th>
      <th colspan="3">الإجراءات</th>
    </tr>
  </thead>
  <?php foreach ($NewHajjs as $key => $value): ?>
    <tr <?php echo ($value->register_status == 4) ? 'class="success"':''; ?>>
      <td><a href="index.php?option=com_hajj&task=admin.hajj&id=<?php echo $value->id ?>"><?php echo $value->id ?></a></td>
      <td><?php echo $value->first_name ?></td>
      <td><?php echo $value->familly_name ?></td>
      <td><?php echo $OfficeBranchList[$value->office_branch] ?></td>
      <td><?php echo $ProgramList[$value->hajj_program] ?></td>
      <td><?php echo $value->addon ?></td>
      <td><a class="btn btn-success" href="index.php?option=com_hajj&task=admin.acceptHajj&value=2&id=<?php echo $value->id ?>&mobile=<?php echo $value->mobile ?>">قبول الطلب </a></td>
      <td><a class="btn btn-danger" href="index.php?option=com_hajj&task=admin.acceptHajj&value=3&id=<?php echo $value->id ?>&mobile=<?php echo $value->mobile ?>">رفض الطلب </a></td>
      <td><a class="btn btn-warning" href="index.php?option=com_hajj&task=admin.acceptHajj&value=5&id=<?php echo $value->id ?>&mobile=<?php echo $value->mobile ?>">الغاء الطلب </a></td>
    </tr>
  <?php endforeach ?>
</table>