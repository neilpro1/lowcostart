<?php 
    include('data.class.php');
    include('header.class.php');
    include('center.class.php');
    include('explore.class.php');

    class Struct{
        use HeaderClass, CenterClass, UserList;
        
        public function __construct(){}
    }
?>