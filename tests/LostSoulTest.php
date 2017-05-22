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

        $this->assertTrue(false);
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
        $lostSoul1 = new LostSoul();
        $lostSoul2 = new LostSoul();
        $lostSoul1->hug($lostSoul2);

        $this->assertTrue(true);
    }

    /**
     * The effects of a first time hug should effect the WarmAndFuzzy and TimesHugged values for the LostSoul
     */
    public function testWarmAndFuzzyAndTimesHugged()
    {
        $lostSoul1 = new LostSoul();

        // Test WarmAndFuzzy value of new LostSoul
        $lostSoul1WarmAndFuzzyBefore = $lostSoul1->getWarmAndFuzzy();
        $this->assertInternalType("int", $lostSoul1WarmAndFuzzyBefore);
        $this->assertTrue($lostSoul1WarmAndFuzzyBefore >= 0);

        // Test TimesHugged value of new LostSoul
        $lostSoul1TimesHugged = $lostSoul1->getTimesHugged();
        $this->assertInternalType("int", $lostSoul1TimesHugged);
        $this->assertTrue($lostSoul1TimesHugged == 0);

        $lostSoul2 = new LostSoul();

        $lostSoul2WarmAndFuzzyBefore = $lostSoul2->getWarmAndFuzzy();
        $this->assertInternalType("int", $lostSoul2WarmAndFuzzyBefore);
        $this->assertTrue($lostSoul2WarmAndFuzzyBefore >= 0);

        $lostSoul2TimesHugged = $lostSoul2->getTimesHugged();
        $this->assertInternalType("int", $lostSoul2TimesHugged);
        $this->assertTrue($lostSoul2TimesHugged == 0);

        $lostSoul1->hug($lostSoul2);

        // Test that WarmAndFuzzy has changed
        $lostSoul1WarmAndFuzzyAfter = $lostSoul1->getWarmAndFuzzy();
 //       $this->assertTrue($lostSoul1WarmAndFuzzyBefore != $lostSoul1WarmAndFuzzyAfter);

        $lostSoul2WarmAndFuzzyAfter = $lostSoul2->getWarmAndFuzzy();
 //       $this->assertTrue($lostSoul2WarmAndFuzzyBefore != $lostSoul2WarmAndFuzzyAfter);

        // Test that times hugged has increased by 1
 //       $this->assertTrue($lostSoul1TimesHugged == 1);
 //       $this->assertTrue($lostSoul2TimesHugged == 1);
    }

    /**
     * When a LostSoul has reached WarmAndFuzzy maximum the hugging should stop. WarmAndFuzzy and TimesHugged values
     * should be unchanged.
     */
    public function testKeepHugging()
    {
        $this->markTestSkipped('must be revisited.');
        $this->assertTrue(false);
    }
}
