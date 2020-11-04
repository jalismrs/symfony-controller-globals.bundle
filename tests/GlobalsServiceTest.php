<?php
declare(strict_types = 1);

namespace Tests;

use Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\GlobalsService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

/**
 * Class GlobalsTest
 *
 * @package Tests
 *
 * @covers  \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\GlobalsService
 */
final class GlobalsServiceTest extends
    TestCase
{
    /**
     * testGet
     *
     * @return void
     *
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException
     */
    public function testGet() : void
    {
        // arrange
        $systemUnderTest = $this->createSUT();
        
        // act
        $output = $systemUnderTest->get();
        
        // assert
        self::assertCount(
            1,
            $output,
        );
        self::assertArrayHasKey(
            'app.name',
            $output,
        );
        self::assertSame(
            'appName',
            $output['app.name'],
        );
    }
    
    /**
     * createSUT
     *
     * @return \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\GlobalsService
     */
    private function createSUT() : GlobalsService
    {
        $testParameterBag = new ParameterBag(
            [
                'app.name'    => 'appName',
                'app.version' => 'appVersion',
            ]
        );
        
        return new GlobalsService(
            $testParameterBag,
            [
                'app.name',
            ]
        );
    }
}
