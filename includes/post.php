<?php 
include('dbcon.php');

$titre          = $_POST['titre']; 
$description    = $_POST['description'];
$note           = $_POST['note'];
$format         = $_POST['format'];
$type           = $_POST['type'];

$query = "INSERT INTO media_element(titre, description, note, fk_format, fk_type) values ('$titre','$description','$note','$format','$type')";
$insert = mysqli_query($pdo, $query);
$stmt = $pdo->query($query);
echo $query;

if($insert){
    echo "1";
}else{
    echo "0";
}
?>