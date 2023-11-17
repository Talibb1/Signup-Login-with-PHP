
<?php

    define('server',"mysql:host=localhost;dbname=admin_information");
    define('user',"root");
    define('password',"");
    try
    {
        $connection = new PDO(server,user,password);    
        // echo "Database connected successfull";
    }catch(PDOException $error){
        echo $error->getMessage();
    }
?>


<!-- $connection = new PDO('mysql:host=localhost;dbname=2209g2','root',''); -->