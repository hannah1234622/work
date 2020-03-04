<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    echo 
    '<div style="background:blue">
        <h1>YASCO</h1>
        
    </div>'
    ;
    $curlobj = curl_init();//初始化curl 令變數為 $curlobj
    curl_setopt($curlobj, CURLOPT_URL,"https://quality.data.gov.tw/dq_download_json.php?nid=116285&md5_url=2150b333756e64325bdbc4a5fd45fad1");
    //向網址發出請求 訪問該網頁
    curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);//執行後不打印出來
    //設置Cookie
    date_default_timezone_set('Asia/Taipei'); //設置台北時區
    curl_setopt($curlobj,CURLOPT_COOKIESESSION,TRUE); //設為 TRUE 時 開啟COOKIE
    curl_setopt($curlobj,CURLOPT_HEADER,0);
    curl_setopt($curlobj,CURLOPT_HTTPHEADER,array("content-type: application/x-www-form-urlencoded; 
    charset=UTF-8"));
    curl_exec($curlobj);//執行curl
    $output=curl_exec($curlobj);  // 執行 curl 並令一個變數 $output
    curl_close($curlobj); // 關閉curl
    echo '<pre>';
    $arrayName = json_decode($output,true);//json_decode是一個方程式 對JSON格式的字符進行解碼
    echo count($arrayName);
    print_r ($arrayName[0]); 
?>
  
    <?php  

    $address=array();
    echo "<br>";
    
    for ($i=0; $i < count($arrayName); $i++) {
            $option = substr (($arrayName[$i]['醫事機構地址']),0,9); //print 出 $output   substr限制範圍後,可只取部分字元
            array_push($address,$option);
            print_r($option);
            echo '<br>';

    }

    echo "<br>";    
?>   

</body>
</html>