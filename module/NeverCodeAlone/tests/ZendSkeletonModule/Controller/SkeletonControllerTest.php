<?php

namespace NeverCodeAloneTest\Controller;

use Zend\Http\Request;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use NeverCodeAlone\Controller\SkeletonController;
use NeverCodeAlone\Module;

/**
 * @author Max Bösing <max.boesing@check24.de>
 */
class SkeletonControllerTest extends AbstractHttpControllerTestCase
{

    protected function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../../config/application.config.php'
        );

        parent::setUp();
    }

    public function testApplicationSettingUpCorrectModuleDependencies()
    {
        $this->dispatch('/nca', Request::METHOD_GET);
        $module = new Module();
        $this->assertModulesLoaded($module->getModuleDependencies());
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/nca', Request::METHOD_GET);
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('NeverCodeAlone');
        $this->assertControllerName(SkeletonController::class);
        $this->assertControllerClass('SkeletonController');
        $this->assertMatchedRouteName('never-code-alone');
    }
}
