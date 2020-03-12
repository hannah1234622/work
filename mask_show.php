<?php

    include("mask_conn.php");
    $sth = "SELECT * FROM masks WHERE Institution_Address LIKE '%$county_city%$region%';";
    $result=$db->query($sth);        
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['Institution_Code']."</td>";
        echo "<td>".$row['Institution_Name']."</td>";
        echo "<td>".$row['Institution_Address']."</td>";
        echo "<td>".$row['Institution_Phone']."</td>";
        echo "<td>".$row['Adult_Mask']."</td>";
        echo "<td>".$row['Child_Mask']."</td>";
        echo "<td>".$row['Source_Time']."</td>";
        echo "</tr>";
    }
    
    $db=null;//取消連線
