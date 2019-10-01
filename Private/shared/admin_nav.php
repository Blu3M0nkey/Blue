<navigation>
        <ul>
            <li><a href = "<?=url_for('/admin/index.php');?>">Main</a></li>
            <li><a href = "">Diets</a></li>
            <li><div class="dropdown"><a href="<?=url_for('/admin/recipes/index.php');?>">Recipes</a>
                <div class="dropdown_content">
                    <a href="<?= url_for('/admin/recipes/addRecipe.php')?>">Add Recipe</a>
                    <a href="<?= url_for('/admin/recipes/editRecipe.php')?>">Edit Recipe</a>
                </div></div></li>
            <li><a href="<?=url_for('/admin/pages/index.php');?>">Pages</a></li>
            <li><a href="<?=url_for('/index.php')?>">Site Main</a></li>
            
        </ul>
    </navigation>