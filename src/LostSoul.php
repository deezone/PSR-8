<?php
  /**
   * There are many lost souls in various states of mind. With a few hugs their state or at least their
   * properties can be changed. Once a lost soul is hugged it will inspire them to hug back which ultmatly
   * will make the world a better place. Or so it is believed:
   * http://health.usnews.com/health-news/health-wellness/articles/2016-02-03/the-health-benefits-of-hugging
   */
declare(strict_types=1);

namespace Psr\Hug;

use Psr\Hug\Huggers;

/**
 * Class LostSoul
 * @package DeeZone\Hug
 */
class LostSoul extends Huggers
{
    /**
     * Determine if another exchange of hugs is desired.
     *
     * @param Huggable $thisSoul
     * @param Huggable $otherSoul
     * @param int $durationOfHug
     *
     * @return bool
     */
    protected function keepHugging(Huggable $thisSoul, Huggable $otherSoul, int $durationOfHug): bool
    {
        // Always start from a positive perspective.
        $keepHugging = true;

        // Really?!? Absolute bliss? Who has time for another hug?
        if ($thisSoul->warmAndFuzzy >= 100) {
            $keepHugging = false;
        }
        if ($otherSoul->warmAndFuzzy >= 100) {
            $keepHugging = false;
        }

        // There's always a chance that things might get weird. Once the duration of the hug exceeds the comfort zone
        // @todo: move hugComfort calculation to own method
        $hugComfortZone = random_int(self::DURATION_MIN, self::DURATION_MAX);
        if ($durationOfHug >= $hugComfortZone) {
            $keepHugging = false;
        }

        // If the other soul is not feeling warmAndFuzzys at all then at least give them one hug.
        if ($otherSoul->warmAndFuzzy <= 0) {
            $keepHugging = true;
        }

        return $keepHugging;
    }

    /**
     * Determine the impact / value of a hug. Not all hugs are created equal.
     * https://insightsofshaley.wordpress.com/2013/06/29/not-all-hugs-are-created-equal/
     *
     * @param Huggable $thisSoul
     * @param Huggable $otherSoul
     * @param int $durationOfHug
     *
     * @return int
     */
    protected function hugImpact(Huggable $thisSoul, Huggable $otherSoul, $durationOfHug): int
    {
        $hugImpact = 0;

        // The more positive this soul feels the greater the minimum impact of their hug.
        $hugImpactMin = intval(ceil($thisSoul->warmAndFuzzy / 10));

        // The less positive the other soul feels the greater the maximum impact a hug will make.
        // But even for the worst cases, a hug can always do a little good.
        if ($otherSoul->warmAndFuzzy == 0) {
            $hugImpactMax = 1;
        } else {
            $hugImpactMax = intval(ceil($otherSoul->warmAndFuzzy / 10));
        }

        // Depending who is feeling more positive, a hug's effect can be positive or negative or even nothing at all.
        $giveOrTake = $otherSoul->warmAndFuzzy <=> $thisSoul->warmAndFuzzy;

        if ($giveOrTake == self::POSITIVE) {
            // Apply the randomness of life to determine the impact of the hug
            $hugImpact = intval(random_int($hugImpactMin, $hugImpactMax) * $durationOfHug);
        } else {
            // The "icky" factor. Sometimes hugs are just weird and unwanted.
            $hugImpact = $durationOfHug + $giveOrTake;
        }

        return $hugImpact;
    }
}
