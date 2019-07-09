<?php
    if(!isset($page_title)){$page_title = 'Admin Area';}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>My Blue Butterfly- <?= 'Admin '.$page_title;?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?= url_for('/stylesheets/main.css')?>"/>
    <?php if(isset($script))echo $script;?>
</head>
<body>
    <header><h1>My Blue Butterfly- Admin Area</h1></header>
    
    <?php include(SHARED_PATH.'/admin_nav.php');?> 