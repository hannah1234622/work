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

    $sql="SELECT COUNT(*) FROM masks WHERE m_id";//搜尋資料表 masks 他的 m_id 數量
    $result=$db->prepare($sql); //準備要執行sql語句
    $result->execute();
    $row = $result->fetchColumn(0);//從0開始計算欄位值
    echo $row;

    for ($i=1; $i < count($arr_data)-1; $i++) {
        $arr_data1=mb_split(",",$arr_data[$i]);
        if($row>0){
            try {
                $sql="UPDATE masks SET Institution_Code='$arr_data1[0]',Institution_Name='$arr_data1[1]',Institution_Address='$arr_data1[2]',Institution_Phone='$arr_data1[3]',Adult_Mask='$arr_data1[4]',Child_Mask='$arr_data1[5]',Source_Time='$arr_data1[6]' WHERE m_id=$i;";
                $db->exec($sql);
            } catch (PDOExcertion $e) {
                echo $sql."<br/>".$e->getMessage();
            }            
        }else{ //若資料庫沒資料則新增
            try {
                $sql="INSERT INTO masks(Institution_Code,Institution_Name,Institution_Address,Institution_Phone,Adult_Mask,Child_Mask,Source_Time)VALUES('$arr_data1[0]','$arr_data1[1]','$arr_data1[2]','$arr_data1[3]','$arr_data1[4]','$arr_data1[5]','$arr_data1[6]')";
                $db->exec($sql);
            } catch (PDOExcertion $e) {
                echo $sql."<br/>".$e->getMessage();
            }            
        }

    }
    $conn=null;
?>
