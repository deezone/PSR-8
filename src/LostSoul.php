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
    // @var int
    private $loveNeeded;

    // @var int
    private $loveFelt;

    /**
     * @param int $loveNeeded
     */
    public function __construct(int $loveNeeded = 1)
    {
        $this->loveNeeded = $loveNeeded;
        $this->loveFelt = 0;
    }

    /**
     * Hugs this object.
     *
     * All hugs are mutual. An object that is hugged will in turn hug the other object back by calling hug() on the
     * first parameter. The number of times hugs are exchanged is defined by the minHugsRequested property.
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

        while ($this->loveFelt < $this->loveNeeded) {
            // The power of hugs, this LostSoul is feeling it
            $this->loveFelt++;

            // Give some love back
            $soul->hug($this);
        }

        // The desired level of love from mutual hugs has been achieved, time to let go.
        return $soul;
    }

    /**
     * How much "love felt" is the object feeling?
     *
     * @return int
     */
    public function getLoveFelt(): int
    {
      return $this->loveFelt;
    }
}
