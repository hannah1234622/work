<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>

    var county = ["請選擇","台北市","基隆市","新北市","宜蘭縣","桃園市","新竹市","新竹縣","苗栗縣","台中市","彰化縣","南投縣","嘉義市","嘉義縣","雲林縣","台南市","高雄市","澎湖縣","金門縣","屏東縣","台東縣","花蓮縣","連江縣"];
    //設置縣市的陣列
    var regionArray =
    [   
        [],
        ["請選擇","中正區","大同區","中山區","松山區","大安區","萬華區","信義區","士林區","北投區","內湖區","南港區","文山區"],
        ["請選擇","仁愛區","信義區","中正區","中山區","安樂區","暖暖區","七堵區"],
        ["請選擇","萬里區","金山區","板橋區","汐止區","深坑區","石碇區","瑞芳區","平溪區","雙溪區","貢寮區","新店區","坪林區","烏來區","永和區","中和區","土城區","三峽區","樹林區","鶯歌區","三重區","新莊區","泰山區","林口區","蘆洲區","五股區","八里區","淡水區","三芝區","石門區"],
        ["請選擇","宜蘭市","頭城鎮","礁溪鄉","壯圍鄉","員山鄉","羅東鎮","三星鄉","大同鄉","五結鄉","冬山鄉","蘇澳鎮","南奧鄉","釣魚台列嶼"],
        ["請選擇","中壢區","平鎮區","龍潭區","楊梅區","新屋區","觀音區","桃園區","龜山區","八德區","大溪區","復興區","大園區","蘆竹區"],
        ["請選擇","東區","北區","香山區"],
        ["請選擇","竹北市","湖口鄉","新豐鄉","新埔區","關西鎮","芎林鄉","寶山鄉","竹東鎮","五峰鄉","橫山鄉","尖石鄉","北埔鄉","峨嵋鄉"],
        ["請選擇","竹南鎮","頭份市","三灣鄉","南庄鄉","獅潭鄉","後龍鎮","通霄鎮","苑裡鎮","苗栗市","造橋鄉","頭屋鄉","公館鄉","大湖鄉","泰安鄉","銅鑼鄉","三義鄉","西湖鄉","卓蘭鎮"],
        ["請選擇","中區","東區","南區","西區","北區","北屯區","西屯區","太平區","大里區","霧峰區","烏日區","豐原區","后里區","石岡區","東勢區","和平區","新社區","潭子區","大雅區","神岡區","大肚區","沙鹿區","龍井區","梧棲區","清水區","大甲區","外埔區","大安區"],
        ["請選擇","芬園鄉","花壇鄉","秀水鄉","鹿港鎮","福興鄉","線西鄉","和美鄉","伸港鄉","員林市","社頭鄉","永靖鄉","埔心鄉","溪湖鎮","大村鄉","埔鹽鄉","田中鎮","北斗鎮","田尾鄉","埤頭相","溪州鄉","竹塘鄉","二林鎮","大城鄉","芳苑鄉","二水鄉"],
        ["請選擇","南投市","中寮鄉","西屯鎮","國姓鄉","埔里鎮","仁愛鄉","名間鄉","集集鎮","水里鄉","魚池鄉","信義鄉","竹山鎮","鹿谷鄉"],
        ["請選擇","東區","西區"],
        ["請選擇","番路鄉","梅山鄉","竹崎鄉","阿里山","中埔鄉","大埔鄉","水上鄉","鹿草鄉","太保市","朴子市","東石鄉","六腳鄉","新港鄉","民雄鄉","大林鎮","溪口鄉","義竹鄉","布袋鎮"],
        ["請選擇","斗南鎮","大埤鄉","虎尾鎮","土庫鎮","褒忠鄉","東勢鄉","台西鄉","崙背鄉","麥寮市","斗六市","林內鄉","古坑鄉","荊桐鄉","西螺鎮","二崙鄉","水林鄉","口湖鄉","四湖鄉","元長鄉"],
        ["請選擇","中西區","東區","南區","北區","安平區","安南區","永康區","歸仁區","新化區","左鎮區","玉井區","楠西區","南化區","仁德區","關廟區","龍崎嶇","官田區","麻豆區","佳里區","西港區","七股區","將軍區","學甲區","北門區","新營區","後壁區","白河區","東山區","六甲區","下營區","柳營區","鹽水區","善化區","大內區","山上區","新市區","安定區"],
        ["請選擇","新興區","前金區","苓雅區","鹽埕區","鼓山區","旗津區","前鎮區","三民區","楠梓區","小港區","左營區","仁武區","大社區","東沙群島","南沙群島","岡山區","路竹區","阿蓮區","田寮區","燕巢區","橋頭區","梓官區","彌陀區","永安區","湖內區","鳳山區","大寮區","林園區","鳥松區","大樹區","旗山區","美濃區","六龜區","內門區","杉林區","甲仙區","桃源區","那瑪夏區","茂林區","茄萣區"],
        ["請選擇","馬公市","西嶼市","望安鄉","七美鄉","白沙鄉","湖西鄉"],
        ["請選擇","金沙鎮","金湖鎮","金寧鄉","金城鎮","烈嶼鄉","烏坵鄉"],
        ["請選擇","屏東市","三地門鄉","霧台鄉","瑪家鄉","九如鄉","里港鄉","高樹鄉","鹽埔鄉","長治鄉","麟洛鄉","竹田鄉","內埔鄉","萬丹鄉","潮州鎮","泰武鄉","來義鄉","萬巒鄉","崁頂鄉","新埤鄉","南州鄉","林邊鄉","東港鄉","琉球鄉","佳冬鄉","新園鄉","枋寮鄉","枋山鄉","春日鄉","獅子鄉","車城鄉","牡丹鄉","恆春鎮","滿州鄉"],
        ["請選擇","台東市","綠島鄉","蘭嶼鄉","延平鄉","卑南鄉","鹿野鄉","關山鎮","海端鄉","池上鄉","東河鄉","成功鎮","長濱鄉","太麻里","金峰鄉","大武鄉","達仁鄉"],
        ["請選擇","花蓮市","新城鄉","秀林鄉","吉安鄉","壽豐鄉","鳳林鄉","光復鄉","豐濱鄉","瑞穗鄉","萬榮鄉","玉里鎮","卓溪鄉","富里鄉"],
        ["請選擇","南竿鄉","北竿鄉","莒光鄉","東引鄉"],
    ];

    document.getElementById("sel1").onchange = function(){ 
        var selectNum = this.selectedIndex;//獲取選擇的索引值 從1開始,若沒有為-1
    
    document.write(selectNum);
    document.getElementById("sel2").lenght=1;//第二個選項設定初始值
    for(var i=0;i<regionArray[selectNum-1].lenght;i){ //for(變數為零;regionArray矩陣長度-1;變數加一)
        var node = document.createElement("option");//插入option元素
        var text = document.createTextNode(regionArray[selectNum-1][i]);//獲取陣列的元素
        node.appendChild(text);
        document.getElementById("sel2").appendChild(node);
    }
    };
