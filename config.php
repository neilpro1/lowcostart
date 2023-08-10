<?php

    include("struct.class.php");

    function getStruct(){
        return new Struct();
    }
    
    function getBrand() {
        return (getStruct())->getBrand();
    }

    function getDirLogo() {
        return (getStruct())->getDirLogo();
    }

    function getDirImageMain() {
        return (getStruct())->getMainImageDir();
    }

    function getUsers() {
        return (getStruct())->getUsers();
    }

    function setUserPage($user) {
        save('configU', $user);
    }

    function setPicPage($pic) {
        save('configA', $pic);
    }

    function getUserPage(){
        return restore('configU', null);
    }

    function getPicPage(){
        return restore('configA', null);
    }
?>
