<?php
// Initialize variable for database credentials
header('Content-Type:text/html; charset=UTF-8');
$dbhost = 'cemcnjor.dot5hostingmysql.com';
$dbuser = 'cemcnjor';
$dbpass = 'cemc@732';
$dbname = 'cemcnj_audios';

//Create database connection
  $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  mysql_set_charset('UTF-8');
  
//Check connection was successful
  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }
  
  //printf("Initial character set: %s\n", $dblink->character_set_name());

  if (!$dblink->set_charset("utf8")) {
    //printf("Error loading character set utf8: %s\n", $dblink->error);
    exit();
  } else {
    //printf("Current character set: %s\n", $dblink->character_set_name());
  }

//Fetch 3 rows from actor table
  $result = $dblink->query("SELECT * FROM audio_info_t");

//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while($row = $result->fetch_assoc()) {
   $dbdata[]=$row;
  }

  $results = ["draw" => 1,
      "recordsTotal" => count($dbdata),
      "recordsFiltered" => count($dbdata),
      "data" => $dbdata];

//Print array in JSON format
  echo json_encode($results);
?>
