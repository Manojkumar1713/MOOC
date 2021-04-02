<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="chatapp";


$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {

    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}


$username=substr($_GET["username"], 0, 32);
$text=substr($_GET["text"], 0, 128);
$title = substr($_GET["title"], 0, 128);

$nameEscaped = htmlentities(mysqli_real_escape_string($db,$username));
$textEscaped = htmlentities(mysqli_real_escape_string($db, $text));
$titleEscaped = htmlentities(mysqli_real_escape_string($db, $title));

$query="INSERT INTO chat (title, username, text) VALUES ('$titleEscaped', '$nameEscaped', '$textEscaped')";

if ($db->real_query($query)) {

    echo "Wrote message to db";
}else{

    echo "An error occurred";
    echo $db->errno;
}

$db->close();
?>
