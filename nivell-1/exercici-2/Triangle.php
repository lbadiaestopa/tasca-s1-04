<?php

class Triangle extends Shape {
    public function calculateArea() {
        return ($this->getBase() * $this->getHeight()) / 2;
    }
}

?>