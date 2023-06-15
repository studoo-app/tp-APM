<?php

namespace Apps\Core\Controller;

use Twig\Environment;

interface ControllerInterface
{
    public function execute(Request $request);
}