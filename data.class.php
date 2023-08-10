<?php 
    function save($data, $class) {
        file_put_contents($data, serialize($class));
    }

    function clear($data) {
        file_put_contents($data, null);
    }

    function restore($data, $class) {
        if(file_exists($data) && count(file($data)) > 0) 
            return unserialize(file_get_contents($data));
        else
            return $class;
    }
?>