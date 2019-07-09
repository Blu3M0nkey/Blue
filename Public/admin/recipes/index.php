<?php require_once('../../../Private/initialize.php'); ?>

<?php
    $Recipes = [
        ['id'=> '1', 'Title' => 'Black Beans', 'Course' => 'Side', 'type' => 'Vegetarian' ],
        ['id'=> '2', 'Title' => 'Refried Black Beans', 'Course' => 'Side', 'type' => 'Vegetarian' ],
        ['id'=> '3', 'Title' => 'Veggie Scramble Mess', 'Course' => 'Breakfast', 'type' => 'None' ],
        ['id'=> '4', 'Title' => 'Tamales', 'Course' => 'Side', 'type' => 'Mexican' ],
        ['id'=> '5', 'Title' => 'Spagetti', 'Course' => 'Dinner', 'type' => 'Italian' ]
    ];
?>

<?php $page_title= 'Recipes';?>
<?php include(SHARED_PATH.'/admin_head.php')?>

<div id="content">
    <div class = "Recipe Listing">
        <h2> Recipes </h2>
        
        <div class="actions">
            <div class="action" href="<?= url_for('/admin/recipes.addrecipe.php');?>">Add New Recipe</div>
        </div>
        
        <table class='list'>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Course</th>
                <th>Type</th>
                <th>Actions</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            
            <?php foreach($Recipes as $recipe) { ?>
                <tr>
                    <td style="text-align:right;padding-right:10px;"><?= $recipe['id'];?></td>
                    <td><?= $recipe['Title'];?></td>
                    <td><?= $recipe['Course'];?></td>
                    <td><?= $recipe['type'];?></td>
                    <td><a class="action" href="<?= url_for('/admin/recipes/recipe.php?id=').$recipe['id'];?>">View</a></td>
                    <td><a class="action" href="<?= url_for('/admin/recipes/editRecipe.php?id=').$recipe['id'];?>">Edit</a></td>
                    <td><a class="action" href="<?= url_for('/admin/recipes/recipe.php?id=').$recipe['id'];?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include(SHARED_PATH.'/admin_footer.php')?>  

