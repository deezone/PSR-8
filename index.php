<?php
/**
 * A starting point for a demonstration of an implimentation of the PSR-8 specification. Three lost souls are brought
 * together to share hugs.
 */

// Load up the Composer autoload magic
require_once __DIR__ . '/vendor/autoload.php';

use Psr\Hug\LostSoul;

// https://www.mindbodygreen.com/0-5756/10-Reasons-Why-We-Need-at-Least-8-Hugs-a-Day.html
// Virginia Satir, a respected family therapist, “We need four hugs a day for survival. We need eight hugs a day for
// maintenance. We need twelve hugs a day for growth.”
$totalHugs = random_int(4, 12);

// Imagine all the people... - JOHN LENNON
$lostSouls = generateSouls();

// Each lost soul gives out some "warm and fuzzies" in the hopes of getting some back
// PSR-8 spec #1 : "expresses affection and support"
for ($hugRound = 1; $hugRound < $totalHugs; $hugRound++) {

    try {
        echo 'Hug Round: ' . $hugRound, PHP_EOL;
        $lostSoul = selectSoul($lostSouls);
        $otherLostSoul = selectSoul($lostSouls);

        echo PHP_EOL, 'Time to try for some hugs...', PHP_EOL;
        $lostSoul->hug($otherLostSoul);

        // After hug
        echo 'Lost Soul: ' . spl_object_hash($lostSoul) . ' is feeling WarmAndFuzzy: ' . $lostSoul->getWarmAndFuzzy() .
            ' after ' . $lostSoul->getTimesHugged() . ' hugs.', PHP_EOL;
        echo 'Other Lost Soul: ' . spl_object_hash($otherLostSoul) . ' is feeling WarmAndFuzzy: ' .
            $otherLostSoul->getWarmAndFuzzy() . ' after ' . $otherLostSoul->getTimesHugged() . ' hugs.', PHP_EOL, PHP_EOL;
        echo '--------------', PHP_EOL;
        echo PHP_EOL, PHP_EOL;

    } catch (Throwable $t) {

        echo PHP_EOL, '********', PHP_EOL;
        echo $t->getMessage(), PHP_EOL;
        echo '********', PHP_EOL;

    }

}

/**
 * Choose which object will be used from the list of lostSoul objects available.
 *
 * @param $lostSouls array
 * @return object
 */
function selectSoul($lostSouls) {
    $lostSoulIndex = array_rand($lostSouls, 1);
    echo 'lostSoulIndex: ', $lostSoulIndex, PHP_EOL;
    $lostSoul = $lostSouls[$lostSoulIndex];

    echo '- Lost Soul: ', spl_object_hash($lostSoul), ' is feeling WarmAndFuzzy: ', $lostSoul->getWarmAndFuzzy(), ' after ', $lostSoul->getTimesHugged(), ' hugs.', PHP_EOL;

    return $lostSoul;
}

/**
 * Generate lost souls.
 *
 * @param $totalSouls int
 * @return object
 */
function generateSouls($totalSouls = 0) {
    $lostSouls = [];

    if ($totalSouls == 0) {
        $totalSouls = random_int(0, 10);
    }

    for ($i = 0; $i <= $totalSouls; $i++;) {
        $lostSouls[] = new LostSoul();
    }

    return $lostSouls;
}
