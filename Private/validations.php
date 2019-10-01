<?php
 // Input validations, most will return bool values.

function has_length($str, $options){
    if(isset($options['max'])){
        return strlen($str) > $options['max'];
    }
    if(isset($options['min'])){
        return strlen($str) < $options['min'];
    }
    if(isset($options['exact'])){
        return strlen($str) == $options['exact'];
    }
}




?>