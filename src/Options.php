<?php

namespace Webflorist\VueFactory;

use Webflorist\VueFactory\Options\Computed;
use Webflorist\VueFactory\Options\Data;
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
 * @property string     $el         CSS selector string of the DOM element (see https://vuejs.org/v2/api/#el)
 *
 * Data-Options:
 * --------------
 * @property Data       $data       Data object for the Vue instance. (see https://vuejs.org/v2/api/#data)
 * @property PropsData  $propsData  Pass props to an instance during its creation. (see https://vuejs.org/v2/api/#propsData)
 * @property Computed   $computed   Computed properties to be mixed into the Vue instance. (see https://vuejs.org/v2/api/#computed)
 * @property Methods    $methods    Methods to be mixed into the Vue instance. (see https://vuejs.org/v2/api/#methods)
 * @property Watch      $watch      Object where keys are expressions to watch and values are the corresponding callbacks. (see https://vuejs.org/v2/api/#watch)
 */
class Options
{

}