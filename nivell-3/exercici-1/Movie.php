<?php

class Movie {

private string $name;
private int $runningTime;
private string $director;

    public function __construct(string $name, int $runningTime, string $director) {
        $this->name = $name;
        $this->runningTime = $runningTime;
        $this->director = $director;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getRunningTime(): int {
        return $this->runningTime;
    }

    public function getDirector(): string {
        return $this->director;
    }
}
    
?>
