<?php 
    require_once('../../../Private/initialize.php'); 
    $id= $_GET['id'] ?? '1'; //PHP > 7.0 
?>

<?php $page_title= 'Main';?>
<?php include(SHARED_PATH.'/admin_head.php')?>


<div id="main">
        <h1> Coming soon</h1>
        <?= $id ?>
</div>

<?php include(SHARED_PATH.'/admin_footer.php')?>      