<?php 
// Admin/Users



// Recipes

function get_courses(){
    global $db;
    
    $sql = "SELECT course_name FROM course_ref ";
    $result = mysqli_query($db, $sql);
    confirm_db_result($result);
    return $result;
    
}

function get_course_id($name){
    global $db; 
    $result = mysqli_query($db, "SELECT course_id FROM course_ref WHERE course_name = ".$name);
    confirm_db_result($result);
    return $result;
}

function get_nations(){
    global $db;
    $sql = "SELECT type_name FROM nation_ref ";
    $result = mysqli_query($db, $sql);
    confirm_db_result($result);
    return $result;
}

function get_types(){
    global $db;
    $sql = "SELECT type_name FROM diet_ref";
    $result = mysqli_query($db, $sql);
    confirm_db_result($result);
    return $result;
}

function get_units(){
    global $db;
    $result = mysqli_query($db, "SELECT unit_abbrev FROM measurements");
    confirm_db_result($result);
    return $result;
}

function validate_recipe($recipe){
    // Checks that the input for new/edited recipe is valid. 
    
    if ($recipe['Title'] == ''){
        $errors['Title']='Enter a name for the recipe';
    }elseif(!has_length($recipe['Title'],['min'=>3, 'max'=>255])){
        $errors['Title'] = "Title must be between 3 and 255 characters.";
    }
    
    if($recipe['servings'] == ''){
        $errors['servings'] = "Servings are required";
    }
    if($recipe['cookingTime'] == ''){
        $errors['cookingTIme'] = "Enter cooking time";
    }else{
        $errors['cookingTime'] = '';
        if(!preg_match('/[0-9]/', $recipe['cookingTime'])) {
            $errors['cookingTime'].="Cooking Time must have a numeric part." ;
        }
           
        $time = ['hour', 'hr','h', 'min','m' ];
        foreach($time as $t){
            if(strpos($recipe['cookingTime'], $t) === false){
                $errors['cookingTime'] .= "Use hour, hr, h, minute, min, or m.";
                break;
            }
        }
            
    }
    if($recipe['Course']){
            $errors['Course'] ='Select a Course';
        }
    if($recipe['amount'][0] = ''){
            $errors['amount'] = 'Enter amount';
        }   
    foreach($recipe['ingName'] as $a){
        if($a ==''){
            $errors['ingName']="Ingredients are needed";
            break;
        }
    }
    foreach($recipe['directions'] as $a){
            if($a ==''){
            $errors['directions']= "Enter some Directions";
            break;
            }
        }
    
    return $errors;
}

function Total_yield($amount, $units){
    global $db;
    $sum = 0;
    for($i = 0; $i <= sizeof(amount), $i++){
        //get unit oz equivalent
        $oz = mysqli_execute($db, "SELECT oz_unit FROM measurements WHERE unit=".units[%i]);
        confirm_db_result($oz);
        // multiply by amount & add to sum
        %sum += ($amount[$i]*%oz);
    }
    return $sum;
}

function add_recipe($recipe){
    global $db;
    
    //validate and return if errors
    $errors = validate_recipe($recipe);
    if(!empty($errors)){
        return $errors;
    }
    
    // recipe table
    $yield = Total_yield($recipe['amount'],$recipe['unit']);
    
    $sql = "INSERT INTO recipes";
    $sql.= " VALUES (";
    $sql.= $recipe['Title'].", ".$recipe['URL']??"none".", 0, 0, 0, ";
    $sql.= $recipe['servings'];
    $sql.= ", ".$recipe['cook_time'];
    $sql.= ", ".$yield.")";
    
    $recipe_result = mysqli_execute($db, $sql);
    confirm_db_result($recipe_result);
    
    // recipe_course
    $sec_id = get_course_id($recipe['Course']);
    $recipe_id = get_recipe_id($recipe['Title']);
    
    $sql  = "INSERT INTO recipe_course VALUES (";
    $sql .= $sec_id.", ".$recipe_id;
    $sql .= ")";
    
    $recipe_result = mysqli_execute($db, $sql);
    confirm_db_result($recipe_result);
    
    // recipe_diet (type)
    $sec_id = get_diet_id($recipe['type']);
    
    $sql  = "INSERT INTO recipe_diet VALUES (";
    $sql .= $sec_id.", ".$recipe_id;
    $sql .= ")";
    
    $recipe_result = mysqli_execute($db, $sql);
    confirm_db_result($recipe_result);
    
    // recipe_ingredients
    // I would like the id already passed in with a dynamic search 
    // of the database. also store the name as  it was typed in. 
    // if no entry is present in the nutrition, store a variable
    // as unknown so that we can search and correct it later?
    // also use this time to calculate the nut value of the recipie.. 
    // will use ajax later for this.... for now , open a mesage window 
    // with vanilla JS that will ask for the right item.
    
    
    
    // recipe_steps (Directions)
    $i = 1;
    foreach($recipe['directions'] as $step){
        sql="INSERT INTO recipe_steps VALUES (";
        sql.=$recipe_id.", ".$i++.", ".$step.")";
        
        $recipe_result = mysqli_execute($db, $sql);
        confirm_db_result($recipe_result);
    }
    
    
    // recipe_nutrition
    
    
}

// Diets





?>