<?php

/**
 * Created by PhpStorm.
 * User: amer
 * Date: 2/18/17
 * Time: 2:42 PM
 */

class DATABASE_CONNECTION{

    public static $DB_NAME = 'drvenija';
    public static $USERNAME = 'root';
    public static $PASSWORD = 'root';

public static function create_PDO(){
    return new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname='.DATABASE_CONNECTION::$DB_NAME, DATABASE_CONNECTION::$USERNAME, DATABASE_CONNECTION::$PASSWORD);
}

}