<?php

/**
 * @version     1.0.0
 * @package     com_hajj
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Kouceyla Hadji <hadjikouceyla@gmail.com> - http
 */
defined('_JEXEC') or die;

class HajjFrontendHelper {

/*
|------------------------------------------------------------------------------------
| Register new User "Hajj"
|------------------------------------------------------------------------------------
*/
  public static function register_user($id_number, $password, $password2, $email, $first_name,$groups=array("2")){ 
      
    jimport('joomla.user.helper');
    
    $data = array(
      "name"=>$first_name,
      "username"=>$id_number,
      "password"=>$password,
      "password2"=>$password2,
      "email"=>$email,
      "block"=>0,
      "groups"=>$groups
    );

    $user = new JUser;

    if(!$user->bind($data)) {
      throw new Exception("Could not bind data. Error: " . $user->getError());
    }
    if (!$user->save()) {
      return $user->getError();
    }

    return $user->id;
   }

/*
|------------------------------------------------------------------------------------
| Auto login after register
|------------------------------------------------------------------------------------
*/
  public static function autologin($username, $password){

    $credentials = array();
    $credentials['username'] = $username;
    $credentials['password'] = $password;
    $options = array();
    
    $app = JFactory::getApplication();
    $rslt = $app->login( $credentials, $options );
  }      

/*
|------------------------------------------------------------------------------------
| Send SMS
|------------------------------------------------------------------------------------
*/
  public static function sendTheSMS($numbers = "966555528620", $msg = ""){
    $mobile     = "966555528620";
    $password   = "0555528620";
    $sender     = "FawjMakkah";
    $numbers    = self::chechNumber($numbers);  //Recheck Numbers
    $timeSend   = 0;
    $dateSend   = 0;
    $deleteKey  = 0;
    $resultType = 0;

    //return sendSMS($mobile, $password, $numbers, $sender, $msg, $timeSend, $dateSend, $deleteKey, $resultType);
    global $arraySendMsg;
    $applicationType = "24";  
    //$msg = convertToUnicode($msg);
    $sender = urlencode($sender);
    $domainName = $_SERVER['SERVER_NAME'];
    $stringToPost = "mobile=".$mobile."&password=".$password."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&deleteKey=".$deleteKey;
    $stringToPostLength = strlen($stringToPost);
    $fsockParameter = "POST /api/msgSend.php HTTP/1.0 \r\n";
    $fsockParameter.= "Host: www.mobily.ws \r\n";
    $fsockParameter.= "Content-type: application/x-www-form-urlencoded \r\n";
    $fsockParameter.= "Content-length: $stringToPostLength \r\n\r\n";
    $fsockParameter.= "$stringToPost";

    $errno = $errstr = "";
    $fsockConn = fsockopen("www.mobily.ws", 80, $errno, $errstr, 30);
    fputs($fsockConn, $fsockParameter);

    $result = ""; 
    $clearResult = false; 

    while(!feof($fsockConn))
    {
      $line = fgets($fsockConn, 10240);
      if($line == "\r\n" && !$clearResult) $clearResult = true;

      if($clearResult) $result .= trim($line);
    }
    return $result;

  }

/*
|------------------------------------------------------------------------------------
| Recheck Mobile numbers
|------------------------------------------------------------------------------------
*/
  public static function chechNumber($num){
    if ($num[0] == "0") {
      $num = "966" . substr($num, 1);
    }
    return $num;
  }

/*
|------------------------------------------------------------------------------------
| str TO Hex
|------------------------------------------------------------------------------------
*/
  public function strtohexutf16($str){
    $res = "";
    for ($i=0; $i < strlen($str); $i++) { 
      $res.= '00' . dechex(ord($str[$i]));
    }
    return $res;
  }


/*
|------------------------------------------------------------------------------------
| Update To pay for one Hajj
|------------------------------------------------------------------------------------
*/
  public function updateToPayHajj($ID = 0){

    if (!$ID) {return;} // In case any ID provided

    // get number of addons + price of the program
    $HajjModel = JModelLegacy::getInstance('Hajj', 'HajjModel');
    $result = $HajjModel->getUpdateToPayHajj($ID);

    if (!is_null($result)) { // If we have result
      $topay      = ($result->nb_addon + 1) * $result->price_program;
      $obj        = new stdClass();
      $obj->id    = $ID;
      $obj->topay = $topay;

      return $HajjModel->setUpdateToPayHajj($obj);
    }
  }

/*
|------------------------------------------------------------------------------------
| Update All hajjs Payment
|------------------------------------------------------------------------------------
*/
  public function updateHajjsPayment(){

    // Get All Hajj from the database
    $AdminModel = JModelLegacy::getInstance('Admin', 'HajjModel');
    $hajjs = $AdminModel->getHajjs();

    // For each Hajj
    foreach ($hajjs as $key => $hajj) {
      if (!intval($hajj->addon)) { // is parent
        $ID = $hajj->id;
        self::updateToPayHajj($ID);// Update ToPay
      }
    }
  }

}// End Class
