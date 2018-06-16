<?php
$parameters=array();
$parray=array('name'=>'Dani','edad'=>19);

bindMore($parray);

var_dump($parameters);

function bindMore($parray){
    global $parameters;
    if (empty($parameters) && is_array($parray)) {
        $columns = array_keys($parray);
        
        foreach ($columns as $i => &$column) {
            bind($column, $parray[$column]);
        }
    }
}

function bind($para, $value){
    global $parameters;
    $parameters[sizeof($parameters)] = [":" . $para , $value];
}
?>