<?php

function RowToGet($fterm)
{
    include_once 'dbh.inc.php';

    $sql = "SELECT Name,Health,Defence,Magic_Defence,Speed,Movement FROM character_stats_sheet Where Name='$fterm'";
    $result=mysqli_query($conn,$sql);
    $names = $Health = $Defence = $Magic_Defence = $Speed = $Movement = array();
    $resultCheck = mysqli_num_rows($result);
    //$x=0;
    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result))
        {
           $names = $row['Name'];
           $Health= $row['Health'];
           $Defence= $row['Defence'];
           $Magic_Defence= $row['Magic_Defence'];
           $Speed= $row['Speed'];
           $Movement= $row['Movement'];
            //$x++;
            //echo $x. "<br>";
            echo $names. "<br>";
            echo $Health. "<br>";
            echo $Defence. "<br>";
            echo $Magic_Defence. "<br>";
            echo $Speed. "<br>";
            echo $Movement. "<br>";
        }
        
    
       // echo "total number of characters equal " . $x ;
    }
   
}
?>