</script>

<div style="background:blue"><!--設置背景-->
    <h1>YASCO</h1>
</div>
<form method="post" action=""><!--設置表單-->
    <select name="sel1" id="sel1">
        <option>請選擇</option>
        <option>台北市</option>
        <option>基隆市</option>
    </select>
    
    <select name="sel2" id="sel2">
        <option>請選擇</option>
    </select>
    <!--<select name ="location" id="location" onchange="myFunction()">
        <script>
            var i;
            for(i=0;i < county.lenght;i++){
                '<option value="'+i+'">'+county[i]+'</option>';
            }
        </script>
    </select>
    <select name ="region" id="region">
        <script>
            var j;
            for(j=0;j < _RegionArray.lenght;j++){
                '<option value="'+j+'">'+_RegionArray[j]+'</option>';
            }
        </script>
    </select>
    <input type="submit" value="附近的藥局"/>
    
    <p id="demo"></p>-->
</form>

<?php
    $option = isset($_POST['location']) ? $_POST['location'] : false;
    if ($option) {
        echo htmlentities($_POST['location'], ENT_QUOTES, "UTF-8");
    } else {
    echo "庫存資料來源: 健保特約機構口罩剩餘數量明細清單    備註資料來源: 全民健康保險特約院所固定服務時段";
    echo "<br/>";
    echo "更新頻率: 庫存每90秒更新一次, 備註每日更新3次(08:00、14:00、18:00)";
    exit; 
    }
    /*$url="http://localhost/dashboard/test/test.php?get_location=".$_POST[$a[$i]]."";//向該網頁往指令為變數
    echo $url;//測試
    $ch = curl_init();//初始化curl 令變數為 $ch
    curl_setopt($ch,CURLOPT_URL,$url);//向網址發出請求 訪問該網頁
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//執行後不打印出來
    /*$output = curl_exec($ch);//執行curl將輸出另為變數
    echo $output;*/
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
    $address=[];
    echo "<br>";
    for ($i=0; $i < count($arrayName); $i++) {
        $option = substr (($arrayName[$i]['醫事機構地址']),0,9); //print 出 $output   substr限制範圍後,可只取部分字元,字串擷取
        
        if(!in_array($option,$address)){
            //echo $option;
            echo '<br>';
            echo $arrayName[$i]['醫事機構地址'];
        }
        array_push($address,$option);
    }   
?>   

</body>
</html>
