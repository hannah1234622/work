<?php

    $county = array("請選擇","台北市","基隆市","新北市","宜蘭縣","桃園市","新竹市","新竹縣","苗栗縣","台中市","彰化縣","南投縣","嘉義市","嘉義縣","雲林縣","台南市","高雄市","澎湖縣","金門縣","屏東縣","台東縣","花蓮縣","連江縣");
    $city = $_POST["city"];
    $region = $_POST["region"];
    function curl(){
        $ch = curl_init();//初始化curl 令變數為 $curlobj
        curl_setopt($ch, CURLOPT_URL,"https://quality.data.gov.tw/dq_download_json.php?nid=116285&md5_url=2150b333756e64325bdbc4a5fd45fad1");//向網址發出請求 訪問該網頁
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//執行後不打印出來
        date_default_timezone_set('Asia/Taipei'); //設置台北時區
        curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); //設為 TRUE 時 開啟COOKIE
        curl_setopt($ch, CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array("content-type:application/x-www-form-urlencoded; charset=UTF-8"));
        curl_exec($ch);//執行curl
        $output=curl_exec($ch);  // 執行 curl 並令一個變數 $output
        curl_close($ch); // 關閉curl 
        $arrayName = json_decode($output, true);//json_decode是一個方程式 對JSON格式的字符進行解碼  
        return $arrayName; 
    }
    $arrayName=curl();
    function search($arrayName, $region){ //search方程式匯入$arrayName陣列及$region POST的值
        $arr=$result=array();
        foreach ($arrayName as $key => $value) { //取得$arrayName的key值
            foreach ($value as $val) { //求出key裡面的value值
                if(strstr($val, $region)){ //若value符合搜尋值
                    array_push($arr, $key); //放入arr陣列
                }
            }
        }
        foreach ($arr as $key => $value) { //將$arr的key值求出
            if(array_key_exists($value, $arrayName)){//若key值存在
                array_push($result, $arrayName[$value]);//將key裡面的值放入array
            }
        }
        return $result;
    }
    $option = isset($_POST['submit']) ? $_POST['submit'] : false;//判斷 $_POST['submit'] 是否存在,若不存在則跳到 false
    if ($option) {
        //存在則列印出post值
        $search=search(search($arrayName, $region),$county[$city]);
        for ($i=0; $i < count($search); $i++) { 
            print_r($search[$i]['醫事機構代碼']);
            print_r($search[$i]['醫事機構名稱']);
            print_r($search[$i]['醫事機構地址']);
            print_r($search[$i]['醫事機構電話']);
            print_r($search[$i]['成人口罩剩餘數']);
            print_r($search[$i]['兒童口罩剩餘數']);
            print_r($search[$i]['來源資料時間']);
            echo "<br/>";
        }  
    } else {
        //不存在則列印出以下內容,並結束程式
        echo "<p>";
        echo "庫存資料來源: 健保特約機構口罩剩餘數量明細清單    備註資料來源: 全民健康保險特約院所固定服務時段";
        echo "<br/>";
        echo "更新頻率: 庫存每90秒更新一次, 備註每日更新3次(08:00、14:00、18:00)";
        echo "</p>";
        exit; 
    }

?>