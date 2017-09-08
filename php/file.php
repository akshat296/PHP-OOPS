<?php 
// $txt = "Hello world!";
// $x = 5;
// $y = 10.5;
// $txt=$x+$y.$txt;
// echo $txt;
// $a=1;
$r=array("hi","hello");
$filename=fopen("pika.csv","w+");
echo fputcsv($filename,$r);
header('Content-Type: application/octet-stream');
header("Content-Type: application/download");
    // tell the browser we want to save it instead of displaying it
header('Content-Disposition: attachment; filename=pika.csv;');
// do{
//     $a++;
//     echo "hi do";
// }
// while($a<10);
?>