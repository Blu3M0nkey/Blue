<?php require_once('../../Private/initialize.php'); ?>
<?php include(SHARED_PATH.'/main_head.php')?>

<?php include(SHARED_PATH.'/nav.php');?>

<div class="row">
    
    <div class = "column middle">
        <h2>Preferences</h2>
        <form>
           
            <input type="submit" value="Save Prefrences">
        </form>
        <br><a href="<?= url_for("/user/newUser")?>"> Register </a>
        <a href=""> Forgot user id/password</a>
    </div>
    
</div>

<?php include(SHARED_PATH.'/main_footer.php');?>