<?php require_once('../../Private/initialize.php'); ?>
<?php include(SHARED_PATH.'/main_head.php')?>

<?php include(SHARED_PATH.'/nav.php');?>

<div class="row">
    
    <div class = "column middle">
        <h2>New User</h2>
        <form>
            First Name:<br>
            <input type="text" name="firstName"><br>
            Last Name:<br>
            <input type="text" name="lastName"><br>
            User ID:<br>
            <input type="text" name="userId"><br>
            Email address:<br>
            <input type="email" name="email"><br>
            Password:<br>
            <input type="password" name="password"><br>
            Confirm Password:<br>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Create User">
        </form>
        <br><a href="<?= url_for("/user/newUser")?>"> Register </a>
        <a href=""> Forgot user id/password</a>
    </div>
    
</div>

<?php include(SHARED_PATH.'/main_footer.php');?>