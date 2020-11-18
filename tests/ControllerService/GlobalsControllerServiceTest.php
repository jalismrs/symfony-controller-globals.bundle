<?php
declare(strict_types = 1);

namespace Tests\ControllerService;

use Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService\GlobalsControllerService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

/**
 * Class GlobalsControllerServiceTest
 *
 * @package Tests\ControllerService
 *
 * @covers  \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService\GlobalsControllerService
 */
final class GlobalsControllerServiceTest extends
    TestCase
{
    /**
     * testIndex
     *
     * @return void
     *
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException
     */
    public function testIndex() : void
    {
        // arrange
        $systemUnderTest = $this->createSUT();
        
        // act
        $output = $systemUnderTest
            ->index()
            ->getArrayCopy();
        
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
     * @return \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService\GlobalsControllerService
     */
    private function createSUT() : GlobalsControllerService
    {
        $testParameterBag = new ParameterBag(
            [
                'app.name'    => 'appName',
                'app.version' => 'appVersion',
            ]
        );
        
        return new GlobalsControllerService(
            $testParameterBag,
            [
                'name1' => 'app.name',
                'name2' => 'app.name',
            ]
        );
    }
}
