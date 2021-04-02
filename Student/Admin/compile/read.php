<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="chatapp";

$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$title = substr($_GET["title"], 0, 128);
$titleEscaped = htmlentities(mysqli_real_escape_string($db, $title));
$query="SELECT * FROM chat WHERE title = '$titleEscaped'";

if ($db->real_query($query)) {

    $res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
        $username=$row["username"];
        $text=$row["text"];
        $time=date('G:i', strtotime($row["time"]));

        echo "<p>$time | $username: $text</p>\n";
    }
}else{

    echo "An error occured";
  //  echo $titleEscaped;
    //echo $query;
    echo $db->errno;
}

$db->close();
?>
