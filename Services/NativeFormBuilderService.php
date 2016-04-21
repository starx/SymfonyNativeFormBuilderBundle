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

    // Native Form
    public function getNativeBuilder($type = FormType::class, $data = null, array $options = array()) {
        return $this->formFactory->createBuilder($type, $data, $options);
    }


    public function getNativeForm($action_path, $method = "GET", $type = FormType::class, $data = null, $options = array()) {
        $builder = $this->getNativeBuilder($type, $data, $options);
        $form = $builder
            ->setAction($action_path)
            ->setMethod($method)
            ->getForm();
        return $form;
    }

    public function getNativeFormView($action_path, $method = "GET", $type = FormType::class, $data = null, $options = array()) {
        $form = $this->getNativeForm($action_path, $method, $type, $data, $options);
        return $form->createView();
    }

}