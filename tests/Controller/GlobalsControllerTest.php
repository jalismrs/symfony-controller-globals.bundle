<?php
declare(strict_types = 1);

namespace Tests\Controller;

use ArrayObject;
use Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\Controller\GlobalsController;
use Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService\GlobalsControllerService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GlobalsControllerTest
 *
 * @package Tests\Controller
 *
 * @covers  \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\Controller\GlobalsController
 */
final class GlobalsControllerTest extends
    TestCase
{
    /**
     * mockContainer
     *
     * @var \PHPUnit\Framework\MockObject\MockObject|\Psr\Container\ContainerInterface
     */
    private MockObject $mockContainer;
    /**
     * mockGlobalsControllerService
     *
     * @var \PHPUnit\Framework\MockObject\MockObject|\Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService\GlobalsControllerService
     */
    private MockObject $mockGlobalsControllerService;
    
    /**
     * testIndex
     *
     * @return void
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \PHPUnit\Framework\MockObject\RuntimeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException
     */
    public function testIndex() : void
    {
        // arrange
        $systemUnderTest = $this->createSUT();
        
        $request = new Request();
        
        // expect
        $this->mockGlobalsControllerService
            ->expects(self::once())
            ->method('index')
            ->willReturn(new ArrayObject());
        
        // act
        $output = $systemUnderTest->index($request);
        
        // assert
        self::assertSame(
            '{}',
            $output->getContent(),
        );
    }
    
    /**
     * createSUT
     *
     * @return \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\Controller\GlobalsController
     */
    private function createSUT() : GlobalsController
    {
        // arrange
        $globalsController = new GlobalsController(
            $this->mockGlobalsControllerService
        );
        
        // act
        $globalsController->setContainer($this->mockContainer);
        
        return $globalsController;
    }
    
    protected function setUp() : void
    {
        parent::setUp();
        
        $this->mockContainer                = $this->createMock(ContainerInterface::class);
        $this->mockGlobalsControllerService = $this->createMock(GlobalsControllerService::class);
    }
}
