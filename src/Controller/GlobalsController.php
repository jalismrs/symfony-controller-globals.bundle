<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\Controller;

use ArrayObject;
use Jalismrs\Symfony\Bundle\JalismrsApiMiddlewareBundle\IsApiControllerInterface;
use Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\GlobalsService;
use Jalismrs\Symfony\Common\ControllerAbstract;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GlobalsController
 *
 * @package Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\Controller
 */
class GlobalsController extends
    ControllerAbstract implements
    IsApiControllerInterface
{
    /**
     * globalsService
     *
     * @var \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\GlobalsService
     */
    private GlobalsService $globalsService;
    
    /**
     * GlobalsController constructor.
     *
     * @param \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\GlobalsService $globalsService
     */
    public function __construct(
        GlobalsService $globalsService
    ) {
        $this->globalsService = $globalsService;
    }
    
    /**
     * index
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException
     */
    public function index(
        Request $request
    ) : JsonResponse {
        $parameters = $this->globalsService->get();
        $data       = new ArrayObject(
            $parameters
        );
        
        return $this->returnJson(
            $request,
            $data,
        );
    }
}
