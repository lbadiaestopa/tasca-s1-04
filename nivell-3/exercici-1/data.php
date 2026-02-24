<?php

require_once 'Cinema.php';

$cinemas = [

    new Cinema("Cinepolis", "Barcelona", [
        new Movie("Inception", 148, "Christopher Nolan"),
        new Movie("The Matrix", 136, "Lana Wachowski, Lilly Wachowski"),
        new Movie("Interstellar", 169, "Christopher Nolan")
    ]),

];