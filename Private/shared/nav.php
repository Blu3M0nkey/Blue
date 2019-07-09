<navigation>
    <ul>
        <li><a href="<?=url_for('/index.php')?>">Main</a></li>
        <li><div class="dropdown"><a href = "">Recipes</a>
            <div class="dropdown_content">
                <a href = "">Breakfast</a>
                <a href="">Lunch</a>
                <a href="">Dinner</a>
                <a href="">Snacks</a>
            </div></div></li>
        <div class = 'right_nav'>
        <li><div class = "dropdown admin">
            <a href="<?= url_for('/admin/index.php')?>">Admin</a>
            <div class = "dropdown_content">
            <a href="<?= url_for('/admin/pages/index.php')?>">Pages</a>
            <a href="<?= url_for('/admin/recipes/index.php')?>">Recipes</a>
            </div></div></li>
        <li><a href="<?= url_for('/user/login.php')?>">log in</a></li>
        </div>
    </ul>
</navigation>
