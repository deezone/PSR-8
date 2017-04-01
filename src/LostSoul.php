<?php
  /**
   * In our world there are many lost souls in various states of mind. With a few hugs their state or at least their
   * properties can be changed. Once a lost soul is hugged it will inspire them to hug back which ultmatly will make
   * the world a better place.
   */
declare(strict_types=1);

namespace DeeZone\Hug;

use Psr\Hug\Huggable;

/**
 * Class LostSoul
 * @package DeeZone\Hug
 */
class LostSoul implements Huggable
{

    const POSITIVE = 1;

    // Hug duration range
    // http://www.sciencemag.org/news/2011/01/hugs-follow-3-second-rule
    const DURATION_MIN = 1;
    const DURATION_MAX = 6;

    // @var int
    private $warmAndFuzzy;

    // @var int
    private $hugged;

    /**
     * At the beginning of every Lost Soul's existance they start with some general feeling. Funny how some of us are
     * happier than others even though we all start out the same.
     */
    public function __construct()
    {
        $this->warmAndFuzzy = random_int(0, 100);
        $this->hugged = 0;
    }

    /**
     * Hugs this object.
     *
     * All hugs are mutual. An object that is hugged will in turn hug the other object back by calling hug() on the
     * first parameter. The number of times hugs are exchanged is determined by the return of keepHugging().
     *
     * @param Huggable $soul
     *   The object (soul) that is hugging this object and will get a hug back in return.
     *
     * @return Huggable
     */
    public function hug(Huggable $soul): Huggable
    {
        // An Exception is thrown as self hugging suggests an error in implimentation. Not a show stopper but should
        // be addressed.
        if ($soul === $this) {
            throw new \Exception('WARNING: You should always love yourself but self hugging is not supported in the ' .
                'PSR-8 specification. An attept at an object hugging itself has been made.');
        }

        $durationOfHug = $this->determineDurationOfHug();
        while ($this->keepHugging($this, $soul, $durationOfHug)) {
            $hugImpact = $this->hugImpact($this, $soul, $durationOfHug);

            // The power of hugs, everyone is really feeling it
            $this->warmAndFuzzy += $hugImpact;
            $soul->warmAndFuzzy += $hugImpact;

            // That was great, lets do it again
            $this->hug($soul);

            $this->hugged++;
            $soul->hugged++;
        }

        // For better or worst the hugging has stopped. Time to let go.
        return $soul;
    }

    /**
     * Determine if another exchange of hugs is desired.
     *
     * @param Huggable $thisSoul
     * @param Huggable $otherSoul
     * @param int $durationOfHug
     *
     * @return bool
     */
    private function keepHugging(Huggable $thisSoul, Huggable $otherSoul, $durationOfHug): bool
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
        if ($durationOfHug > $hugComfortZone) {
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
    private function hugImpact(Huggable $thisSoul, Huggable $otherSoul, $durationOfHug): int
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

    /**
     * Determine the duration for the hug. Minimum to maximum second hugs, anything more and there's something
     * else going on.
     *
     * http://www.sciencemag.org/news/2011/01/hugs-follow-3-second-rule
     *
     * @return int
     */
    private function determineDurationOfHug()
    {
        $durationOfHug = random_int(self::DURATION_MIN, self::DURATION_MAX);

        return $durationOfHug;
    }

    /**
     * How much "Warm And Fuzzy" is the object feeling?
     *
     * @return int
     */
    public function getWarmAndFuzzy(): int
    {
        return $this->warmAndFuzzy;
    }

    /**
     * How many times has this soul been hugged?
     *
     * @return int
     */
    public function getTimesHugged(): int
    {
        return $this->hugged;
    }
}
