<?php
#db connection file

#define db constants
define('DBNAME','bookstore');
define('DBUSER', 'root');
define('DBPASS', 'ibrahim');

try{


$dbcon = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);


$dbcon = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);
}catch(Exception $e){

}
