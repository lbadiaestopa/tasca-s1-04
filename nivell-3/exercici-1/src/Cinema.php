<?php

require_once 'Movie.php';

class Cinema {

private string $name;
private string $location;
private array $movies = [];

    public function __construct(string $name, string $location, array $movies = []) {
        $this->name = $name;
        $this->location = $location;
        $this->movies = $movies;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getLocation(): string {
        return $this->location;
    }
    
    public function getMovies(): array {
        return $this->movies;
    }

    public function getMoviesStats() {
        $movieList = [];
        foreach ($this->movies as $movie) {
            $movieList[] = $movie->getName() . "\n" . $movie->getRunningTime() . "\n" . $movie->getDirector() . "\n";
        }
        return $movieList;
    }

    public function getLongestMovie(): ?Movie {
        $longestMovie = null;
        foreach ($this->movies as $movie) {
            if ($longestMovie === null || $movie->getRunningTime() > $longestMovie->getRunningTime()) {
                $longestMovie = $movie;
            }
        }
        return $longestMovie;
    }
}
    
?>
