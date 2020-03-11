<?php

    include("conn.php");

    function curl()
    {
        $curl_handle=curl_init();//初始化curl物件
        curl_setopt($curl_handle,CURLOPT_URL,'https://data.nhi.gov.tw/resource/mask/maskdata.csv');//設定要抓取的url
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);//執行後不打印出來
        $data=curl_exec($curl_handle);//執行curl,請求網頁
        curl_close($curl_handle);//關閉url請求
        $arr_data=mb_split("\n",$data);//將字串轉陣列   
        return $arr_data;  
    }
    $arr_data=curl();

    /**搜尋資料庫資料的數量**/
    function count()
    {
        $sql="SELECT COUNT(*) FROM masks WHERE m_id";//搜尋資料表 masks 他的 m_id 數量
        $result=$db->prepare($sql); //準備要執行sql語句
        $result->execute();
        $row = $result->fetchColumn(0);//從0開始計算欄位值
        return $row;  
    }
    $row=count();

    for ($i=0; $i < count($arr_data)-1; $i++) {
        $arr_data1=mb_split(",",$arr_data[$i]);
        if ($row>0) {
            //若資料庫有資料則修改
            try {
                $m_id=$i;
                $sql="UPDATE masks SET Institution_Code=:Institution_Code, Institution_Name=:Institution_Name, Institution_Address=:Institution_Address, 
                Institution_Phone=:Institution_Phone, Adult_Mask=:Adult_Mask, Child_Mask=:Child_Mask, Source_Time=:Source_Time WHERE m_id=:m_id;";
                $stmt=$db->prepare($sql);
                $stmt->bindPARAM(':Institution_Code',$arr_data1[0],PDO::PARAM_INT);
                $stmt->bindPARAM(':Institution_Name',$arr_data1[1],PDO::PARAM_STR);
                $stmt->bindPARAM(':Institution_Address',$arr_data1[2],PDO::PARAM_STR);
                $stmt->bindPARAM(':Institution_Phone',$arr_data1[3],PDO::PARAM_STR);
                $stmt->bindPARAM(':Adult_Mask',$arr_data1[4],PDO::PARAM_INT);
                $stmt->bindPARAM(':Child_Mask',$arr_data1[5],PDO::PARAM_INT);
                $stmt->bindPARAM(':Source_Time',$arr_data1[6],PDO::PARAM_STR);
                $stmt->bindPARAM(':m_id',$m_id,PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOExcertion $e) {
                echo $sql."<br/>".$e->getMessage();
            }            
        } else { 
            //若資料庫沒資料則新增
            try {
                $sql="INSERT INTO masks(Institution_Code,Institution_Name,Institution_Address,Institution_Phone,Adult_Mask,Child_Mask,Source_Time)VALUES(:Institution_Code, :Institution_Name, :Institution_Address, :Institution_Phone, :Adult_Mask, :Child_Mask, :Source_Time)";
                $stmt=$db->prepare($sql);
                $stmt->bindPARAM(':Institution_Code',$arr_data1[0],PDO::PARAM_INT);
                $stmt->bindPARAM(':Institution_Name',$arr_data1[1],PDO::PARAM_STR);
                $stmt->bindPARAM(':Institution_Address',$arr_data1[2],PDO::PARAM_STR);
                $stmt->bindPARAM(':Institution_Phone',$arr_data1[3],PDO::PARAM_STR);
                $stmt->bindPARAM(':Adult_Mask',$arr_data1[4],PDO::PARAM_INT);
                $stmt->bindPARAM(':Child_Mask',$arr_data1[5],PDO::PARAM_INT);
                $stmt->bindPARAM(':Source_Time',$arr_data1[6],PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOExcertion $e) {
                echo $sql."<br/>".$e->getMessage();
            }            
        }         
    }
