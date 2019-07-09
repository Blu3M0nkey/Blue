<?php require_once('../../../Private/initialize.php'); 
    $title ="Add Recipe";
    include(SHARED_PATH.'/admin_head.php')
?>
<div id="content" style="padding-bottom:75px;">
<form action="<?= url_for("admin/recipes/createRecipe.php"); ?>" method="post">
    Recipe Name:<br>
    <input type="text" name="Title"><br>
    Meal type:
    <select name="Course">
        <option value="breakfast">Breakfast</option>
        <option value="lunch">Lunch</option>
        <option value="dinner">Dinner</option>
        <option value="snack">Snack</option>
        <option value="Dessert">Dessert</option>    
    </select>
    <br>Type:
    <select name="type" mulitple>
        <option value="Vegetarian">Vegetarian</option>
        <option value="None">None</option>
        
    </select>
    <br>National Influence:
    <select name="nation">
        <option value="Mex">Mexican</option>
        <option value="ital">Italian</option>
        <option value="lou">Louisiana</option>
        <option value="Asian">Asian</option>
        <option value="American">American</option>
        <option value="med">Mediterranean</option>
    </select>
    <br>Ingredients:<br>
    <textarea name="ingredients" style="width:85%; height:300px"></textarea>
    <br>Directions:<br>
    <textarea name="directions" style="width:85%; height:300px"></textarea><br>
    <input type="submit" value="Add Recipe">
</form>


</div>

<?php include(SHARED_PATH.'/admin_footer.php');?>