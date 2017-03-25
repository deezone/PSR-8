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

// Each lost soul gives out some love in the hopes of getting some back
// PSR-8 spec #1 : "expresses affection and support"
foreach ($lostSouls as $lostSoulCount => $lostSoul) {
    foreach ($lostSouls as $otherLostSoulCount => $otherLostSoul) {
        // Not a bad idea but the spec says you can't hug yourself
        if ($lostSoulCount != $otherLostSoulCount) {
            try {
                echo 'Lost Soul: ', $lostSoulCount, PHP_EOL;
                echo 'Other Lost Soul: ', $otherLostSoulCount, PHP_EOL;
                $lostSoul->hug($otherLostSoul);
                echo PHP_EOL, PHP_EOL;
            } catch (Throwable $t) {
                echo $t->getMessage(), PHP_EOL;
            }
        }
    }
}
