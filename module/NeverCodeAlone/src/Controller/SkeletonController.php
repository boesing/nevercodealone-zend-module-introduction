<?php

namespace NeverCodeAlone\Controller;

use NeverCodeAlone\Form\Contact;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SkeletonController extends AbstractActionController
{

    /**
     * @var AnnotationBuilder
     */
    private $builder;

    /**
     * @param AnnotationBuilder $builder
     */
    public function __construct(AnnotationBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $form = $this->builder->createForm(Contact::class);
        $form->prepare();

        return new ViewModel([
            'form' => $form,
        ]);
    }

    /**
     * @return ViewModel
     */
    public function submitAction()
    {
        $form = $this->builder->createForm(Contact::class);
        $form->prepare();
        $form->setData($this->params()->fromPost());

        $model = new ViewModel([
            'form' => $form,
        ]);

        if (!$form->isValid()) {
            $messages = $form->getMessages();
            var_dump($messages);
            die;
        }

        // TODO: send mail to admin and notify him about new contact request

        $model->setTemplate('never-code-alone/skeleton/success');
        return $model;
    }
}
