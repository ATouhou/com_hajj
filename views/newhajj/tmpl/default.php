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

if ($this->id) {// Alreay registred
  $app = JFactory::getApplication();
  $app->redirect("index.php?option=com_hajj&view=edithajj&Itemid=228","تم تسجيل دخولك للموقع..ويمكنك الاطلاع على بياناتكم من خدماتنا الاكترونية ","info");
}
if($this->status){ // Not Closed ^^ 
  HajjFieldHelper::getFormHajj();
}else{ // Closed :'(
?>
<h3>عزيزي الزائر..</h3>
<h4>تم إيقاف الحجز الإلكتروني لحج هذا العام.</h4>
<?php  
}