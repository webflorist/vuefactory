<?php

namespace Webflorist\VueFactory;

use Webflorist\VueFactory\Options\Computed;
use Webflorist\VueFactory\Options\Data;
use Webflorist\VueFactory\Options\LifecycleHook;
use Webflorist\VueFactory\Options\Methods;
use Webflorist\VueFactory\Options\PropsData;
use Webflorist\VueFactory\Options\Watch;

/**
 * This class represents the options object of Vue.
 * (see https://vuejs.org/v2/api/#vm-options)
 *
 * Class Options
 * @package Webflorist\VueFactory
 *
 * DOM-Options:
 * ------------
 * @property string         $el         CSS selector string of the DOM element (see https://vuejs.org/v2/api/#el)
 *
 * Data-Options:
 * --------------
 * @property Data           $data       Data object for the Vue instance. (see https://vuejs.org/v2/api/#data)
 * @property PropsData      $propsData  Pass props to an instance during its creation. (see https://vuejs.org/v2/api/#propsData)
 * @property Computed       $computed   Computed properties to be mixed into the Vue instance. (see https://vuejs.org/v2/api/#computed)
 * @property Methods        $methods    Methods to be mixed into the Vue instance. (see https://vuejs.org/v2/api/#methods)
 * @property Watch          $watch      Object where keys are expressions to watch and values are the corresponding callbacks. (see https://vuejs.org/v2/api/#watch)
 *
 * Lifecycle-Hook-Options:
 * --------------
 * @property LifecycleHook  $beforeCreate   Lifecycle Hook "beforeCreate". (see https://vuejs.org/v2/api/#beforeCreate)
 * @property LifecycleHook  $created        Lifecycle Hook "created". (see https://vuejs.org/v2/api/#created)
 * @property LifecycleHook  $beforeMount    Lifecycle Hook "beforeMount". (see https://vuejs.org/v2/api/#beforeMount)
 * @property LifecycleHook  $mounted        Lifecycle Hook "mounted". (see https://vuejs.org/v2/api/#mounted)
 * @property LifecycleHook  $beforeUpdate   Lifecycle Hook "beforeUpdate". (see https://vuejs.org/v2/api/#beforeUpdate)
 * @property LifecycleHook  $updated        Lifecycle Hook "updated". (see https://vuejs.org/v2/api/#updated)
 * @property LifecycleHook  $activated      Lifecycle Hook "activated". (see https://vuejs.org/v2/api/#activated)
 * @property LifecycleHook  $deactivated    Lifecycle Hook "deactivated". (see https://vuejs.org/v2/api/#deactivated)
 * @property LifecycleHook  $beforeDestroy  Lifecycle Hook "beforeDestroy". (see https://vuejs.org/v2/api/#beforeDestroy)
 * @property LifecycleHook  $destroyed      Lifecycle Hook "destroyed". (see https://vuejs.org/v2/api/#destroyed)
 * @property LifecycleHook  $errorCaptured  Lifecycle Hook "errorCaptured". (see https://vuejs.org/v2/api/#errorCaptured)
 */
class Options
{

}