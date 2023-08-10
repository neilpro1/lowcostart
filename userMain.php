<?php 
    class UserMain {
        private $user;
        private $desc;
        
        public function __construct($user){
            $this->user = $user;
        }
        
        public function setDesc($desc) {
            $this->desc = desc;
        }
        
        public function getDesc() {
            return $this->desc;
        }
    }

    class UserListMain {
        private $users;
        private $dataUserMain = 'usermain';
        
        public function __construct() {
            foreach(getUsers() as $key => $value) {
                $this->users[$key] = new UserMain($value);
            }
        }
        
        public function setDesc($username, $desc) {
            $this->restore($dataUserMain, $this);
            $this->users[$username]-> setDesc($desc);
            $this->save($dataUserMain, $this);
        }
        
        public function getDesc($username) {
            $this->restore($dataUserMain, $this);
            return $this->users[$username]->getDesc();
        }
        
        public function getUsers() {
            return $this->users;
        }
    }
?>