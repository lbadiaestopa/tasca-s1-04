<?php

class PokerDice {

private array $face = ["As", "K", "Q", "J", "7", "8"];
private ?string $lastFace;
private static int $totalRolls = 0;

    public function rollDice() {
        $randomFace = array_rand($this->face);
        $this->lastFace = $this->face[$randomFace];
        self::$totalRolls++;
    }

    public function getLastFace() {
        return $this->lastFace;
    }

    public static function getTotalRolls() {
        return self::$totalRolls;
    }

}

$fiveDice = [
    new PokerDice(),
    new PokerDice(),
    new PokerDice(),
    new PokerDice(),
    new PokerDice()
];

foreach ($fiveDice as $dice) {
    $dice->rollDice();
}
    
?>