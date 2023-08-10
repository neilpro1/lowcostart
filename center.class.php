<?php
    trait CenterClass {
        private $imageDir;
        private $dataCenter = 'center';
        
        public function setImageForMain($from, $dir) {
            $this->imageDir = $dir;
            move_uploaded_file($from, $dir);
            save($this->dataCenter, $this);
        }
        
        public function setMainImageWithLink($link){
            $this->imageDir = $link;
            save($this->dataCenter, $this);
        }
        
        public function getMainImageDir() {
            return restore($this->dataCenter, $this)->imageDir;
        }
      
    }
?>