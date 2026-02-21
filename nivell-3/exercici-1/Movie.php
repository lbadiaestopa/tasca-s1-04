<?php

class Movie {

private $name;
private $runningTime;
private $director;

    public function __construct($name, $runningTime, $director) {
        $this->name = $name;
        $this->runningTime = $runningTime;
        $this->director = $director;
    }

    public function getName() {
        return $this->name;
    }

    public function getRunningTime() {
        return $this->runningTime;
    }

    public function getDirector() {
        return $this->director;
    }
}
    
?>