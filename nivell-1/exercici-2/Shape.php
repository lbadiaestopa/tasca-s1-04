<?php

class Shape {

    private $base;
    private $height;

    public function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;
    }

    protected function getBase() {
        return $this->base;
    }

    protected function getHeight() {
        return $this->height;
    }
}
    
?>