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

/*
|------------------------------------------------------------------------------------
| Get list of Nation
|------------------------------------------------------------------------------------
*/
  public static function getListNationnality($active = ""){ 
    ?>
      <select name="nationality" id="nationality" required>
        <option value=""></option>
        <option <?php echo ($active == 1) ? "selected" : "" ?> value="1">سعودي</option>
        <option <?php echo ($active == 2) ? "selected" : "" ?> value="2">مصري</option>
        <option <?php echo ($active == 3) ? "selected" : "" ?> value="3">أمريكي</option>
        <option <?php echo ($active == 4) ? "selected" : "" ?> value="4">باكستاني  </option>
        <option <?php echo ($active == 5) ? "selected" : "" ?> value="5">هندي</option>
        <option <?php echo ($active == 6) ? "selected" : "" ?> value="6">أردني</option>
        <option <?php echo ($active == 7) ? "selected" : "" ?> value="7">سوداني</option>
        <option <?php echo ($active == 8) ? "selected" : "" ?> value="8">سوري</option>
        <option <?php echo ($active == 10) ? "selected" : "" ?> value="10">أرجنتيني</option>
        <option <?php echo ($active == 11) ? "selected" : "" ?> value="11">أسباني</option>
        <option <?php echo ($active == 12) ? "selected" : "" ?> value="12">إسترالي</option>
        <option <?php echo ($active == 13) ? "selected" : "" ?> value="13">أفغانستاني</option>
        <option <?php echo ($active == 15) ? "selected" : "" ?> value="15">ألماني</option>
        <option <?php echo ($active == 16) ? "selected" : "" ?> value="16">إماراتي</option>
        <option <?php echo ($active == 25) ? "selected" : "" ?> value="25">اندونيسي</option>
        <option <?php echo ($active == 28) ? "selected" : "" ?> value="28">ايطالي</option>
        <option <?php echo ($active == 32) ? "selected" : "" ?> value="32">بحريني</option>
        <option <?php echo ($active == 33) ? "selected" : "" ?> value="33">برازيلي</option>
        <option <?php echo ($active == 37) ? "selected" : "" ?> value="37">بريطاني</option>
        <option <?php echo ($active == 40) ? "selected" : "" ?> value="40">بنجلاديشي</option>
        <option <?php echo ($active == 53) ? "selected" : "" ?> value="53">تركي</option>
        <option <?php echo ($active == 59) ? "selected" : "" ?> value="59">تونسي</option>
        <option <?php echo ($active == 64) ? "selected" : "" ?> value="64">جزائري</option>
        <option <?php echo ($active == 68) ? "selected" : "" ?> value="68">جنوب أفريقي</option>
        <option <?php echo ($active == 85) ? "selected" : "" ?> value="85">سنغافوري</option>
        <option <?php echo ($active == 90) ? "selected" : "" ?> value="90">سويسري</option>
        <option <?php echo ($active == 92) ? "selected" : "" ?> value="92">سيريلانكي</option>
        <option <?php echo ($active == 95) ? "selected" : "" ?> value="95">صومالي</option>
        <option <?php echo ($active == 96) ? "selected" : "" ?> value="96">صيني</option>
        <option <?php echo ($active == 97) ? "selected" : "" ?> value="97">عراقي</option>
        <option <?php echo ($active == 104) ? "selected" : "" ?> value="104">فرنسي</option>
        <option <?php echo ($active == 105) ? "selected" : "" ?> value="105">فلسطيني</option>
        <option <?php echo ($active == 106) ? "selected" : "" ?> value="106">فليبيني</option>
        <option <?php echo ($active == 110) ? "selected" : "" ?> value="110">فيتنامي</option>
        <option <?php echo ($active == 112) ? "selected" : "" ?> value="112">قطري</option>
        <option <?php echo ($active == 113) ? "selected" : "" ?> value="113">كاميروني</option>
        <option <?php echo ($active == 115) ? "selected" : "" ?> value="115">كندي</option>
        <option <?php echo ($active == 121) ? "selected" : "" ?> value="121">كويتي</option>
        <option <?php echo ($active == 124) ? "selected" : "" ?> value="124">لبناني</option>
        <option <?php echo ($active == 132) ? "selected" : "" ?> value="132">ماليزي</option>
        <option <?php echo ($active == 145) ? "selected" : "" ?> value="145">نيجيري</option>
        <option <?php echo ($active == 147) ? "selected" : "" ?> value="147">نيوزلندي</option>
        <option <?php echo ($active == 152) ? "selected" : "" ?> value="152">ياباني</option>
        <option <?php echo ($active == 153) ? "selected" : "" ?> value="153">يمني</option>
        <option <?php echo ($active == 155) ? "selected" : "" ?> value="155">يوناني</option>
        <option <?php echo ($active == 156) ? "selected" : "" ?> value="156">كويتي بدون</option>
        <option <?php echo ($active == 157) ? "selected" : "" ?> value="157">أزربيجان</option>
        <option <?php echo ($active == 159) ? "selected" : "" ?> value="159">مغربي</option>
        <option <?php echo ($active == 160) ? "selected" : "" ?> value="160">أخري</option>
      </select>
    <?php
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
        <option <?php echo ($date == 1) ? "selected" : "" ?> value="1">1</option> 
        <option <?php echo ($date == 2) ? "selected" : "" ?> value="2">2</option> 
        <option <?php echo ($date == 3) ? "selected" : "" ?> value="3">3</option> 
        <option <?php echo ($date == 4) ? "selected" : "" ?> value="4">4</option>
        <option <?php echo ($date == 5) ? "selected" : "" ?> value="5">5</option>
        <option <?php echo ($date == 6) ? "selected" : "" ?> value="6">6</option> 
        <option <?php echo ($date == 7) ? "selected" : "" ?> value="7">7</option> 
        <option <?php echo ($date == 8) ? "selected" : "" ?> value="8">8</option> 
        <option <?php echo ($date == 9) ? "selected" : "" ?> value="9">9</option> 
        <option <?php echo ($date == 10) ? "selected" : "" ?> value="10">10</option>
        <option <?php echo ($date == 11) ? "selected" : "" ?> value="11">11</option> 
        <option <?php echo ($date == 12) ? "selected" : "" ?> value="12">12</option> 
        <option <?php echo ($date == 13) ? "selected" : "" ?> value="13">13</option> 
        <option <?php echo ($date == 14) ? "selected" : "" ?> value="14">14</option> 
        <option <?php echo ($date == 15) ? "selected" : "" ?> value="15">15</option> 
        <option <?php echo ($date == 16) ? "selected" : "" ?> value="16">16</option>
        <option <?php echo ($date == 17) ? "selected" : "" ?> value="17">17</option>
        <option <?php echo ($date == 18) ? "selected" : "" ?> value="18">18</option> 
        <option <?php echo ($date == 19) ? "selected" : "" ?> value="19">19</option>
        <option <?php echo ($date == 20) ? "selected" : "" ?> value="20">20</option>
        <option <?php echo ($date == 21) ? "selected" : "" ?> value="21">21</option>
        <option <?php echo ($date == 22) ? "selected" : "" ?> value="22">22</option> 
        <option <?php echo ($date == 23) ? "selected" : "" ?> value="23">23</option> 
        <option <?php echo ($date == 24) ? "selected" : "" ?> value="24">24</option> 
        <option <?php echo ($date == 25) ? "selected" : "" ?> value="25">25</option>
        <option <?php echo ($date == 26) ? "selected" : "" ?> value="26">26</option>
        <option <?php echo ($date == 27) ? "selected" : "" ?> value="27">27</option> 
        <option <?php echo ($date == 28) ? "selected" : "" ?> value="28">28</option> 
        <option <?php echo ($date == 29) ? "selected" : "" ?> value="29">29</option> 
        <option <?php echo ($date == 30) ? "selected" : "" ?> value="30">30</option> 
        <option <?php echo ($date == 31) ? "selected" : "" ?> value="31" style="display: none;">31</option>
      </select>
      <select class="span4" name="birthday2">
        <option <?php echo ($month == "") ? "selected"  : "" ?> value="0">الشهر</option>
        <option <?php echo ($month == 1) ? "selected"  : "" ?> value="1">محرم</option>
        <option <?php echo ($month == 2) ? "selected"  : "" ?> value="2">صفر</option>
        <option <?php echo ($month == 3) ? "selected"  : "" ?> value="3">ربيع الأول</option>
        <option <?php echo ($month == 4) ? "selected"  : "" ?> value="4">ربيع الثاني</option>
        <option <?php echo ($month == 5) ? "selected"  : "" ?> value="5">جمادى الأول</option>
        <option <?php echo ($month == 6) ? "selected"  : "" ?> value="6">جمادى الآخر</option>
        <option <?php echo ($month == 7) ? "selected"  : "" ?> value="7">رجب</option>
        <option <?php echo ($month == 8) ? "selected"  : "" ?> value="8">شعبان</option>
        <option <?php echo ($month == 9) ? "selected"  : "" ?> value="9">رمضان</option>
        <option <?php echo ($month == 10) ? "selected"  : "" ?> value="10">شوال</option>
        <option <?php echo ($month == 11) ? "selected"  : "" ?> value="11">ذو القعدة</option>
        <option <?php echo ($month == 12) ? "selected"  : "" ?> value="12">ذو الحجة</option>
      </select>
      <select class="span4" name="birthday3">
        <option value="">السنه</option>
        <option <?php echo ($year == 1435) ? "selected" : "" ?> value="1435">1435</option>
        <option <?php echo ($year == 1434) ? "selected" : "" ?> value="1434">1434</option>
        <option <?php echo ($year == 1433) ? "selected" : "" ?> value="1433">1433</option>
        <option <?php echo ($year == 1432) ? "selected" : "" ?> value="1432">1432</option>
        <option <?php echo ($year == 1431) ? "selected" : "" ?> value="1431">1431</option>
        <option <?php echo ($year == 1430) ? "selected" : "" ?> value="1430">1430</option>
        <option <?php echo ($year == 1429) ? "selected" : "" ?> value="1429">1429</option>
        <option <?php echo ($year == 1428) ? "selected" : "" ?> value="1428">1428</option>
        <option <?php echo ($year == 1427) ? "selected" : "" ?> value="1427">1427</option>
        <option <?php echo ($year == 1426) ? "selected" : "" ?> value="1426">1426</option>
        <option <?php echo ($year == 1425) ? "selected" : "" ?> value="1425">1425</option>
        <option <?php echo ($year == 1424) ? "selected" : "" ?> value="1424">1424</option>
        <option <?php echo ($year == 1423) ? "selected" : "" ?> value="1423">1423</option>
        <option <?php echo ($year == 1422) ? "selected" : "" ?> value="1422">1422</option>
        <option <?php echo ($year == 1421) ? "selected" : "" ?> value="1421">1421</option>
        <option <?php echo ($year == 1420) ? "selected" : "" ?> value="1420">1420</option>
        <option <?php echo ($year == 1419) ? "selected" : "" ?> value="1419">1419</option>
        <option <?php echo ($year == 1418) ? "selected" : "" ?> value="1418">1418</option>
        <option <?php echo ($year == 1417) ? "selected" : "" ?> value="1417">1417</option>
        <option <?php echo ($year == 1416) ? "selected" : "" ?> value="1416">1416</option>
        <option <?php echo ($year == 1415) ? "selected" : "" ?> value="1415">1415</option>
        <option <?php echo ($year == 1414) ? "selected" : "" ?> value="1414">1414</option>
        <option <?php echo ($year == 1413) ? "selected" : "" ?> value="1413">1413</option>
        <option <?php echo ($year == 1412) ? "selected" : "" ?> value="1412">1412</option>
        <option <?php echo ($year == 1411) ? "selected" : "" ?> value="1411">1411</option>
        <option <?php echo ($year == 1410) ? "selected" : "" ?> value="1410">1410</option>
        <option <?php echo ($year == 1409) ? "selected" : "" ?> value="1409">1409</option>
        <option <?php echo ($year == 1408) ? "selected" : "" ?> value="1408">1408</option>
        <option <?php echo ($year == 1407) ? "selected" : "" ?> value="1407">1407</option>
        <option <?php echo ($year == 1406) ? "selected" : "" ?> value="1406">1406</option>
        <option <?php echo ($year == 1405) ? "selected" : "" ?> value="1405">1405</option>
        <option <?php echo ($year == 1404) ? "selected" : "" ?> value="1404">1404</option>
        <option <?php echo ($year == 1403) ? "selected" : "" ?> value="1403">1403</option>
        <option <?php echo ($year == 1402) ? "selected" : "" ?> value="1402">1402</option>
        <option <?php echo ($year == 1401) ? "selected" : "" ?> value="1401">1401</option>
        <option <?php echo ($year == 1400) ? "selected" : "" ?> value="1400">1400</option>
        <option <?php echo ($year == 1399) ? "selected" : "" ?> value="1399">1399</option>
        <option <?php echo ($year == 1398) ? "selected" : "" ?> value="1398">1398</option>
        <option <?php echo ($year == 1397) ? "selected" : "" ?> value="1397">1397</option>
        <option <?php echo ($year == 1396) ? "selected" : "" ?> value="1396">1396</option>
        <option <?php echo ($year == 1395) ? "selected" : "" ?> value="1395">1395</option>
        <option <?php echo ($year == 1394) ? "selected" : "" ?> value="1394">1394</option>
        <option <?php echo ($year == 1393) ? "selected" : "" ?> value="1393">1393</option>
        <option <?php echo ($year == 1392) ? "selected" : "" ?> value="1392">1392</option>
        <option <?php echo ($year == 1391) ? "selected" : "" ?> value="1391">1391</option>
        <option <?php echo ($year == 1390) ? "selected" : "" ?> value="1390">1390</option>
        <option <?php echo ($year == 1389) ? "selected" : "" ?> value="1389">1389</option>
        <option <?php echo ($year == 1388) ? "selected" : "" ?> value="1388">1388</option>
        <option <?php echo ($year == 1387) ? "selected" : "" ?> value="1387">1387</option>
        <option <?php echo ($year == 1386) ? "selected" : "" ?> value="1386">1386</option>
        <option <?php echo ($year == 1385) ? "selected" : "" ?> value="1385">1385</option>
        <option <?php echo ($year == 1384) ? "selected" : "" ?> value="1384">1384</option>
        <option <?php echo ($year == 1383) ? "selected" : "" ?> value="1383">1383</option>
        <option <?php echo ($year == 1382) ? "selected" : "" ?> value="1382">1382</option>
        <option <?php echo ($year == 1381) ? "selected" : "" ?> value="1381">1381</option>
        <option <?php echo ($year == 1380) ? "selected" : "" ?> value="1380">1380</option>
        <option <?php echo ($year == 1379) ? "selected" : "" ?> value="1379">1379</option>
        <option <?php echo ($year == 1378) ? "selected" : "" ?> value="1378">1378</option>
        <option <?php echo ($year == 1377) ? "selected" : "" ?> value="1377">1377</option>
        <option <?php echo ($year == 1376) ? "selected" : "" ?> value="1376">1376</option>
        <option <?php echo ($year == 1375) ? "selected" : "" ?> value="1375">1375</option>
        <option <?php echo ($year == 1374) ? "selected" : "" ?> value="1374">1374</option>
        <option <?php echo ($year == 1373) ? "selected" : "" ?> value="1373">1373</option>
        <option <?php echo ($year == 1372) ? "selected" : "" ?> value="1372">1372</option>
        <option <?php echo ($year == 1371) ? "selected" : "" ?> value="1371">1371</option>
        <option <?php echo ($year == 1370) ? "selected" : "" ?> value="1370">1370</option>
        <option <?php echo ($year == 1369) ? "selected" : "" ?> value="1369">1369</option>
        <option <?php echo ($year == 1368) ? "selected" : "" ?> value="1368">1368</option>
        <option <?php echo ($year == 1367) ? "selected" : "" ?> value="1367">1367</option>
        <option <?php echo ($year == 1366) ? "selected" : "" ?> value="1366">1366</option>
        <option <?php echo ($year == 1365) ? "selected" : "" ?> value="1365">1365</option>
        <option <?php echo ($year == 1364) ? "selected" : "" ?> value="1364">1364</option>
        <option <?php echo ($year == 1363) ? "selected" : "" ?> value="1363">1363</option>
        <option <?php echo ($year == 1362) ? "selected" : "" ?> value="1362">1362</option>
        <option <?php echo ($year == 1361) ? "selected" : "" ?> value="1361">1361</option>
        <option <?php echo ($year == 1360) ? "selected" : "" ?> value="1360">1360</option>
        <option <?php echo ($year == 1359) ? "selected" : "" ?> value="1359">1359</option>
        <option <?php echo ($year == 1358) ? "selected" : "" ?> value="1358">1358</option>
        <option <?php echo ($year == 1357) ? "selected" : "" ?> value="1357">1357</option>
        <option <?php echo ($year == 1356) ? "selected" : "" ?> value="1356">1356</option>
        <option <?php echo ($year == 1355) ? "selected" : "" ?> value="1355">1355</option>
        <option <?php echo ($year == 1354) ? "selected" : "" ?> value="1354">1354</option>
        <option <?php echo ($year == 1353) ? "selected" : "" ?> value="1353">1353</option>
        <option <?php echo ($year == 1352) ? "selected" : "" ?> value="1352">1352</option>
        <option <?php echo ($year == 1351) ? "selected" : "" ?> value="1351">1351</option>
        <option <?php echo ($year == 1350) ? "selected" : "" ?> value="1350">1350</option>
        <option <?php echo ($year == 1349) ? "selected" : "" ?> value="1349">1349</option>
        <option <?php echo ($year == 1348) ? "selected" : "" ?> value="1348">1348</option>
        <option <?php echo ($year == 1347) ? "selected" : "" ?> value="1347">1347</option>
        <option <?php echo ($year == 1346) ? "selected" : "" ?> value="1346">1346</option>
        <option <?php echo ($year == 1345) ? "selected" : "" ?> value="1345">1345</option>
        <option <?php echo ($year == 1344) ? "selected" : "" ?> value="1344">1344</option>
        <option <?php echo ($year == 1343) ? "selected" : "" ?> value="1343">1343</option>
        <option <?php echo ($year == 1342) ? "selected" : "" ?> value="1342">1342</option>
        <option <?php echo ($year == 1341) ? "selected" : "" ?> value="1341">1341</option>
        <option <?php echo ($year == 1340) ? "selected" : "" ?> value="1340">1340</option>
        <option <?php echo ($year == 1339) ? "selected" : "" ?> value="1339">1339</option>
        <option <?php echo ($year == 1338) ? "selected" : "" ?> value="1338">1338</option>
        <option <?php echo ($year == 1337) ? "selected" : "" ?> value="1337">1337</option>
        <option <?php echo ($year == 1336) ? "selected" : "" ?> value="1336">1336</option>
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
        <option <?php echo ($active == 1) ? "selected" : "" ?> value="1">O+</option>
        <option <?php echo ($active == 2) ? "selected" : "" ?> value="2">O-</option>
        <option <?php echo ($active == 3) ? "selected" : "" ?> value="3">A+</option>
        <option <?php echo ($active == 4) ? "selected" : "" ?> value="4">A-</option>
        <option <?php echo ($active == 5) ? "selected" : "" ?> value="5">B+</option>
        <option <?php echo ($active == 6) ? "selected" : "" ?> value="6">B-</option>
        <option <?php echo ($active == 7) ? "selected" : "" ?> value="7">AB+</option>
        <option <?php echo ($active == 8) ? "selected" : "" ?> value="8">AB-</option>
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
        <option <?php echo ($active == "برنامج الفرسان") ? "selected" : "" ?> value="برنامج الفرسان">برنامج الفرسان</option>
        <option <?php echo ($active == "برنامج التميز") ? "selected" : "" ?> value="برنامج التميز">برنامج التميز</option>
        <option <?php echo ($active == "برنامج الوسام") ? "selected" : "" ?> value="برنامج الوسام">برنامج الوسام</option>
        <option <?php echo ($active == "برنامج الصفوة") ? "selected" : "" ?> value="برنامج الصفوة">برنامج الصفوة</option>
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
        <option <?php echo ($active == "مكة المكرمة") ? "selected" : "" ?> value="مكة المكرمة">مكة المكرمة</option>
        <option <?php echo ($active == "المدينة المنورة") ? "selected" : "" ?> value="المدينة المنورة">المدينة المنورة</option>
        <option <?php echo ($active == "جدة") ? "selected" : "" ?> value="جدة">جدة</option>
        <option <?php echo ($active == "الرياض") ? "selected" : "" ?> value="الرياض">الرياض</option>
        <option <?php echo ($active == "الطائف") ? "selected" : "" ?> value="الطائف">الطائف</option>
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
public static function getFormHajj(){
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
          <?php HajjFieldHelper::getListNationnality() ?>
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
          <label for="id_number">رقم الهوية</label>
          <input type="text" name="id_number" id="id_number" required>
        </div>
        <div class="span4">
          <label for="birthday">تاريخ الميلاد</label>
          <?php HajjFieldHelper::getBirthday() ?>
        </div>
        <div class="span4">
          <label for="job">الوظيفة</label>
          <input type="text" name="job" id="job" required>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="rh">فصيلة الدم</label>
          <?php HajjFieldHelper::getRH() ?>
        </div>
        <div class="span4">
          <label for="address">العنوان</label>
          <input type="text" name="address" id="address" required>
        </div>
        <div class="span4">
          <label for="mobile">الجوال</label>
          <input type="text" name="mobile" id="mobile" required>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label for="email">البريد الالكتروني</label>
          <input type="text" name="email" id="email">
        </div>
        <div class="span4">
          <label for="office_branch">فرع التسجيل</label>
          <?php HajjFieldHelper::GetOfficeBranch() ?>
        </div>
        <div class="span4">
          <label for="hajj_program">برنامج الحج</label>
          <?php HajjFieldHelper::getHajjProgram() ?>
        </div>
      </div>
      <input type="submit" value="حجز و تسجيل" class="btn btn-success">
    </form>
  <?php
}
  

/*
|------------------------------------------------------------------------------------
| Status register
|------------------------------------------------------------------------------------
*/
  public static function status_register($id){

    $stat = array(
          1 => "تحت التدقيق والمراجعة",
          2 => "مقبول",
          3 => "مرفوض",
          4 => "تم الدفع",
          5 => "الغاء الحجز"
      );

    return $stat[$id];

  }
}

