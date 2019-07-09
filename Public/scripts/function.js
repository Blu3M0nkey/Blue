function add_ingredient(pic){
    var current = document.getElementById('ingredients');
    var num = current.childElementCount;
    var div = document.createElement("div");
    var dd = document.createElement('dd');
    var input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.setAttribute('name','amount['+num+']');
    dd.appendChild(input);
    var input2 = document.createElement('input');
    input2.setAttribute('type','text');
    input2.setAttribute('name', 'ingName['+num+']');
    dd.appendChild(input2);
    var img = document.createElement('img');
    img.setAttribute('src', pic);
    img.setAttribute('onclick', 'remove_child("ingredients",'+num+')');
    dd.appendChild(img);
    div.appendChild(dd);
    current.appendChild(div);
}

function remove_child(id, num){
    var cur = document.getElementById(id);
    cur.removeChild(cur.childNodes[num]);
    
}

function add_step(pic){
    var cur = document.getElementById('steps');
    var num = cur.childElementCount;
    
    var input = document.createElement('textarea');
    input.setAttribute('name','directions['+num+']');
    input.setAttribute('style','width:85%;height:150px;')
    
    var img = document.createElement('img');
    img.setAttribute('src', pic);
    img.setAttribute('onclick', 'remove_child("steps", '+num+')');
    
    var step = document.createElement('dd');
    step.appendChild(input);
    step.appendChild(img);
    
    cur.appendChild(step);
}
