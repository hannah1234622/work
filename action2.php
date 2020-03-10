<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="test";
try {
    $db=new PDO("mysql:host=".$hostname.";dbname=".$dbname,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//錯誤訊息提醒
    echo "連線成功";
} catch (PDOExcertion $e) {
    echo $e->getMEssage();
}
?>
<?php
    header("Content-Type:text/html;charset=utf8");
    $curl_handle=curl_init();//初始化curl物件
    curl_setopt($curl_handle,CURLOPT_URL,'https://data.nhi.gov.tw/resource/mask/maskdata.csv');
    //設定要抓取的url
    curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);//執行後不打印出來
    $data=curl_exec($curl_handle);//執行curl,請求網頁
    curl_close($curl_handle);//關閉url請求
    $arr_data=mb_split("\n",$data);//將字串轉陣列

    /*$sql="SELECT COUNT(*) FROM masks";
    $result=$db->query($sql);
    echo "共有:".$result;*/

    for ($i=1; $i < count($arr_data)-1; $i++) {
        $arr_data1=mb_split(",",$arr_data[$i]);
        /*if(isset($count)){
            try {
                $sql="UPDATE masks(醫事機構代碼,醫事機構名稱,醫事機構地址,醫事機構電話,成人口罩剩餘數,兒童口罩剩餘數,來源資料時間)VALUES('$arr_data1[0]','$arr_data1[1]','$arr_data1[2]','$arr_data1[3]','$arr_data1[4]','$arr_data1[5]','$arr_data1[6]')";
                $db->exec($sql);
            } catch (PDOExcertion $e) {
                echo $sql."<br/>".$e->getMessage();
            }
        }else{*/
            try {
                $sql="INSERT INTO masks(Institution_Code,Institution_Name,Institution_Address,Institution_Phone,Adult_Mask,Child_Mask,Source_Time)VALUES('$arr_data1[0]','$arr_data1[1]','$arr_data1[2]','$arr_data1[3]','$arr_data1[4]','$arr_data1[5]','$arr_data1[6]')";
                $db->exec($sql);
            } catch (PDOExcertion $e) {
                echo $sql."<br/>".$e->getMessage();
            }            
        //}

    }
    //$conn=null;
?>