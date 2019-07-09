<?php 
    require_once('../../../Private/initialize.php'); 
    $title ="Edit Recipe";
    
    $script="<script src='".url_for("/scripts/function.js")."'></script>";
    include(SHARED_PATH.'/admin_head.php');
    
    $title = $Course = $type = $nation =$ing = '';
    $directions= $amount=$ingName= array('');
    $titleError = $courseError = $dirError = $ingError = '';
    
    if(is_post_request()){

        if (isset($_POST['Title'])&& $_POST['Title'] != ""){
            $title = $_POST['Title'];
        }else{
            $titleError='Enter a name for the recipe';
        }
        if(isset($_POST['Course']) && $_POST['Course']!=""){
            $Course=$_POST['Course'];
        }else{
            $courseError ='Select a Course';
        }
        $type = $_POST['type'] ?? '';
        $nation = $_POST['nation'] ?? '';
        if(isset($_POST['amount'])&& $_POST['amount']!=""){
            $amount = $_POST['amount'];
        }
        if(isset($_POST['ingName']) && $_POST['ingName']!=""){
            $ingName=$_POST['ingName'];
        }else{
            $ingError="Ingredients are needed";
        }
        if(isset($_POST['directions'])&& $_POST['directions']!=""){
            $directions = $_POST['directions'] ?? ''; 
        }else{
            $dirError= "enter some Directions";
        }
    }
    echo "<div class='column side left'";
    echo 'Title='.$title;
    echo '<br>Course='.$Course;
    echo '<br>type='.$type;
    echo '<br>Nat='.$nation;
    echo '<br>ing='.'<pre>';print_r($ingName);echo'</pre>';
    echo 'amount'.'<pre>';print_r($amount);echo'</pre>';
    echo "dir = ".'<pre>';print_r($directions);echo'</pre></div>';
?>
<div class="column middle right" style="padding-bottom:75px;">
     <p class="error"> * Required <br/></p>
    <form action="<?= url_for("admin/recipes/editRecipe.php"); ?>" method="post">
        <dl>
            <dt>Recipe Name:</dt>
            <dd><input type="text" name="Title" value="<?= h($title);?>"><span class="error">*<?=$titleError?></span></dd>
        </dl>
        <dl>
            <dt>Course</dt>
            <dd><select name="Course" required>
                <option value="" <?php if($Course=="") echo 'selected';?> >-- Select one --</option>
                <option value="breakfast" <?php if($Course=="breakfast") echo 'selected';?>>Breakfast</option>
                <option value="lunch"  <?php if($Course=="lunch") echo 'selected';?>>Lunch</option>
                <option value="dinner" <?php if($Course=="dinner") echo 'selected';?>>Dinner</option>
                <option value="snack" <?php if($Course=="snack") echo 'selected';?>>Snack</option>
                <option value="Dessert" <?php if($Course=="Dessert") echo 'selected';?>>Dessert</option>    
                </select><span class="error">*<?=$courseError?></span>
            </dd>
        </dl>
        <dl>
        <dt>Type:</dt>
        <dd><select name="type" size = "3" multiple>
                <option value="None" selected>None</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Low-carb">Low Carb</option>
                
            </select>
            </dd>
        </dl>
        <dl>
            <dt>National Influence:</dt>
            <dd><select name="nation">
                <option <?php if($nation =='')echo 'selected';?>>-- Select one --</option>
                <option value="Mex" <?php if($nation=="Mex")echo 'selected';?>>Mexican</option>
                <option value="ital"<?php if($nation=="ital")echo 'selected';?>>Italian</option>
                <option value="lou" <?php if($nation=="lou")echo 'selected';?>>Louisiana</option>
                <option value="Asian"<?php if($nation=="Asian")echo 'selected';?>>Asian</option>
                <option value="American" <?php if($nation=="American")echo 'selected';?>>American</option>
                <option value="med" <?php if($nation=="med")echo 'selected';?>>Mediterranean</option>
            </select></dd>
        </dl>
        <dl><dt>Ingredients:<span class="error">*<?=$ingError?></span></dt>
            <div id="ingredients">
                <?php for($i=0;$i<count($amount);$i++){?>
                <div><dd>
                    <input type="text" name="amount[<?=$i?>]" value="<?=h($amount[$i]);?>">
                    <input type="text" name="ingName[<?=$i?>]" value="<?=h($ingName[$i]);?>">
                <?php if($i==0){ ?>
                    <img src="<?=url_for('/images/add.png');?>" onclick=add_ingredient("<?=url_for('images/minus.png')?>")>
                <?php }else{ ?>
                    <img src="<?=url_for('/images/minus.png');?>" onclick=remove_child("ingredients",<?=($i+1);?>)>
                <?php } ?></dd></div><?php } ?>
            </div>
        </dl>
        
        <dl><dt>Directions:<span class="error">*<?=$dirError?></span></dt></dl><dl id="steps"><dd>
        <?php for($i = 0;$i < count($directions);$i++) { ?>
        <textarea name="directions[<?=$i?>]" style="width:85%; height:150px"><?=h($directions[$i]);?></textarea>
            <?php if($i==0){ ?>
                <img onclick=add_step("<?= url_for('images/minus.png')?>") src="<?=url_for('/images/add.png')?>" >
            <?php }else{ ?>
                <img src="<?=url_for('/images/minus.png')?>" onclick=remove_child("directions",<?=($i+1);?>)> <?php }} ?>
        </dd>
        
        </dl>
            
        <input type="submit" value="Add Recipe">
    </form>
</div>

<?php include(SHARED_PATH.'/admin_footer.php');?> 