<?php 
//Functions that will establish a connection with the database

require_once("dbCredentials.php");

//Error checks
function confirm_db_conn(){
    if(mysqli_connect_errno()){
        $msg = "Database Connection failed : ";
        $msg.= mysqli_connect_error();
        $msg.= " (".mysqli_connect_errno().")";
        exit($msg);
    }
}

function confirm_db_result($result){
    if(!$result){
        exit("Database Query Failed, idky though. I'll get to it later. K bye.");
    }
}


// Create a connection:
function db_connect(){
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,DB_NAME);
    confirm_db_conn();
    return $conn;
}

// End connection:
function db_disconnect($conn){
    if(isset($conn)){
        mysqli_close($conn);
    }
}

// escape special characters in a string, shortens the name 
function db_escape($conn, $str){
    return mysqli_real_escape_string($conn, $str);
}


?>