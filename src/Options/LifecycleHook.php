<?php

namespace Webflorist\VueFactory\Options;

/**
 * This class represents a lifecycle hook of Vue.
 * (see https://vuejs.org/v2/api/#Options-Lifecycle-Hooks)
 *
 * Class LifecycleHook
 * @package Webflorist\VueFactory
 */
class LifecycleHook
{
    protected $code = null;

    public function addCode(string $jsCode)
    {
        $this->code .= $jsCode . "\n";
    }

    public function generate()
    {
        return "function () {\n $this->code \n}";
    }

}
