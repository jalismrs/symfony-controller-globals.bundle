<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\Controller;

use Jalismrs\Symfony\Bundle\JalismrsApiMiddlewareBundle\IsApiControllerInterface;
use Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService\GlobalsControllerService;
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
     * controllerService
     *
     * @var \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService\GlobalsControllerService
     */
    private GlobalsControllerService $controllerService;
    
    /**
     * GlobalsController constructor.
     *
     * @param \Jalismrs\Symfony\Bundle\JalismrsGlobalsBundle\ControllerService\GlobalsControllerService $controllerService
     *
     * @codeCoverageIgnore
     */
    public function __construct(
        GlobalsControllerService $controllerService
    ) {
        $this->controllerService = $controllerService;
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
        $data = $this->controllerService->index();
        
        return $this->returnJson(
            $request,
            $data,
        );
    }
}
