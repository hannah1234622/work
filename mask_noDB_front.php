<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script text="text/javascript" src="region.js"></script>
    <title>Document</title>
</head>
<style>
select {
    position: relative;
    top: 3px;
    padding: 7px 25px;
    border-radius: 5px;
}
form{
    padding: 20px;
}
</style>
<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <div class="jumbotron" style="position: absolute;top: 0px;width: 100%;"><!--設置背景-->
        <h1><span class="badge badge-secondary" style="position: absolute;left: 250px;">YUHUA</span></h1></h1>
        <div style="background-color: white;width: 80%;margin-left: 10%;padding: 30px;margin-top: 5%;">
            <h1 style="color: rgb(4, 129, 255);font-weight: bold;">口罩供需即時資訊查詢</h1>
            <hr>
            <ol style="border: rgb(209, 208, 208) 1px solid;position: relative;left: 15%;width: 70%;padding: 20px;border-radius: 5px;">
                <li>庫存資料來源為衛福部健保資料庫，更新頻率為90秒，若對庫存數字有疑問，可以直接詢問衛福部。</li>
                <li>若資料呈現灰色底色者庫存可能不正確。</li>
                <li>新增我附近的藥局功能，可以查詢方圓500公尺到3公里內的販售點。</li>
                <li>加入藥局販售備註，若是採發號碼牌者，庫存可能已經被預約完。</li>
                <li>如果您是藥局，發現備註有誤或想加入備註請直接使用藥局VPN系統裡的備註資訊。</li>
            </ol>
            <form action="" method="post">
                <button type="button" class="btn btn-secondary" disabled>縣市</button>
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
                <button type="button" class="btn btn-secondary" disabled>區域</button>
                <select name="region" id="region" onchange = "region_value();">
                    <option value="0">請選擇</option>
                </select>
                <input type="submit" name="submit" class="btn btn-secondary" value="查詢口罩庫存">
            </form>
            <?php include("mask_noDB_curl.php") ?>
        </div>
    </div>
</body>
</html>

