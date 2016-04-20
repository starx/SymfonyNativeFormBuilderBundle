<?php
namespace Starx\SymfonyNativeFormBuilderBundle\Services;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormFactory;

class NativeFormBuilderService
{

    private $formFactory;

    public function __construct(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function getNativeBuilder($data = null, array $options = array()) {
        return $this->formFactory->createBuilder(FormType::class, $data, $options);
    }


    public function getNativeForm($action_path, $method = "GET", $data = null, $options = array()) {
        $builder = $this->getNativeBuilder($data, $options);
        $form = $builder
            ->setAction($action_path)
            ->setMethod($method)
            ->getForm();
        return $form;
    }

    public function getNativeFormView($action_path, $method = "GET", $data = null, $options = array()) {
        $form = $this->getNativeForm($action_path, $method, $data, $options);
        return $form->createView();
    }

}