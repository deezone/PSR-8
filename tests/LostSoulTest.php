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
    $mock = $this->prophesize(Huggable::class);
    $mock->hug($lostSoul)->shouldBeCalled();
    $lostSoul->hug($mock->reveal());
  }

}
