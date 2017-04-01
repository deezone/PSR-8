<?php
/**
 *
 */
declare(strict_types=1);

namespace Psr\Hug;

use Psr\Hug\Huggable;
use Psr\Hug\Huggers;
use PHPUnit\Framework\TestCase;

/**
 * Class HuggerTest
 *
 * @package DeeZone\Hug
 */
final class LostSoulTest extends TestCase
{
    /*
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
    */

    /**
     * @expectedException \Exception
     */
    public function testDoesNotHugSelf()
    {
        $lostSoul = new LostSoul();
        $lostSoul->hug($lostSoul);
    }

    /**
     * Making it to the assertion ensures an infinite loop was not encountered and the hugging terminates
     */
    public function testTerminatesHugging()
    {
        $lostSoul1 = new LostSoul();
        $lostSoul2 = new LostSoul();
        $lostSoul1->hug($lostSoul2);

        $this->assertTrue(true);
    }

    /**
     * Making it to the assertion ensures an infinite loop was not encountered and the hugging terminates when a
     * specific amount of $loveNeeded is defined.
     */
    public function testTerminatesDefinedHugging()
    {
        $lostSoul1 = new LostSoul(2);
        $lostSoul2 = new LostSoul(4);
        $lostSoul1->hug($lostSoul2);

        $this->assertTrue(true);
    }
}
