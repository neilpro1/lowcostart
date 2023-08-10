<?php 
    trait HeaderClass{
        private $brand;
        private $dir_logo;
        private $dataHeader = 'header';
        
        public function getBrand() {
            return restore($this->dataHeader, $this)->brand;
        }
        
        public function getDirLogo() {
            return restore($this->dataHeader, $this)->dir_logo;
        }
        
        public function setBrand($new_brand){
            $this->brand = $new_brand;
            $this->dir_logo = $this->getDirLogo();
            save($this->dataHeader, $this);
        }
        
        public function setDirLogo($from, $dir_logo) {
            $this->dir_logo = $dir_logo;
            $this->brand = $this->getBrand();
            move_uploaded_file($from, $dir_logo);
            save($this->dataHeader, $this);
        }
        
        public function setDirLogoWithLink($link) {
            $this->dir_logo = $link;
            $this->brand = $this->getBrand();
            save($this-> dataHeader, $this);
        }
    }
?>