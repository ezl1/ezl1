<?php
//echo $_SERVER['HTTP_REFERER']; // 来源网址url
//echo "<hr>";
//echo $_SERVER["REQUEST_URI"];  //当前网址url
function getParams()
{
   //$url = '/index.php?_p=index&_a=show&x=12&y=23';
   $url = $_SERVER["REQUEST_URI"];
   $refer_url = parse_url($url);
   $params = $refer_url['query'];
   $arr = array();
   if(!empty($params))
   {
       $paramsArr = explode('&',$params);
       foreach($paramsArr as $k=>$v)
       {
          $a = explode('=',$v);
          $arr[$a[0]] = $a[1];
       }
   }
   return $arr;
}
$arr = getParams();
//print_r($arr); 输出全部
$q1=$arr['q'];
$q2 = urldecode(base64_decode($q1));
//echo $q2;

if(!empty($q1)) {    //判参数不为空
          Header("HTTP/1.1 303 See Other");
          Header("Location: ".$q2);
          exit;
 }else {
       //echo "uc短网址(uc4.cn)提供短网址跳转服务.";
    }

?>
