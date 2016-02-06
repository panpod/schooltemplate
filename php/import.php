<?php
include_once("config.php");

define("DB_HOST", 'localhost');  
    define("DB_USER", 'root');  
    define("DB_PASSWORD", '');  
    define("DB_DATABSE", 'project_1');  
    define("ADMIN_EMAIL", 'info@schoolzandmore.com');
    define("ADMIN_ADDRESS", 'B2-03, Yashodevi Avenue, Vishwashanti lane 4, Pimple Saudagar, Pune');
    define("ADMIN_PHONE", ' +91-880-606-4486');
    define("ADMIN_FACEBOOK", 'https://www.facebook.com/Mumbai-Python-Users-Group-66159182533/timeline/');
    define("ADMIN_TWITTER", 'https://twitter.com/pythonmumbai');
    define("ADMIN_GOOGLE", 'https://twitter.com/pythonmumbai');
    define("ADMIN_YOUTUBE", 'https://twitter.com/pythonmumbai');
//ENTER THE RELEVANT INFO BELOW
$mysqlDatabaseName = DB_DATABSE;
$mysqlUserName = DB_USER;
$mysqlPassword =DB_PASSWORD;
$mysqlHostName =DB_HOST;
$mysqlImportFilename ='your_my_sql_backup_file.sql';

//DO NOT EDIT BELOW THIS LINE
//Export the database and output the status to the page
$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
exec($command,$output=array(),$worked);
switch($worked){
    case 0:
        echo 'Import file <b>' .$mysqlImportFilename .'</b> successfully imported to database <b>' .$mysqlDatabaseName .'</b>';
        break;
    case 1:
        echo 'There was an error during import. Please make sure the import file is saved in the same folder as this script and check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr><tr><td>MySQL Import Filename:</td><td><b>' .$mysqlImportFilename .'</b></td></tr></table>';
        break;
}

?>