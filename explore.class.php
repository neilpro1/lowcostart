<?php
    class Art {
        private $name;
        private $dirr;
        private $desc;
        private $counter;
        private $otherArt;
        
        public function __construct($name, $dirr){
            $this->name = $name;
            $this->dirr = $dirr;
            $this->counter = 0;
        }
        
        public function setOtherArt($dirr) {
            $this->otherArt[$dirr] = $dirr;   
            $this->counter = $this->counter + 1;
        }
        
        public function getOtherArt(){
            return $this->otherArt;
        }
        
        public function getCounter() {
            return $this->counter;
        }
        
        public function getName(){
            return $this->name;
        }
        
        public function getDir(){
            return $this->dirr;
        }
        
        public function setDesc($var, $value) {
            $this-> desc[$var] = $value;
        }
        
        public function getDesc() {
            return $this-> desc;
        }
        
        public function getPrice() {
            return $this->desc['price'];
        }
    }


    class User {
        private $name;
        private $username;
        private $pic;
        private $desc;
        private $allArt;
        
        public function __construct($name, $username) {
            $this->name = $name;
            $this->username = $username;
        }
        
        public function setPic($pic){
            $this->pic = $pic;
        }
        
        public function setDesc($var, $value) {
            $this->desc[$var] = $value;
        }
        
        public function setArt($name, $dir){
            $this->allArt[$name]= new Art($name, $dir);
        }
        
        public function setOtherArt($name, $dirr){
            $this->allArt[$name]->setOtherArt($dirr);
        }
        
        public function getOtherArt($name) {
            return $this->allArt[$name] -> getOtherArt();
        }
        
        public function getCounter($name) {
            return $this->allArt[$name]->getCounter();
        }
        
        public function setDescArt($name, $var, $value) {
            $this->allArt[$name] -> setDesc($var, $value);
        }
        
        public function getName(){
            return $this->name;
        }
        
        public function getUsername(){
            return $this->username;
        }
        
        public function getPic(){
            return $this->pic;
        }
        
        public function getDesc(){
            return $this->desc;
        }
        
        public function getAllArt(){
            return $this->allArt;
        }
        
        public function getArt($name) {
            return $this->allArt[$name];
        }
        
        public function removePic($name) {
            unset($this->allArt[$name]);
        }
    }

    trait UserList{
        
        private $dataUser = 'users';
        private $users;
        
        public function restore() {
            $this->users = restore($this->dataUser, $this)->users;
        }
        
        public function save(){
            save($this->dataUser, $this);
        }
        
        public function setUser($name, $username) {
            $this->restore();
            $this->users[$username] = new User($name, $username);
            $this->save();
        }
        
        public function setPic($username, $from ,$pic){
            $this->restore();
            move_uploaded_file($from, $pic);
            $this->users[$username]->setPic($pic);
            $this->save();
        }
        
        public function setPicLink($username, $link){
            $this->restore();
            $this->users[$username]->setPic($link);
            $this->save();
        }
        
        public function setDescUser($username, $var, $value) {
            $this->restore();
            $this->users[$username]->setDesc($var, $value);
            $this->save();
        } 
        
        
        public function setDescArt($username, $name, $var, $value){
            $this->restore();
            $this->users[$username]->setDescArt($name, $var, $value);
            $this->save();
        }
        
        public function setArt($username, $from, $name, $dir) {
            $this->restore();
            move_uploaded_file($from, $dir);
            $this->users[$username]->setArt($name, $dir);
            $this->save();
        }
        
         public function setOtherArt($username, $from,$name, $dir) {
            $this->restore();
            $this->users[$username]-> setOtherArt($name, $dir);
            move_uploaded_file($from, $dir);
            $this->save();
         }
        
        public function getCounter($username, $name) {
            $this->restore();
            return $this->users[$username] ->getCounter($name);
        }
        
        public function setArtLink($username, $name, $link) {
            $this->restore();
            $this->users[$username]->setArt($name, $link);
            $this->save();
        }
        
        public function getUser($username) {
            $this->restore();
            return $this->users[$username];
        }
        
        public function getUsers(){
            $this->restore();
            return $this->users;
        }
        
        public function getPic($username) {
            $this->restore();
            return $this->users[$username] -> getPic();
        }
        
        public function getArt($username) {
            $this->restore();
            return $this->users[$username] -> getAllArt();
        }
        
        public function getArtKey($username, $key){
            $this->restore();
            return $this->users[$username] ->getArt($key);
        }
        
        public function existUser($username) {
            $this->restore();
            if(empty($this->users) || is_null($this->users)) 
                return 0;
            else if($this->getUser($username))
                return 1;
            return 0;
        }
        
        public function removeUser($username) {
            $this->restore();
            unset($this->users[$username]);
            $this->save();
        }
        
        public function removePic($username, $pic) {
            $this->restore();
            $this->users[$username] ->removePic($pic);
            $this->save();
        }
    }
?>

