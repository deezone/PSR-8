<?php
/**
 * An interface for Huggable objects based on the PSR-8 specification:
 * https://github.com/php-fig/fig-standards/blob/master/proposed/psr-8-hug/psr-8-hug.md
 */
namespace Psr\Hug;

/**
 * Defines a huggable object.
 *
 * A huggable object expresses mutual affection with another huggable object.
 */
interface Huggable
{

  /**
   * Hugs this object.
   *
   * All hugs are mutual. An object that is hugged MUST in turn hug the other
   * object back by calling hug() on the first parameter. All objects MUST
   * implement a mechanism to prevent an infinite loop of hugging.
   *
   * @param Huggable $h
   *   The object that is hugging this object.
   */
    public function hug(Huggable $h);

  /**
   * Current love felt by this object.
   *
   * Respond with the current amount of love that the huggable object is feeling.
   */
    public function getWarmAndFuzzy();
}
