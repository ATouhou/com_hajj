<?php

/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http
 */
defined('_JEXEC') or die;

class HajjComponentsHelper {

  public static function loadDatePicker(){
    $doc = JFactory::getDocument();
    $doc->addStyleSheet( '//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css' );

    $doc->addScript( '//code.jquery.com/jquery-1.10.2.js' );
    $doc->addScript( '//code.jquery.com/ui/1.11.0/jquery-ui.js' );
    $doc->addScriptDeclaration('
      $(function() {
        $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
      });
    ');
  }

/*
|------------------------------------------------------------------------------------
| Get the pagination
|------------------------------------------------------------------------------------
*/
  public static function getPagination($url='', $nbrows=0, $nbPerPage=20, $currentPage=1){
    $npPage = ceil($nbrows/$nbPerPage);
    ob_start(); 
  ?>
    <div class="text-center mt-50">
      <div class="pagination">
        <ul>
          <?php for ($i = $npPage; $i > 0; $i--): ?>
            <li <?php echo ($i == $currentPage)? 'class="active"' : '';?>>
              <a href="<?php echo $url.$i ?>"><?php echo $i ?></a>
            </li>
          <?php endfor ?>
        </ul>
      </div>
    </div>
  <?php
    $content = ob_get_contents();
    ob_get_clean();
    return $content;
  }
}
