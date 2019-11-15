<?php
    include('dbcon.php');
    
    $query = mysqli_query($con, "SELECT * FROM customer_info ORDER BY firstname ASC");
    
    $rows = array();
    
    while($r = mysqli_fetch_assoc($query)){
        $rows[] = $r;
        //var_dump($r);
    }
    
    print json_encode($rows);
    
    mysqli_close($con);
?>