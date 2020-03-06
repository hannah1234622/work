<?php
    $curlobj = curl_init();//初始化 令變數為 $curlobj
    curl_setopt($curlobj, CURLOPT_UPL,"https://quality.data.gov.tw/dq_download_json.php?nid=116285&md5_url=2150b333756e64325bdbc4a5fd45fad1");
    //向網址發出請求 訪問該網頁
    
?>

