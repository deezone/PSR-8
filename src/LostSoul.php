<?php
  /**
   *
   */

  namespace DeeZone\Hug;

  use Psr\Hug\Huggable;


  /**
   * Class LostSoul
   * @package DeeZone\Hug
   */
  class LostSoul implements Huggable
  {
    /** @var int */
    private $minHugsRequired;

    /**
     * @todo inject a HugTerminationStrategy
     */
    public function __construct($minHugsRequired = 1)
    {
      $this->minHugsRequired = $minHugsRequired;
    }

    /**
     * Hugs this object.
     *
     * All hugs are mutual. An object that is hugged must in turn hug the other object back by calling hug() on the
     * first parameter. The number of times hugs are exchanged is defined by the minHugsRequired property.
     *
     * @param Huggable $soul
     *   The object (soul) that is hugging this object.
     */
    public function hug(Huggable $soul)
    {
      $hugBacksExpected = $this->minHugsRequired;
      while ($hugBacksExpected--) {
        $soul->hug($this);
      }
    }
  }
