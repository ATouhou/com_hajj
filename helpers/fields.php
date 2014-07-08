<?php

/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http://www.behance.net/kossa
 */
defined('_JEXEC') or die;

class HajjFieldHelper {

    public static $Nationnality     = array("سعودي", "مصري", "أمريكي", "باكستاني  ", "هندي", "أردني", "سوداني", "سوري", "أرجنتيني", "أسباني", "إسترالي", "أفغانستاني", "ألماني", "إماراتي", "اندونيسي", "ايطالي", "بحريني", "برازيلي", "بريطاني", "بنجلاديشي", "تركي", "تونسي", "جزائري", "جنوب أفريقي", "سنغافوري", "سويسري", "سيريلانكي", "صومالي", "صيني", "عراقي", "فرنسي", "فلسطيني", "فليبيني", "فيتنامي", "قطري", "كاميروني", "كندي", "كويتي", "لبناني", "ماليزي", "نيجيري", "نيوزلندي", "ياباني", "يمني", "يوناني", "كويتي بدون", "أزربيجان", "مغربي", "أخري");
    public static $Months           = array("محرم", "صفر", "ربيع الأول", "ربيع الثاني", "جمادى الأول", "جمادى الآخر", "رجب", "شعبان", "رمضان", "شوال", "ذو القعدة", "ذو الحجة");
    public static $RHS              = array("O+", "O-", "A+", "A-", "B+", "B-", "AB+", "AB-");
    public static $hajjProgram      = array("برنامج الفرسان", "برنامج التميز", "برنامج الوسام", "برنامج الصفوة");
    public static $officeBranch     = array("مكة المكرمة", "المدينة المنورة", "جدة");
    public static $status           = array("تحت التدقيق والمراجعة", "مقبول", "مرفوض", "تم الدفع", "الغاء الحجز");
    public static $reason_exception = array("محرم", "طبيب", "عصبة نساء", "مع محرمها", "اداري", "عامل في الحملة", "ممرضة", "حج عن متوفي");

/*
|------------------------------------------------------------------------------------
| Get list of Nation
|------------------------------------------------------------------------------------
*/
  public static function getListNationnality($active = ""){ 
    //var_dump(self::$Nationnality);
    ?>
      <select name="nationality" id="nationality" required>
        <option value=""></option>
        <?php foreach (self::$Nationnality as $key => $value): ?>
            <option <?php echo ($active == $key+1) ? "selected" : "" ?> value="<?php echo $key+1 ?>"><?php echo $value ?></option>
        <?php endforeach ?>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
| Get Nationnality
|------------------------------------------------------------------------------------
*/
  public static function getNationnality($id){
    $id = (int)$id;
    return self::$Nationnality[$id-1];
  }

/*
|------------------------------------------------------------------------------------
| Get Birthday fields
|------------------------------------------------------------------------------------
*/
  public static function getBirthday($active = ""){
        
      if ($active == "") {
          $date = $month = $year = "";
      }else{
          list($date, $month, $year) = explode("/", $active);            
      }
      ?>
      <select class="span4" name="birthday1" id="birthday" required> 
        <option value="">اليوم </option>
        <?php for ($i=1; $i < 31; $i++) :?>
            <option <?php echo ($date == $i) ? "selected" : "" ?> value="<?php echo $i ?>"><?php echo $i ?></option> 
        <?php endfor ?>
      </select>

      <select class="span4" name="birthday2">
        <option <?php echo ($month == "") ? "selected"  : "" ?> value="0">الشهر</option>
          <?php foreach (self::$Months as $key => $value): ?>
              <option <?php echo ($month == $key+1) ? "selected"  : "" ?> value="<?php echo $key+1 ?>"><?php echo $value ?></option>
          <?php endforeach ?>
      </select>

      <select class="span4" name="birthday3">
        <option value="">السنه</option>
        <?php for ($i=1435; $i > 1330; $i--) : ?>
            <option <?php echo ($year == $i) ? "selected" : "" ?> value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php endfor ?>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
| Get RH List
|------------------------------------------------------------------------------------
*/
  public static function getRH($active = ""){
    ?>
      <select name="rh" id="rh">
        <option value=""></option>
        <?php foreach (self::$RHS as $key => $rh): ?>
          <option <?php echo ($active == $key+1) ? "selected" : "" ?> value="<?php echo $key+1 ?>"><?php echo $rh ?></option>
        <?php endforeach ?>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
| Get Hajj Program
|------------------------------------------------------------------------------------
*/
  public static function getHajjProgram($active = ""){    
    ?>
      <select name="hajj_program" id="hajj_program" required>
        <option value=""></option>
        <?php foreach (self::$hajjProgram as $key => $value): ?>
          <option <?php echo ($active == $value) ? "selected" : "" ?> value="<?php echo $value ?>"><?php echo $value ?></option>
        <?php endforeach ?>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
|  Get Office Branch
|------------------------------------------------------------------------------------
*/
  public static function GetOfficeBranch($active = ""){
    ?>
      <select name="office_branch" id="office_branch" required>
        <option value=""></option>
        <?php foreach (self::$officeBranch as $key => $value): ?>
          <option <?php echo ($active == "$value") ? "selected" : "" ?> value="<?php echo $value ?>"><?php echo $value ?></option>
        <?php endforeach ?>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
|  Get Office sexe
|------------------------------------------------------------------------------------
*/
  public static function Getsexe($active = ""){
    ?>
      <select name="sexe" id="sexe" required>
        <option></option>
        <option <?php echo ($active == "m") ? "selected" : "" ?> value="m">ذكر</option>
        <option <?php echo ($active == "f") ? "selected" : "" ?> value="f">انثى</option>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
| Get the Form of Hajj register
|------------------------------------------------------------------------------------
*/
public static function getFormHajj($addon = false){
  ?>
    <form action="index.php?option=com_hajj&task=public.setnewhajj" method="post">
      <div class="row-fluid">
        <div class="span4">
          <label for="third_name">الاسم الثالث</label>
          <input type="text" name="third_name" id="third_name" required>
        </div>
        <div class="span4">
          <label for="second_name">الاسم الثاني</label>
          <input type="text" name="second_name" id="second_name" required>
        </div>
        <div class="span4">
          <label for="first_name">الاسم الاول</label>
          <input type="text" name="first_name" id="first_name" required>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="nationality">الجنسية</label>
          <?php self::getListNationnality() ?>
        </div>
        <div class="span4">
          <label for="sexe">الجنس</label>
          <select name="sexe" id="sexe" required>
            <option></option>
            <option value="m">ذكر</option>
            <option value="f">انثى</option>
          </select>
        </div>
        <div class="span4">
          <label for="familly_name">العائلة</label>
          <input type="text" name="familly_name" id="familly_name" required>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="id_number">رقم الهوية / الإقامة</label>
          <input type="text" name="id_number" id="id_number" required pattern="[0-9]{10}" placeholder="يجب أن يكون عشرة أرقام">
        </div>
        <div class="span4">
          <label for="birthday">تاريخ الميلاد</label>
          <?php self::getBirthday() ?>
        </div>
        <div class="span4">
          <label for="job">الوظيفة</label>
          <input type="text" name="job" id="job" required>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="rh">فصيلة الدم</label>
          <?php self::getRH() ?>
        </div>
        <div class="span4">
          <label for="address">العنوان</label>
          <input type="text" name="address" id="address" required>
        </div>
        <div class="span4">
          <label for="mobile">الجوال</label>
          <input type="text" name="mobile" id="mobile" required placeholder="05xxxxxxxx" pattern="05[0-9]{8}">
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="email">البريد الالكتروني</label>
          <input type="text" name="email" id="email">
        </div>
        <div class="span4">
          <label for="office_branch">فرع التسجيل</label>
          <?php self::GetOfficeBranch() ?>
        </div>
        <div class="span4">
          <label for="hajj_program">برنامج الحج</label>
          <?php self::getHajjProgram() ?>
        </div>
      </div>
      <?php if ($addon): ?>
      <div class="row-fluid">
        <div class="span4"></div>
        <div class="span4"></div>
        <div class="span4">
          <label for="email">سبب الاستثناء</label>
          <?php self::getReasonException() ?>
        </div>
      </div>
      <?php endif ?>
      <input type="submit" value="حجز و تسجيل" class="btn btn-success">
    </form>
  <?php
}
  


/*
|------------------------------------------------------------------------------------
| Get the Form of Hajj register
|------------------------------------------------------------------------------------
*/
public static function getEditFormHajj($data, $admin=false){
  ?>
    <form action="index.php?option=com_hajj&task=hajj.setedithajj" method="post">
      <input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
      <div class="row-fluid">
        <div class="span4">
          <label for="third_name">الاسم الثالث</label>
          <input type="text" name="third_name" id="third_name" value="<?php echo $data->third_name ?>" required>
        </div>
        <div class="span4">
          <label for="second_name">الاسم الثاني</label>
          <input type="text" name="second_name" id="second_name" value="<?php echo $data->second_name ?>" required>
        </div>
        <div class="span4">
          <label for="first_name">الاسم الاول</label>
          <input type="text" name="first_name" id="first_name" value="<?php echo $data->first_name ?>" required>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="nationality">الجنسية</label>
          <?php HajjFieldHelper::getListNationnality($data->nationality) ?>
        </div>
        <div class="span4">
          <label for="sexe">الجنس</label>
          <?php HajjFieldHelper::getsexe($data->sexe) ?>
        </div>
        <div class="span4">
          <label for="familly_name">العائلة</label>
          <input type="text" name="familly_name" id="familly_name" value="<?php echo $data->familly_name ?>" required>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="id_number">رقم الهوية / الإقامة</label>
          <input type="text" name="id_number" id="id_number" value="<?php echo $data->id_number ?>" disabled pattern="[0-9]{10}" placeholder="يجب أن يكون عشرة أرقام">
        </div>
        <div class="span4">
          <label for="birthday">تاريخ الميلاد</label>
          <?php HajjFieldHelper::getBirthday($data->birthday) ?>
        </div>
        <div class="span4">
          <label for="job">الوظيفة</label>
          <input type="text" name="job" id="job" value="<?php echo $data->job ?>" required>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="rh">فصيلة الدم</label>
          <?php HajjFieldHelper::getRH($data->rh) ?>
        </div>
        <div class="span4">
          <label for="address">العنوان</label>
          <input type="text" name="address" id="address" value="<?php echo $data->address ?>" required>
        </div>
        <div class="span4">
          <label for="mobile">الجوال</label>
          <input type="text" name="mobile" id="mobile" value="<?php echo $data->mobile ?>" required placeholder="05xxxxxxxx" pattern="05[0-9]{8}">
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="email">البريد الالكتروني</label>
          <input type="text" name="email" id="email" value="<?php echo $data->email ?>" required>
        </div>
        <div class="span4">
          <label for="office_branch">فرع التسجيل</label>
          <?php HajjFieldHelper::GetOfficeBranch($data->office_branch) ?>
        </div>
        <div class="span4">
          <label for="hajj_program">برنامج الحج</label>
          <?php HajjFieldHelper::getHajjProgram($data->hajj_program) ?>
        </div>
      </div>
      <?php if ($admin): ?>
      <div class="row-fluid">
        <div class="span4"></div>
        <div class="span4"></div>
        <div class="span4">
          <label for="register_status">حالة الحجز</label>
          <?php HajjFieldHelper::getListStatus($data->register_status) ?>
        </div>
      </div>
      <?php endif ?>
      <input type="submit" value="حفظ التعديل" class="btn btn-success">
    </form>
  <?php
}

/*
|------------------------------------------------------------------------------------
| Get Hajj Program
|------------------------------------------------------------------------------------
*/
  public static function getReasonException($active = ""){
    ?>
      <select name="reason_exception" id="reason_exception" required>
        <option value="0"></option>
        <?php foreach (self::$reason_exception as $key => $value): ?>
          <option <?php echo ($active == $key+1) ? "selected" : "" ?> value="<?php echo $key+1 ?>"><?php echo $value ?></option>
        <?php endforeach ?>
      </select>
    <?php
  }  

/*
|------------------------------------------------------------------------------------
| Get List Status
|------------------------------------------------------------------------------------
*/
  public static function getListStatus($active = ""){
    ?>
      <select name="register_status" id="register_status" required>
        <?php foreach (self::$status as $key => $value): ?>
            <option <?php echo ($active == $key+1) ? "selected" : "" ?> value="<?php echo $key+1 ?>"><?php echo $value ?></option>
        <?php endforeach ?>
      </select>
    <?php 
  }



/*
|------------------------------------------------------------------------------------
| Status register
|------------------------------------------------------------------------------------
*/
  public static function status_register($id){
    return isset(self::$status[$id-1]) ? self::$status[$id-1] : "" ;
  }


}

