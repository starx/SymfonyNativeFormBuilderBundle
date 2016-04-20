<?php

namespace Starx\SymfonyNativeFormBuilderBundle\Twig;

use Starx\SymfonyNativeFormBuilderBundle\Services\NativeFormBuilderService;

class NativeFormBuilderExtension extends \Twig_Extension
{
    private $nativeFormBuilderService;

    public function __construct(NativeFormBuilderService $service)
    {
        $this->nativeFormBuilderService = $service;
    }

    public function getGlobals() {
        return array(
            'native_form_builder' => $this->nativeFormBuilderService
        );
    }

    public function getName()
    {
        return "native_form_builder_extension";
    }
}