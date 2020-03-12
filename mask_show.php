<?php
    include("mask_conn.php");
    if (isset($_POST["city"]) && isset($_POST["region"])) {
        //判斷 $_POST 是否存在
        $county = array("請選擇","臺北市","基隆市","新北市","宜蘭縣","桃園市","新竹市","新竹縣","苗栗縣","臺中市","彰化縣","南投縣","嘉義市","嘉義縣","雲林縣","臺南市","高雄市","澎湖縣","金門縣","屏東縣","臺東縣","花蓮縣","連江縣");
        $city = $_POST["city"];
        $region = $_POST["region"];
        $county_city = $county[$city];
        $sth = "SELECT * FROM masks WHERE Institution_Address LIKE '%$county_city%$region%';";
        $result=$db->query($sth);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    }
    include("mask_front.html"); 



