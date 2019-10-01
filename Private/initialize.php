 

<?php
// this will load in all different parts in other organized functions.

    // __FILE__ returns the current path to this file
    // dirname() returns the path to the parent directory
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH",dirname(PRIVATE_PATH));
    define("PUBLIC_PATH",PROJECT_PATH.'/Public');
    define("SHARED_PATH", PRIVATE_PATH.'/shared');

    //Assign the root URL to a PHP constant
    // * Do not need to include the domain
    // * Use the same document root as the webserver
    // * Can set a hardcoded value:
    // define("WWW_ROOT", '/~path/to/root');
    // define("WWW_ROOT",' '); //for a production machine

    // * Or Dynamically,
    // looks for public the +7 includes the name public as well.
    // returns the index number
    $public_end = strpos($_SERVER['REQUEST_URI'], '/Public')+7;
    // Gets the Sub string. 
    $doc_root = substr($_SERVER['REQUEST_URI'],0,$public_end);
    define("WWW_ROOT",$doc_root);

    require_once('functions.php');
    //db functions
    require_once('db.php');
    require_once('sqlFunctions.php');
    
    //recipe and other functions
    require_once('recipeFunctions.php');
    require_once('validations.php');

    // Establish a connection to the database??
    
    $db = db_connect();
    
    

?>