<?php



$rootDir="";
$str="";


define("CONFIG_FILE_1","/home/orxan/000-default.conf");
define("CONFIG_FILE_2","/home/orxan/apache2.conf");


displayHeader();

if($argv[1]=="-c")
{
    $currentDir=shell_exec("pwd");
    $rootDir=$currentDir;

    processConfigFiles();
}
else
{
    getNewDirectory();
    processConfigFiles();
}




function displayHeader()
{
    global $str;

    $num=shell_exec('tput cols');
    for($i=0;$i<$num;$i++)
    {
        echo "=";
    }
    for($i=0;$i<$num;$i++)
    {
        echo " ";
    }
    for($i=0;$i<(int)$num/2-5;$i++)
    {
        echo " ";
    }

    echo "CARD\n\n";
    for($i=0;$i<(int)$num/2-10;$i++)
    {
        echo " ";
    }

    echo "Powered by ORKHAN\n\n";

    for($i=0;$i<$num;$i++)
    {
        echo "=";
    }

    echo "\n";


    $bashCommand='cat '. CONFIG_FILE_1 . ' | grep "#DocumentRoot"';
    $str=shell_exec($bashCommand);
    echo "\nCARD:  Your current directory is:  " . $str;
}


function getNewDirectory()
{
    global $rootDir;

    echo "\n---> Enter new root directory:\n";
    //$rootDir="";
    while(true)
    {
        $rootDir=readline($rootDir);
        if($rootDir=="") echo "---> Please enter new root directory.\n";
        else break;
    }
}


function processConfigFiles()
{
    global $rootDir;
    global $str;

    echo "\nCARD:  Reading your 000-default.conf file: ";
    if(($file=file_get_contents(CONFIG_FILE_1))==false) die("can not open 000-default.conf file");
    echo "Done\n";

    //echo $file;

    $replace="        #DocumentRoot " . $rootDir . "\n";
    $file=str_replace($str,$replace,$file);

    


    echo "\nCARD:  Rewriting datas to  your 000-default.conf file: ";
    if(file_put_contents(CONFIG_FILE_1,$file)==false) die ("can not write datas to 000-default.conf file");
    echo "Done\n";
    //if(!($fp=fopen("/home/orxan/000-default.conf",w))) die("can not open file");


    //echo $rootDir;



    $append="
    <Directory " . $rootDir . ">
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
    </Directory>
    ";

    echo "\nCARD:  Adding datas to  your apache2.conf file: ";
    if(file_put_contents(CONFIG_FILE_2,$append,FILE_APPEND)==false) die("can not append datas to apache2.conf file");
    echo "Done\n";

    echo "\nCARD:  Process successfully completed:\n";
    echo "       Apache root directory was changed from " . $str . " to " . $rootDir . ".\n";
    }



?>
