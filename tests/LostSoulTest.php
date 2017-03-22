<?php
/**
 *
 */
declare(strict_types=1);

namespace DeeZone\Hug;

use Psr\Hug\Huggable;
use PHPUnit\Framework\TestCase;

/**
 * Class HuggerTest
 *
 * @package DeeZone\Hug
 */
final class LostSoulTest extends TestCase
{

  /**
   *
   */
  public function testReciprocatesHugs()
  {
    $lostSoul = new LostSoul();

    // PHPUnit 4.5 and Prophecy
    // https://thephp.cc/news/2015/02/phpunit-4-5-and-prophecy
    $mock = $this->prophesize(Huggable::class);

    // Confirm the two LostSoul objects exchange hugs
    $mock->hug($lostSoul)->shouldBeCalled();

    // reveal the prophecy and create an actual test double object
    $lostSoul->hug($mock->reveal());

  }

}
