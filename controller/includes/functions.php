<?php
require "connect.php";
function getData($datas){
    
        global $conn;
        $result = mysqli_query($conn, $datas);
        $rows = []; //wadah untuk array
        while ($row = mysqli_fetch_assoc($result)) { // get data lalu dimasukkan ke rows
            $rows[] = $row;
        }
        return $rows;
    
}


?>