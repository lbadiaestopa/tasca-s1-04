<?php

require_once 'Cinema.php';

$cinemas = [

    new Cinema("Cinepolis", "Barcelona", [
        new Movie("Inception", 148, "Christopher Nolan"),
        new Movie("The Matrix", 180, "Lana Wachowski, Lilly Wachowski"),
        new Movie("Interstellar", 169, "Christopher Nolan")
    ]),
    new Cinema("Yelmo Cines", "Madrid", [
        new Movie("The Dark Knight", 152, "Christopher Nolan"),
        new Movie("Pulp Fiction", 154, "Quentin Tarantino"),
        new Movie("The Grand Budapest Hotel", 99, "Wes Anderson")
    ]),
    new Cinema("Cinesa", "Valencia", [
        new Movie("The Lord of the Rings: The Fellowship of the Ring", 178, "Peter Jackson"),
        new Movie("The Lord of the Rings: The Two Towers", 179, "Peter Jackson"),
        new Movie("The Lord of the Rings: The Return of the King", 201, "Peter Jackson")
    ])
];