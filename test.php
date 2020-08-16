<?php

echo "enter root directory\n";
$rootDir="";
$rootDir=readline($rootDir);

$str=shell_exec('cat /home/orxan/000-default.conf | grep "#DocumentRoot"');
echo $str;


$file=file_get_contents("/home/orxan/000-default.conf");

//echo $file;

$replace="        #DocumentRoot " . $rootDir . "\n";
$file=str_replace($str,$replace,$file);

file_put_contents("/home/orxan/000-default.conf",$file);

//if(!($fp=fopen("/home/orxan/000-default.conf",w))) die("can not open file");






echo $rootDir;



$append="
<Directory " . $rootDir . ">
    Options Indexes FollowSymLinks
    AllowOverride None
    Require all granted
</Directory>
";


file_put_contents("/home/orxan/apache2.conf",$append,FILE_APPEND);


?>