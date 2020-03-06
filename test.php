<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <div class="jumbotron" style="position: absolute;top: 0px;width: 100%;"><!--設置背景-->
        <h1><span class="badge badge-secondary" style="position: absolute;left: 250px;">YASCO</span></h1></h1>
        <div style="background-color: white;width: 80%;margin-left: 10%;padding: 30px;margin-top: 5%;">
            <h1 style="color: rgb(4, 129, 255);font-weight: bold;">口罩供需即時資訊查詢</h1>
            <hr>
            <ol style="border: black 1px solid;position: relative;left: 15%;width: 70%;padding: 20px;">
                <li>庫存資料來源為衛福部健保資料庫，更新頻率為90秒，若對庫存數字有疑問，可以直接詢問衛福部。</li>
                <li>若資料呈現灰色底色者庫存可能不正確。</li>
                <li>新增我附近的藥局功能，可以查詢方圓500公尺到3公里內的販售點。</li>
                <li>加入藥局販售備註，若是採發號碼牌者，庫存可能已經被預約完。</li>
                <li>如果您是藥局，發現備註有誤或想加入備註請直接使用藥局VPN系統裡的備註資訊。</li>
            </ol>
            <form action="" method="post">
                <span class="badge badge-secondary">縣市</span>
                <select name="city" id="city" onchange="change(this.value)" >
                    <option value="0">請選擇</option>
                    <option value="1">台北市</option>
                    <option value="2">基隆市</option>
                    <option value="3">新北市</option>
                    <option value="4">宜蘭縣</option>
                    <option value="5">桃園市</option>
                    <option value="6">新竹市</option>
                    <option value="7">新竹縣</option>
                    <option value="8">苗栗縣</option>
                    <option value="9">台中市</option>
                    <option value="10">彰化縣</option>
                    <option value="11">南投縣</option>
                    <option value="12">嘉義市</option>
                    <option value="13">嘉義縣</option>
                    <option value="14">雲林縣</option>
                    <option value="15">台南市</option>
                    <option value="16">高雄市</option>
                    <option value="17">澎湖縣</option>
                    <option value="18">金門縣</option>
                    <option value="19">屏東縣</option>
                    <option value="20">台東縣</option>
                    <option value="21">花蓮縣</option>
                    <option value="22">連江縣</option>
                </select>
                <select name="region" id="region" onchange = "region_value();">
                    <option value="0">請選擇</option>
                </select>
                <input type="submit" name="submit" value="查詢口罩庫存">
            </form>

        </div>
    </div>
    <script>
        //設置縣市的陣列
        var regions = new Array();
            regions[1]=new Array("請選擇","中正區","大同區","中山區","松山區","大安區","萬華區","信義區","士林區","北投區","內湖區","南港區","文山區");
            regions[2]=new Array("請選擇","仁愛區","信義區","中正區","中山區","安樂區","暖暖區","七堵區");
            regions[3]=new Array("請選擇","萬里區","金山區","板橋區","汐止區","深坑區","石碇區","瑞芳區","平溪區","雙溪區","貢寮區","新店區","坪林區","烏來區","永和區","中和區","土城區","三峽區","樹林區","鶯歌區","三重區","新莊區","泰山區","林口區","蘆洲區","五股區","八里區","淡水區","三芝區","石門區");
            regions[4]=new Array("請選擇","宜蘭市","頭城鎮","礁溪鄉","壯圍鄉","員山鄉","羅東鎮","三星鄉","大同鄉","五結鄉","冬山鄉","蘇澳鎮","南奧鄉","釣魚台列嶼");
            regions[5]=new Array("請選擇","中壢區","平鎮區","龍潭區","楊梅區","新屋區","觀音區","桃園區","龜山區","八德區","大溪區","復興區","大園區","蘆竹區");
            regions[6]=new Array("請選擇","東區","北區","香山區");
            regions[7]=new Array("請選擇","竹北市","湖口鄉","新豐鄉","新埔區","關西鎮","芎林鄉","寶山鄉","竹東鎮","五峰鄉","橫山鄉","尖石鄉","北埔鄉","峨嵋鄉");
            regions[8]=new Array("請選擇","竹南鎮","頭份市","三灣鄉","南庄鄉","獅潭鄉","後龍鎮","通霄鎮","苑裡鎮","苗栗市","造橋鄉","頭屋鄉","公館鄉","大湖鄉","泰安鄉","銅鑼鄉","三義鄉","西湖鄉","卓蘭鎮");
            regions[9]=new Array("請選擇","中區","東區","南區","西區","北區","北屯區","西屯區","太平區","大里區","霧峰區","烏日區","豐原區","后里區","石岡區","東勢區","和平區","新社區","潭子區","大雅區","神岡區","大肚區","沙鹿區","龍井區","梧棲區","清水區","大甲區","外埔區","大安區");
            regions[10]=new Array("請選擇","芬園鄉","花壇鄉","秀水鄉","鹿港鎮","福興鄉","線西鄉","和美鄉","伸港鄉","員林市","社頭鄉","永靖鄉","埔心鄉","溪湖鎮","大村鄉","埔鹽鄉","田中鎮","北斗鎮","田尾鄉","埤頭相","溪州鄉","竹塘鄉","二林鎮","大城鄉","芳苑鄉","二水鄉");
            regions[11]=new Array("請選擇","南投市","中寮鄉","西屯鎮","國姓鄉","埔里鎮","仁愛鄉","名間鄉","集集鎮","水里鄉","魚池鄉","信義鄉","竹山鎮","鹿谷鄉");
            regions[12]=new Array("請選擇","東區","西區");
            regions[13]=new Array("請選擇","番路鄉","梅山鄉","竹崎鄉","阿里山","中埔鄉","大埔鄉","水上鄉","鹿草鄉","太保市","朴子市","東石鄉","六腳鄉","新港鄉","民雄鄉","大林鎮","溪口鄉","義竹鄉","布袋鎮");
            regions[14]=new Array("請選擇","斗南鎮","大埤鄉","虎尾鎮","土庫鎮","褒忠鄉","東勢鄉","台西鄉","崙背鄉","麥寮市","斗六市","林內鄉","古坑鄉","荊桐鄉","西螺鎮","二崙鄉","水林鄉","口湖鄉","四湖鄉","元長鄉");
            regions[15]=new Array("請選擇","中西區","東區","南區","北區","安平區","安南區","永康區","歸仁區","新化區","左鎮區","玉井區","楠西區","南化區","仁德區","關廟區","龍崎嶇","官田區","麻豆區","佳里區","西港區","七股區","將軍區","學甲區","北門區","新營區","後壁區","白河區","東山區","六甲區","下營區","柳營區","鹽水區","善化區","大內區","山上區","新市區","安定區");
            regions[16]=new Array("請選擇","新興區","前金區","苓雅區","鹽埕區","鼓山區","旗津區","前鎮區","三民區","楠梓區","小港區","左營區","仁武區","大社區","東沙群島","南沙群島","岡山區","路竹區","阿蓮區","田寮區","燕巢區","橋頭區","梓官區","彌陀區","永安區","湖內區","鳳山區","大寮區","林園區","鳥松區","大樹區","旗山區","美濃區","六龜區","內門區","杉林區","甲仙區","桃源區","那瑪夏區","茂林區","茄萣區");
            regions[17]=new Array("請選擇","馬公市","西嶼市","望安鄉","七美鄉","白沙鄉","湖西鄉");
            regions[18]=new Array("請選擇","金沙鎮","金湖鎮","金寧鄉","金城鎮","烈嶼鄉","烏坵鄉");
            regions[19]=new Array("請選擇","屏東市","三地門鄉","霧台鄉","瑪家鄉","九如鄉","里港鄉","高樹鄉","鹽埔鄉","長治鄉","麟洛鄉","竹田鄉","內埔鄉","萬丹鄉","潮州鎮","泰武鄉","來義鄉","萬巒鄉","崁頂鄉","新埤鄉","南州鄉","林邊鄉","東港鄉","琉球鄉","佳冬鄉","新園鄉","枋寮鄉","枋山鄉","春日鄉","獅子鄉","車城鄉","牡丹鄉","恆春鎮","滿州鄉");
            regions[20]=new Array("請選擇","台東市","綠島鄉","蘭嶼鄉","延平鄉","卑南鄉","鹿野鄉","關山鎮","海端鄉","池上鄉","東河鄉","成功鎮","長濱鄉","太麻里","金峰鄉","大武鄉","達仁鄉");
            regions[21]=new Array("請選擇","花蓮市","新城鄉","秀林鄉","吉安鄉","壽豐鄉","鳳林鄉","光復鄉","豐濱鄉","瑞穗鄉","萬榮鄉","玉里鎮","卓溪鄉","富里鄉");
            regions[22]=new Array("請選擇","南竿鄉","北竿鄉","莒光鄉","東引鄉");
        function change(value) {
            document.getElementById("region").options.length=0;//第二個選項設定初始值
            for(var i=0;i<regions[value].length;i++){ //for(變數為零;regionArray矩陣長度-1;變數加一)
                var node = document.createElement("option");//插入option元素
                var text = document.createTextNode(regions[value][i]);//獲取陣列的元素
                node.appendChild(text);//將text移動到node元素
                document.getElementById("region").appendChild(node);//在region的id賦予node元素
            }
        }
    </script>
