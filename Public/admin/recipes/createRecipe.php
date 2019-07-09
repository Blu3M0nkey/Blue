<?php
    require_once('../../../Private/initialize.php');
    
    if(is_post_request()){

        $title = $_POST['Title'] ?? '';
        $type = $_POST['type'] ?? '';
        $nation = $_POST['nation'] ?? '';
        $ing = $_POST['ingredients'] ?? '';
        $directions = $_POST['directions'] ?? ''; 
    }else{
        redirect_to(url_for('/admin/recipes.createRecipe.php'));
    }
?>