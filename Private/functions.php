<?php

function url_for($script_path){
    // add the leasing '/' if not present
    if($script_path[0] != '/'){$script_path = "/".$script_path;}
    return WWW_ROOT . $script_path;
}

function redirect_to($address){
    header("Location: ". $address);
    exit;
}
function h($val){
    return htmlspecialchars($val);
} // html special Chars, for sql security. 

function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_post_set($str){
    return (isset($_POST[$str]) && $_POST[$str] != '');
} 

function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors = array()){
    $output = '';
    if(!empty($errors)){
        $output.= "<div class=\"error\">";
        $output.= "<ul>";
        foreach($errors as $e){
            $output.="<li>".$e."</li>";
        }
        $output.="</ul></div>";
    }
    return $output;
    
    
}// output error arrays. 

?>