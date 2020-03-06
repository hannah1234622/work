<?PHP
    $url = "https://data.nhi.gov.tw/Datasets/Download.ashx?rid=A21030000I-D50001-001&l=https://data.nhi.gov.tw/resource/mask/maskdata.csv";
    //function getURL($url){ 
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HEADER, 1);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch,CURLOPT_HTTPHEADER, array('Host:google.com'));
        //curl_setopt($ch,CURLOPT_VERIFYHOST,FALSE);
        $data = curl_exec($ch); 
        curl_close($ch); 
        var_dump($data);
        //return $ret;
    //} 
    
?>
