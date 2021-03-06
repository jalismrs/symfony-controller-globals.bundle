<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService;

use ArrayObject;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use function array_unique;
use function array_values;

/**
 * Class GlobalsControllerService
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService
 */
class GlobalsControllerService
{
    /**
     * parameterBag
     *
     * @var \Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface
     */
    private ParameterBagInterface $parameterBag;
    /**
     * parameters
     *
     * @var array
     */
    private array $parameters;
    
    /**
     * GlobalsService constructor.
     *
     * @param \Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface $parameterBag
     * @param array                                                                     $parameters
     */
    public function __construct(
        ParameterBagInterface $parameterBag,
        array $parameters
    ) {
        $parameters = array_unique($parameters);
        $parameters = array_values($parameters);
        
        $this->parameterBag = $parameterBag;
        $this->parameters   = $parameters;
    }
    
    /**
     * index
     *
     * @return \ArrayObject
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException
     */
    public function index() : ArrayObject
    {
        $parameters = [];
        
        foreach ($this->parameters as $parameter) {
            $parameters[$parameter] = $this->parameterBag->get($parameter);
        }
        
        return new ArrayObject(
            $parameters
        );
    }
}
