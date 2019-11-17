<?php 
include('dbcon.php');

$titre          = $_POST['titre']; 
$description    = $_POST['description'];
$note           = $_POST['note'];
$format         = $_POST['format'];
$type           = $_POST['type'];
$update         = $_POST['update'];

if( $update==1 ){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query = 'UPDATE media_element SET titre="'.$titre.'", description="'.$description.'", note='.$note.', fk_format='.$format.', fk_type='.$type.' WHERE id='.$id;
    }
}else{
    if($titre != "" && $description != ""){
        $query = "INSERT INTO media_element(titre, description, note, fk_format, fk_type) values ('$titre','$description','$note','$format','$type')";
    }
}

if(isset($query)){
    $insert = mysqli_query($pdo, $query);
    $stmt = $pdo->query($query);
}

if(isset($insert)){
    echo "1";
}else{
    echo "0";
}
?>