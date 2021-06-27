<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php

$dbname = 'adtsys';
$dbuser = 'adtsys_admin';
$dbpass = 'adtsys123';
$dbhost = '10.0.2.5';

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($link, $test_query);

$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
  $tblCnt++;
  #echo $tbl[0]."<br />\n";
}

if (!$tblCnt) {
  echo "Connected successfully.\nThere are no tables\n";
} else {
  echo "Connected successfully.\nhere are $tblCnt tables\n";
}