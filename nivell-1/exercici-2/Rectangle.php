<?php

class Rectangle extends Shape {
    public function calculateArea() {
        return ($this->getBase() * $this->getHeight());
    }
}

?>