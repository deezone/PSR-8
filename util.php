<?php
/**
 * A collection of function to help index.php perform it's demonstration.
 */

use Psr\Hug\LostSoul;

/**
 * Choose which object will be used from the list of lostSoul objects available.
 *
 * @param $lostSouls array
 * @return object
 */
function selectSoul($lostSouls)
{
    $lostSoulIndex = array_rand($lostSouls, 1);
    echo 'lostSoulIndex: ', $lostSoulIndex, PHP_EOL;
    $lostSoul = $lostSouls[$lostSoulIndex];

    echo '- Lost Soul: ', spl_object_hash($lostSoul), ' is feeling WarmAndFuzzy: ', $lostSoul->getWarmAndFuzzy(),
    ' after ', $lostSoul->getTimesHugged(), ' hugs.', PHP_EOL;

    return $lostSoul;
}

/**
 * Generate lost souls.
 *
 * @param $totalSouls int
 * @return object
 */
function generateSouls($totalSouls = 0)
{
    $lostSouls = [];

    if ($totalSouls == 0) {
        $totalSouls = random_int(0, 10);
    }

    for ($i = 0; $i <= $totalSouls; $i++) {
        $lostSouls[] = new LostSoul();
    }

    return $lostSouls;
}