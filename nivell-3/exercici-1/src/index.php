<?php
require_once 'data.php';

$director = $_GET['director'] ?? '';
$results = [];

if ($director !== '') {

    foreach ($cinemas as $cinema) {
        foreach ($cinema->getMovies() as $movie) {

            if (stripos($movie->getDirector(), $director) !== false) {
                $results[] = $movie;
            }
        }
    }
}

$cinema = $_GET['filter'] ?? '';
if ($cinema === '' && !empty($cinemas)) {
    $cinema = $cinemas[0]->getName();
}
$filteredMovies = [];
$longestMovie = null;

if ($cinema !== '') {
    foreach ($cinemas as $c) {
        if ($c->getName() === $cinema) {
            $filteredMovies = $c->getMovies();
            $longestMovie = $c->getLongestMovie();
            break;
        }
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

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartellera</title>
    <meta name="description" content="Catàleg de cinemes i pel·lícules">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Barlow+Condensed:wght@400;500;600;700;800&family=Barlow:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="logo">
                <a href="index.php">CARTELLERA</a>
            </div>

            <div class="info">
                <time datetime="2026">Barcelona, 2026</time> 
            </div>
        </div>
    </header>

    <main class="catalog">
        <div class="container">
            <form class="filter-form" action="index.php" method="get">
            <select id="filter" name="filter" onchange="this.form.submit()">
                <?php foreach ($cinemas as $c): ?>
                <option value="<?= $c->getName() ?>" 
                <?= ($c->getName() === $cinema) ? 'selected' : '' ?>>
                <?= $c->getName() ?>
            </option>
        <?php endforeach; ?>
            </select>

        <section class="movie-list" aria-labelledby="movie-list-heading">
            <h2 id="movie-list-heading" class="visually-hidden">Llista de pel·lícules del catàleg</h2>
            
                <?php foreach ($filteredMovies as $movie): ?>
            <article class="movie-card">
            <div class="movie-info">
                    <span class="movie-title"><?= $movie->getName()?></span>
                    <span class="movie-director"><?= $movie->getDirector()?></span>
                </div>
                <span class="movie-duration">
                    <?php if ($movie === $longestMovie) {
                        echo '<span class="longest">★ Pel·lícula més llarga - </span>';
                    } ?>
                    <?= $movie->getRunningTime()?> min
                </span>
            </article>
                <?php endforeach; ?>
        </section>

            <hr> 

            <section class="search-director" aria-labelledby="director-search-heading"> 
                <header class="section-header">
                    <h2 id="director-search-heading">Cerca per director</h2> 
                </header>

                <p class="search-hint"> 
                    Introdueix el nom d'un director per veure les seves pel·lícules al catàleg.
                </p>

                <form class="search-form" action="index.php" method="get"> 
                    <label for="director" class="visually-hidden">Nom del director</label> 
                    <input type="text" id="director" name="director" placeholder="P. ex. Christopher Nolan">
                    <button type="submit">CERCAR</button>
                </form>
                <?php if (empty($results)): ?>
                        <p>No s'han trobat pel·lícules.</p>
                    <?php else: ?>
                        <ul>
                            <?php foreach ($results as $movie): ?>
                                <li>
                                    <?= $movie->getName() ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
            </section>
        </div>
    </main>

    <footer class="site-footer"> 
        <div class="container">
            <p>&copy; 2026 Cartellera. Tots els drets reservats.</p>
        </div>
    </footer>
</body>
</html>