<?php
$target_dir = "audio2018/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

header('Content-Type:text/html; charset=UTF-8');
$dbhost = 'cemcnjor.dot5hostingmysql.com';
$dbuser = 'cemcnjor';
$dbpass = 'cemc@732';
$dbname = 'cemcnj_audios';

$PASTOR = $_POST['PASTOR'];
$TITLE = $_POST['TITLE'];
$DESCRIPTION = $_POST['DESCRIPTION'];
$FILE = $_FILES["fileToUpload"]["name"];
$DATE_P = $_POST['DATE'];

$dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
mysql_set_charset('UTF-8');

if ($dblink->connect_errno) {
    printf("Failed to connect to database");
    exit();
}

$sql = "INSERT INTO `audio_info_t` (`ID`, `PASTOR`, `TITLE`, `FILE`, `DESCRIPTION`, `DATE_P`) VALUES (NULL, '$PASTOR', '$TITLE', '$FILE', '$DESCRIPTION', '$DATE_P')";
// $dblink->query("INSERT INTO 'audio_info'('ID', 'PASTOR', 'TITLE', 'FILE', 'DESCRIPTION', 'DATE_P') VALUES (NULL, '$PASTOR', '$TITLE','$FILE', '$DESCRIPTION', '$DATE_P')");
//mysqli_set_charset($dblink, "utf8");
echo mysqli_character_set_name($dblink);
if(mysqli_query($dblink, $sql)) {
    echo "new record insert";
}
else {
    echo "errors";
}
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "        The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
}
?>
