<?php

namespace NeverCodeAlone\Controller\SkeletonController;

use Interop\Container\ContainerInterface;
use NeverCodeAlone\Controller\SkeletonController;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @author Max Bösing <max.boesing@check24.de>
 */
class Factory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator->getServiceLocator(), SkeletonController::class);
    }

    /**
     * @inheritdoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $builder = $container->get(AnnotationBuilder::class);

        return new SkeletonController($builder);
    }
}
