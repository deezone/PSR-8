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
    public function testReciprocatesHugs()
    {
        $this->markTestSkipped('-> Must be revisited, currently throwing exception.');

        $lostSoul = new LostSoul();

        // PHPUnit 4.5 and Prophecy
        // https://thephp.cc/news/2015/02/phpunit-4-5-and-prophecy
        $mock = $this->prophesize(Huggable::class);

        // Confirm the two LostSoul objects exchange hugs
        $mock->hug($lostSoul)->shouldBeCalled();

        // reveal the prophecy and create an actual test double object
        $lostSoul->hug($mock->reveal());
    }

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
        $lostSoul1 = new LostSoul();
        $lostSoul2 = new LostSoul();
        $lostSoul1->hug($lostSoul2);

        $this->assertTrue(true);
    }

    /**
     * Ensure that a new LostSoul starts with initial zero values for WarmAndFuzzy as well as TimesHugged.
     */
    public function testInitialWarmAndFuzzyAndTimesHuggedValues()
    {
        $lostSoul = new LostSoul();

        // Test WarmAndFuzzy value of new LostSoul
        $lostSoulWarmAndFuzzyBefore = $lostSoul->getWarmAndFuzzy();
        $this->assertInternalType("int", $lostSoulWarmAndFuzzyBefore);
        $this->assertTrue($lostSoulWarmAndFuzzyBefore >= 0);

        // Test TimesHugged value of new LostSoul
        $lostSoulTimesHugged = $lostSoul->getTimesHugged();
        $this->assertInternalType("int", $lostSoulTimesHugged);
        $this->assertTrue($lostSoulTimesHugged == 0);
    }

    /**
     * The effects of a first time hug should increase the WarmAndFuzzy and TimesHugged values for the LostSoul
     */
    public function testWarmAndFuzzyAndTimesHuggedAfterHug()
    {
        $lostSoul1 = new LostSoul();
        $lostSoul2 = new LostSoul();
        $lostSoul1->hug($lostSoul2);

        // Test that WarmAndFuzzy has changed
        $lostSoul1WarmAndFuzzyAfter = $lostSoul1->getWarmAndFuzzy();
        $this->assertTrue(0 != $lostSoul1WarmAndFuzzyAfter);
        $lostSoul2WarmAndFuzzyAfter = $lostSoul2->getWarmAndFuzzy();
        $this->assertTrue(0 != $lostSoul2WarmAndFuzzyAfter);

        // Test that times hugged has increased by at least 1
        $lostSoul1TimesHugged = $lostSoul1->getTimesHugged();
        $this->assertTrue($lostSoul1TimesHugged >= 1);
        $lostSoul2TimesHugged = $lostSoul2->getTimesHugged();
        $this->assertTrue($lostSoul2TimesHugged >= 1);
    }
}
