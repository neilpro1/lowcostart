<?php 
    class FirstSesson {
        private $user;
        private $password;
        private $dataSesson = 'login';
        
        public function setUser($user) {
            $this->user = $user;
            save($this->dataSesson, $this);
        }
        
        public function setPassword($pass) {
            $this->password = $pass;
            save($this->dataSesson, $this);
        }
        
        public function getUser() {
            return restore($this->dataSesson, $this)->user;
        }
        
        public function getPassword() {
            return restore($this->dataSesson, $this)->password;
        }
        
        public function haveAcess(){
            return !(is_null($this->getUser()) && is_null($this->getPassword()));
        }
        
        function blockAcess() {
            save('block', 0);
        }

        function desblockAcess() {
            save('block', 1);
        }

        function haveAcessForPage() {
            return restore('block', null);
        }
    }
?>