</body>
</html>
<?php
    $county = array("請選擇","台北市","基隆市","新北市","宜蘭縣","桃園市","新竹市","新竹縣","苗栗縣","台中市","彰化縣","南投縣","嘉義市","嘉義縣","雲林縣","台南市","高雄市","澎湖縣","金門縣","屏東縣","台東縣","花蓮縣","連江縣");
    $ch = curl_init();//初始化curl 令變數為 $curlobj
    curl_setopt($ch, CURLOPT_URL,"https://quality.data.gov.tw/dq_download_json.php?nid=116285&md5_url=2150b333756e64325bdbc4a5fd45fad1");
    //向網址發出請求 訪問該網頁
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//執行後不打印出來
    //設置Cookie
    date_default_timezone_set('Asia/Taipei'); //設置台北時區
    curl_setopt($ch,CURLOPT_COOKIESESSION,TRUE); //設為 TRUE 時 開啟COOKIE
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array("content-type: application/x-www-form-urlencoded;charset=UTF-8"));
    curl_exec($ch);//執行curl
    $output=curl_exec($ch);  // 執行 curl 並令一個變數 $output
    curl_close($ch); // 關閉curl
    echo '<pre>';
    $arrayName = json_decode($output,true);//json_decode是一個方程式 對JSON格式的字符進行解碼

    $city = $_POST["city"];
    $region = $_POST["region"];
 
    var_dump($county[$city]);

    function search($arrayName,$region){ //search方程式匯入$arrayName陣列及$region POST的值
        $arr=$result=array();
        foreach ($arrayName as $key => $value) { //取得$arrayName的key值
            foreach ($value as $val) { //求出key裡面的value值
                if(strstr($val,$region)){ //若value符合搜尋值
                    array_push($arr,$key); //放入arr陣列
                }
            }
        }
        foreach ($arr as $key => $value) { //將$arr的key值求出
            if(array_key_exists($value,$arrayName)){//若key值存在
                array_push($result,$arrayName[$value]);//將key裡面的值放入array
            }
        }
        return $result;
    }
    //var_dump(search($arrayName,$region));//呼叫search函數,json資料符合城鎮搜尋條件
    //print_r(search(search($arrayName,$region),$county[$city]));//符合縣市搜尋條件
?>
<?php
    $county = array("請選擇","台北市","基隆市","新北市","宜蘭縣","桃園市","新竹市","新竹縣","苗栗縣","台中市","彰化縣","南投縣","嘉義市","嘉義縣","雲林縣","台南市","高雄市","澎湖縣","金門縣","屏東縣","台東縣","花蓮縣","連江縣");
    $city = $_POST["city"];
    $region = $_POST["region"];
    $option = isset($_POST['submit']) ? $_POST['submit'] : false;//判斷 $_POST['submit'] 是否存在,若不存在則跳到 false
    if ($option) { //存在則列印出post值
        $search=search(search($arrayName,$region),$county[$city]);
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
    } else { //不存在則列印出以下內容,並結束程式
        echo "<p>";
        echo "庫存資料來源: 健保特約機構口罩剩餘數量明細清單    備註資料來源: 全民健康保險特約院所固定服務時段";
        echo "<br/>";
        echo "更新頻率: 庫存每90秒更新一次, 備註每日更新3次(08:00、14:00、18:00)";
        echo "</p>";
        exit; 
    }
?>
