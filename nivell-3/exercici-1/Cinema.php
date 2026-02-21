<?php

require_once 'Movie.php';

class Cinema {

private $name;
private $location;
private array $movie = [];

    public function __construct($name, $location, $movies) {
        $this->name = $name;
        $this->location = $location;
        $this->movie = $movies;
    }

    public function getMovies() {
        return $this->movie;
    }

    public function getMoviesStats() {
        $movieList = [];
        foreach ($this->movie as $movie) {
            $movieList[] = $movie->getName() . "\n" . $movie->getRunningTime() . "\n" . $movie->getDirector() . "\n";
        }
        return $movieList;
    }

    public function getLongestMovie() {
        $longestMovie = null;
        foreach ($this->movie as $movie) {
            if ($longestMovie === null || $movie->getRunningTime() > $longestMovie->getRunningTime()) {
                $longestMovie = $movie;
            }
        }
        return $longestMovie;
    }
}

function searchMovieTitlesByDirector($cinemas, $director) {
    $titles = [];

    foreach ($cinemas as $cinema) {
        foreach ($cinema->getMovies() as $movie) {
            if ($movie->getDirector() === $director) {
                if (!in_array($movie->getName(), $titles)) {
                    $titles[] = $movie->getName();
                }
            }
        }
    }

    return $titles;
}

$cinema1 = new Cinema("Cinepolis", "Barcelona", [
    new Movie("Inception", 148, "Christopher Nolan"),
    new Movie("The Matrix", 136, "Lana Wachowski, Lilly Wachowski"),
    new Movie("Interstellar", 169, "Christopher Nolan")
]);

$cinema2 = new Cinema("Moobie", "Barcelona", [
    new Movie("Hola2", 148, "Christopher Nolan"),
    new Movie("The Matrix", 136, "Lana Wachowski, Lilly Wachowski"),
    new Movie("Hola", 169, "Christopher Nolan")
]);

echo $cinema1->getMoviesStats()[0] . "\n";
echo $cinema1->getMoviesStats()[1] . "\n";
echo $cinema1->getMoviesStats()[2] . "\n";

echo implode(", ", searchMovieTitlesByDirector([$cinema1, $cinema2], "Christopher Nolan")) . "\n";
    
?>