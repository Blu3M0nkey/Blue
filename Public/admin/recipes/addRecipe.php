<?php require_once('../../../Private/initialize.php'); 
    $title ="Add Recipe";
    $script="<script src='".url_for("/scripts/function.js")."'></script>";
    $recipe=[];
    $errors = [];
    //$errors['Title'] = '';
    //$errors['Course'] = '';
    //$errors['type'] = '';
    //$errors['nation'] = '';
    //$errors['amount'] = '';
    //$errors['ingName'] = '';
    //$errors['directions'] = '';
        
    if(is_post_request()){
        // Set values
        $recipe['Title'] = $_POST['Title']??'';
        $recipe['servings'] = $_POST['servings']??'';
        $recipe['cookingTime'] = $_POST['servings'] ??'';
        $recipe['Course']=$_POST['Course']??'';
        $recipe['type'] = $_POST['type'] ?? '';
        $recipe['nation'] = $_POST['nation'] ?? '';
        $recipe['amount'] = $_POST['amount'];
        $recipe['ingName']=$_POST['ingName'];
        $recipe['directions'] = $_POST['directions']; 
       
        // incec values are set, and the recipe conforms to standards:
        // store the recipe:
        
        $result = add_recipe($recipe);
        if($result == true){
            $new_id = mysqli_insert_id($db);
            //redirect_to(url_for('/admin/recipes/viewRecipe.php?id='.$new_id));
        }else{
            $errors = $result;
        }
        
    }else {
        $recipe['Title'] = '';
        $recipe['Course'] = '';
        $recipe['type'] = '';
        $recipe['nation'] = '';
        $recipe['amount'] = [''];
        $recipe['ingName'] = [''];
        $recipe['directions'] = [''];

    }
    
    $Courses = get_courses();
    $units = get_units();

    include(SHARED_PATH.'/admin_head.php')
?>
<div class="column middle right" style="padding-bottom:75px;">
    
    
     <p class="error"> * Required <br/><?= display_errors($errors);?></p>
    <form class="recipe" action="<?= url_for("admin/recipes/addRecipe.php"); ?>" method="post">
        <dl>
            <dt>Recipe Name:</dt>
            <dd><input type="text" name="Title" value="<?= $recipe['Title'];?>" required><span class="error">*<?=$errors['Title']??"";?></span></dd>
        </dl> <!-- end Recipe name -->
        <dl>    
            <dt>Servings:</dt>
            <dd><input type="text" name="servings" value="<?= $recipe['servings']??'';?>" required><span class="error">*<?=$errors['servings']??"";?></span></dd>
        </dl> <!-- end Recipe name -->
        <dl>
            <dt>Cook Time:</dt>
            <dd><input type="text" name="cookTime" value="<?= $recipe['cookingTime']??'';?>" required><span class="error">*<?= $errors['cookingTime']??"";?></span></dd>
        </dl> <!-- end Recipe name -->
        <dl>
            <dt>Course</dt>
            <dd><select name="Course" required>
                <option value="" <?php if($recipe['Course']=="") echo 'selected';?> >-- Select one --</option>
                <?php 
                    while($C = mysqli_fetch_array($Courses)){
                        echo "<option value =\"".$C['course_name']."\"";
                        if($C['course_name'] == $recipe['Course']){
                            echo " selected";
                        }
                        echo">".$C['course_name']."</option>";
                    }
                    mysqli_free_result($Courses);
                ?>
                </select><span class="error">*<?=$errors['Course']??""?></span>
            </dd>
        </dl> <!-- end Courses -->
        
        <dl>
        <dt>Type:</dt>
        <dd><select name="type" size = "3" multiple>
            <?php $types = get_types(); ?>
                <option value="None" <?php if($recipe['type'] == ''){echo 'selected';} ?>>None</option>
                <?php 
                while($T = mysqli_fetch_array($types)){
                echo "<option value=\"".$T['type_name']."\"";
                    if($T['type_name']== $recipe['type']){
                        echo "selected";
                    }
                        
                    echo ">".$T['type_name']."</option>";
                }?>
                
            </select>
            </dd>
        </dl> <!-- end Type -->
        
        <dl>
            <dt>National Influence:</dt>
            <dd><select name="nation">
                <option <?php if($recipe['nation'] =='')echo 'selected';?>>-- Select one --</option>
                <?php $nations = get_nations();
                    while($N = mysqli_fetch_assoc($nations)){
                      echo "<option value =\"".$N['type_name']."\"";
                        if($N['type_name'] == $recipe['nation']){
                            echo " selected";
                        }
                        echo">".$N['type_name']."</option>";
                    }
                    mysqli_free_result($nations);  
                    
                
                ?>
            </select></dd>
        </dl> <!-- end National -->
        
        <dl><dt>Ingredients:<span class="error">*<?=$errors['ingName']??''?></span></dt>
            <div id="ingredients">
                
                <?php for($i=0;$i<count($recipe['amount']);$i++){?>
                <div>
                    <dd>
                    <input type="text" name="amount[<?=$i?>]" value="<?=h($recipe['amount'][$i]);?>" size="4">
                    
                    <select name="units">
                        <?php foreach($units as $unit){
                            foreach($unit as $u){
                            
                            $sel=$recipe['units'][$i] == $u ? ' selected':' ';
                            echo "<option value=".$u.$sel.">".$u."</option>";   }                           
                        } ?>
                        <option value="whole">whole</option>
                        <option value="none">N/A</option>
                    </select>
                    
                    <input type="text" name="ingName[<?=$i?>]" value="<?=h($recipe['ingName'][$i]);?>">
                <?php if($i==0){ ?>
                    <img src="<?=url_for('/images/add.png');?>" onclick=add_ingredient("<?=url_for('images/minus.png')?>")>
                <?php }else{ ?>
                    <img src="<?=url_for('/images/minus.png');?>" onclick=remove_child("ingredients",<?=($i+1);?>)>
                <?php } ?>
                    </dd>
                </div><?php } ?>
            </div>
        </dl> <!-- end ingredients -->
        
        <dl>
            <dt>Directions:<span class="error">*<?=$errors['directions']??''?></span></dt>
        </dl> <!-- end Directions -->
        <dl id="steps">
            <dd>
                <?php for($i = 0;$i < count($recipe['directions']);$i++) { ?>
                <i>Step <?=$i+1; ?>:</i><br>
                <textarea name="directions[<?=$i?>]" style="width:85%; height:150px">
                    <?=h($recipe['directions'][$i]); ?>
                </textarea>
                <?php if($i==0){ ?>
                    <img onclick=add_step("<?= url_for('images/minus.png')?>") src="<?=url_for('/images/add.png')?>" >
            
                <?php }else{ ?>
                    <img src="<?=url_for('/images/minus.png')?>" onclick=remove_child("directions",<?=($i+1);?>)> 
                <?php }echo "<br>";} ?> <!-- right not i+1 removes the last text block -->
            </dd>
        </dl>
            
        <input type="submit" value="Add Recipe">
    </form>
</div>

<?php include(SHARED_PATH.'/admin_footer.php');?>