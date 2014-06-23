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
  public static function getListNationnality(){ 
    ?>
      <select name="nationality" id="nationality" required>
        <option value=""></option>
        <option value="1">سعودي</option>
        <option value="2">مصري</option>
        <option value="3">أمريكي</option>
        <option value="4">باكستاني  </option>
        <option value="5">هندي</option>
        <option value="6">أردني</option>
        <option value="7">سوداني</option>
        <option value="8">سوري</option>
        <option value="10">أرجنتيني</option>
        <option value="11">أسباني</option>
        <option value="12">إسترالي</option>
        <option value="13">أفغانستاني</option>
        <option value="15">ألماني</option>
        <option value="16">إماراتي</option>
        <option value="25">اندونيسي</option>
        <option value="28">ايطالي</option>
        <option value="32">بحريني</option>
        <option value="33">برازيلي</option>
        <option value="37">بريطاني</option>
        <option value="40">بنجلاديشي</option>
        <option value="53">تركي</option>
        <option value="59">تونسي</option>
        <option value="64">جزائري</option>
        <option value="68">جنوب أفريقي</option>
        <option value="85">سنغافوري</option>
        <option value="90">سويسري</option>
        <option value="92">سيريلانكي</option>
        <option value="95">صومالي</option>
        <option value="96">صيني</option>
        <option value="97">عراقي</option>
        <option value="104">فرنسي</option>
        <option value="105">فلسطيني</option>
        <option value="106">فليبيني</option>
        <option value="110">فيتنامي</option>
        <option value="112">قطري</option>
        <option value="113">كاميروني</option>
        <option value="115">كندي</option>
        <option value="121">كويتي</option>
        <option value="124">لبناني</option>
        <option value="132">ماليزي</option>
        <option value="145">نيجيري</option>
        <option value="147">نيوزلندي</option>
        <option value="152">ياباني</option>
        <option value="153">يمني</option>
        <option value="155">يوناني</option>
        <option value="156">كويتي بدون</option>
        <option value="157">أزربيجان</option>
        <option value="159">مغربي</option>
        <option value="160">أخري</option>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
| Get Birthday fields
|------------------------------------------------------------------------------------
*/
  public static function getBirthday(){
    ?>
      <select class="span4" name="birthday1" id="birthday" required> 
        <option value="">اليوم </option>
        <option value="1">1</option> 
        <option value="2">2</option> 
        <option value="3">3</option> 
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option> 
        <option value="7">7</option> 
        <option value="8">8</option> 
        <option value="9">9</option> 
        <option value="10">10</option>
        <option value="11">11</option> 
        <option value="12">12</option> 
        <option value="13">13</option> 
        <option value="14">14</option> 
        <option value="15">15</option> 
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option> 
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option> 
        <option value="23">23</option> 
        <option value="24">24</option> 
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option> 
        <option value="28">28</option> 
        <option value="29">29</option> 
        <option value="30">30</option> 
        <option value="31" style="display: none;">31</option>
      </select>
      <select class="span4" name="birthday2">
        <option value="0">الشهر</option>
        <option value="1">محرم</option>
        <option value="2">صفر</option>
        <option value="3">ربيع الأول</option>
        <option value="4">ربيع الثاني</option>
        <option value="5">جمادى الأول</option>
        <option value="6">جمادى الآخر</option>
        <option value="7">رجب</option>
        <option value="8">شعبان</option>
        <option value="9">رمضان</option>
        <option value="10">شوال</option>
        <option value="11">ذو القعدة</option>
        <option value="12">ذو الحجة</option>
      </select>
      <select class="span4" name="birthday3">
        <option value="">السنه</option>
        <option value="1435">1435</option>
        <option value="1434">1434</option>
        <option value="1433">1433</option>
        <option value="1432">1432</option>
        <option value="1431">1431</option>
        <option value="1430">1430</option>
        <option value="1429">1429</option>
        <option value="1428">1428</option>
        <option value="1427">1427</option>
        <option value="1426">1426</option>
        <option value="1425">1425</option>
        <option value="1424">1424</option>
        <option value="1423">1423</option>
        <option value="1422">1422</option>
        <option value="1421">1421</option>
        <option value="1420">1420</option>
        <option value="1419">1419</option>
        <option value="1418">1418</option>
        <option value="1417">1417</option>
        <option value="1416">1416</option>
        <option value="1415">1415</option>
        <option value="1414">1414</option>
        <option value="1413">1413</option>
        <option value="1412">1412</option>
        <option value="1411">1411</option>
        <option value="1410">1410</option>
        <option value="1409">1409</option>
        <option value="1408">1408</option>
        <option value="1407">1407</option>
        <option value="1406">1406</option>
        <option value="1405">1405</option>
        <option value="1404">1404</option>
        <option value="1403">1403</option>
        <option value="1402">1402</option>
        <option value="1401">1401</option>
        <option value="1400">1400</option>
        <option value="1399">1399</option>
        <option value="1398">1398</option>
        <option value="1397">1397</option>
        <option value="1396">1396</option>
        <option value="1395">1395</option>
        <option value="1394">1394</option>
        <option value="1393">1393</option>
        <option value="1392">1392</option>
        <option value="1391">1391</option>
        <option value="1390">1390</option>
        <option value="1389">1389</option>
        <option value="1388">1388</option>
        <option value="1387">1387</option>
        <option value="1386">1386</option>
        <option value="1385">1385</option>
        <option value="1384">1384</option>
        <option value="1383">1383</option>
        <option value="1382">1382</option>
        <option value="1381">1381</option>
        <option value="1380">1380</option>
        <option value="1379">1379</option>
        <option value="1378">1378</option>
        <option value="1377">1377</option>
        <option value="1376">1376</option>
        <option value="1375">1375</option>
        <option value="1374">1374</option>
        <option value="1373">1373</option>
        <option value="1372">1372</option>
        <option value="1371">1371</option>
        <option value="1370">1370</option>
        <option value="1369">1369</option>
        <option value="1368">1368</option>
        <option value="1367">1367</option>
        <option value="1366">1366</option>
        <option value="1365">1365</option>
        <option value="1364">1364</option>
        <option value="1363">1363</option>
        <option value="1362">1362</option>
        <option value="1361">1361</option>
        <option value="1360">1360</option>
        <option value="1359">1359</option>
        <option value="1358">1358</option>
        <option value="1357">1357</option>
        <option value="1356">1356</option>
        <option value="1355">1355</option>
        <option value="1354">1354</option>
        <option value="1353">1353</option>
        <option value="1352">1352</option>
        <option value="1351">1351</option>
        <option value="1350">1350</option>
        <option value="1349">1349</option>
        <option value="1348">1348</option>
        <option value="1347">1347</option>
        <option value="1346">1346</option>
        <option value="1345">1345</option>
        <option value="1344">1344</option>
        <option value="1343">1343</option>
        <option value="1342">1342</option>
        <option value="1341">1341</option>
        <option value="1340">1340</option>
        <option value="1339">1339</option>
        <option value="1338">1338</option>
        <option value="1337">1337</option>
        <option value="1336">1336</option>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
| Get RH List
|------------------------------------------------------------------------------------
*/
  public static function getRH(){
    ?>
      <select name="rh" id="rh" required>
        <option value=""></option>
        <option value="1">O+</option>
        <option value="2">O-</option>
        <option value="3">A+</option>
        <option value="4">A-</option>
        <option value="5">B+</option>
        <option value="6">B-</option>
        <option value="7">AB+</option>
        <option value="8">AB-</option>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
| Get Hajj Program
|------------------------------------------------------------------------------------
*/
  public static function getHajjProgram(){    
    ?>
      <select name="hajj_program" id="hajj_program" required>
        <option value=""></option>
        <option value="برنامج الفرسان">برنامج الفرسان</option>
        <option value="برنامج التميز">برنامج التميز</option>
        <option value="برنامج الوسام">برنامج الوسام</option>
        <option value="برنامج الصفوة">برنامج الصفوة</option>
      </select>
    <?php
  }

/*
|------------------------------------------------------------------------------------
|  Get Office Branch
|------------------------------------------------------------------------------------
*/
  public static function GetOfficeBranch(){
    ?>
      <select name="office_branch" id="office_branch" required>
        <option value=""></option>
        <option value="مكة المكرمة">مكة المكرمة</option>
        <option value="المدينة المنورة">المدينة المنورة</option>
        <option value="جدة">جدة</option>
        <option value="الرياض">الرياض</option>
        <option value="الطائف">الطائف</option>
      </select>
    <?php
  }

}

