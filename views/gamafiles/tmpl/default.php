<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$XMLObjects=$this->XMLObjects;

// Call list fields
//require_once JPATH_COMPONENT.'/helpers/' .'fields.php';


?>
<h1>ملفات جاما</h1>

  <table class="allhajjs table table-condensed table-bordered mt30">
    <thead>
      <tr>
        <th>#</th>
        <th>تاريخ الملف</th>
        <th>Exported XML </th>
        <th>Imported XML </th>
      </tr>
    </thead>

    <?php foreach ($XMLObjects as $key => $XMLObject): ?>
      <tr>
        <td><?php echo $XMLObject->id ?></td>
        <td><?php echo $XMLObject->date_register ?></td>
        <td><a href="index.php?option=com_hajj&task=admin.DownXML&id=<?php echo $XMLObject->id ?>" class="btn btn-info">تحميل الملف</a></td>
        <td>
        <?php if ($XMLObject->xml_imported): ?>
          <a href="index.php?option=com_hajj&task=admin.DownXML&id=<?php echo $XMLObject->id ?>" class="btn btn-danger">تحميل الملف</a>
        <?php endif ?>
        </td>
      </tr>
    <?php endforeach ?>
  </table>



