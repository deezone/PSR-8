<?php
/**
 * A starting point for a demonstration of an implimentation of the PSR-8 specification. Three lost souls are brought
 * together to share hugs.
 */

// Load up the Composer autoload magic
require_once __DIR__ . '/vendor/autoload.php';

use DeeZone\Hug\LostSoul;

// Imagine all the people... - JOHN LENNON
// @todo: Impliment random number of returned hugs requested as parameter to instantion of LostSoul class.
$lostSouls[] = new LostSoul();
$lostSouls[] = new LostSoul();
$lostSouls[] = new LostSoul();
$lostSouls[] = new LostSoul();
$lostSouls[] = new LostSoul();
$lostSouls[] = new LostSoul();
$lostSouls[] = new LostSoul();

// Each lost soul gives out some "warm and fuzzies" in the hopes of getting some back
// PSR-8 spec #1 : "expresses affection and support"
for ($hugRound = 1; $hugRound < 7; $hugRound++) {

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
 */
function selectSoul($lostSouls) {
    $lostSoulIndex = array_rand($lostSouls, 1);
    echo 'lostSoulIndex: ', $lostSoulIndex, PHP_EOL;
    $lostSoul = $lostSouls[$lostSoulIndex];

    echo '- Lost Soul: ', spl_object_hash($lostSoul), ' is feeling WarmAndFuzzy: ', $lostSoul->getWarmAndFuzzy(), ' after ', $lostSoul->getTimesHugged(), ' hugs.', PHP_EOL;

    return $lostSoul;
}
