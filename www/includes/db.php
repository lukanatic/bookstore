<?php

# db connection file

# define db constants
define('DBNAME', 'bookstore');
define('DBUSER', 'root');
define('DBPASS', 'ibrahim');

$dbh = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);
