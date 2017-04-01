<?php
/**
 *
 */

declare(strict_types=1);

namespace Psr\Hug;

use Psr\Hug\Huggable;

/**
 * Class Huggers
 * @package DeeZone\Hug
 */
abstract class Huggers implements Huggable
{

    const POSITIVE = 1;

    // Hug duration range
    // http://www.sciencemag.org/news/2011/01/hugs-follow-3-second-rule
    const DURATION_MIN = 1;
    const DURATION_MAX = 6;

    // @var int
    protected $warmAndFuzzy;

    // @var int
    protected $hugged;

    /**
     * At the beginning of every object existance they start with some general feeling. Funny how some are
     * happier than others even though the starting point is the same.
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
    abstract protected function keepHugging(Huggable $thisSoul, Huggable $otherSoul, int $durationOfHug): bool;

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
    abstract protected function hugImpact(Huggable $thisSoul, Huggable $otherSoul, $durationOfHug): int;

    /**
     * Determine the duration for the hug. Minimum to maximum second hugs, anything more and there's something
     * else going on.
     *
     * http://www.sciencemag.org/news/2011/01/hugs-follow-3-second-rule
     *
     * @return int
     */
    protected function determineDurationOfHug()
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