<?php

    include("conn.php");

    $county = array("請選擇","臺北市","基隆市","新北市","宜蘭縣","桃園市","新竹市","新竹縣","苗栗縣","臺中市","彰化縣","南投縣","嘉義市","嘉義縣","雲林縣","臺南市","高雄市","澎湖縣","金門縣","屏東縣","臺東縣","花蓮縣","連江縣");
    
    /**新增或修改資料庫**/
    if (isset($_POST["city"]) && isset($_POST["region"])) {
        //判斷 $_POST 是否存在
        $city = $_POST["city"];
        $region = $_POST["region"];
        $county_city = $county[$city];

        /**印出資料**/
        $sth = "SELECT * FROM masks WHERE Institution_Address LIKE '%$county_city%$region%';";
        $result=$db->query($sth);
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>機構編號</td>";
        echo "<td>藥局/機構名稱</td>";
        echo "<td>地址</td>";
        echo "<td>電話</td>";
        echo "<td>口罩庫存/大人</td>";
        echo "<td>口罩庫存/兒童</td>";
        echo "<td>更新時間</td>";
        echo "</thead>";
        echo "</tr>";
        echo "</thead>";        
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
        echo "</tbody>";
        echo "</table>";
    } else {
        //不存在則列印出以下內容,並結束程式
        echo "<p>";
        echo "庫存資料來源: 健保特約機構口罩剩餘數量明細清單    備註資料來源: 全民健康保險特約院所固定服務時段";
        echo "<br/>";
        echo "更新頻率: 庫存每90秒更新一次, 備註每日更新3次(08:00、14:00、18:00)";
        echo "</p>";
        exit; 
    }
    $db=null;//取消連線
