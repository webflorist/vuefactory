<?php

namespace Webflorist\VueFactory;

/**
 * This class represents a Vue instance.
 * (see https://vuejs.org/v2/guide/instance.html
 *
 * Class VueInstance
 * @package Webflorist\VueFactory
 */
class VueInstance
{

    /**
     * This class represents the options object of Vue.
     * (see https://vuejs.org/v2/api/#vm-options)
     *
     * @var Options
     */
    protected $options;

    /**
     * VueInstance constructor.
     *
     * @param string $el
     */
    public function __construct(string $el)
    {
        $this->options = new Options();
        $this->options->el = $el;
    }

    /**
     * Returns generated JavaScript code as string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->generate();
    }

    /**
     * Generates the JavaScript code representing this Vue instance.
     *
     * @return string
     */
    public function generate()
    {
        return "new Vue(" . $this->javaScripIfy($this->options) . ");";
    }

    /**
     * Adds a computed property to this Vue instance.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function addComputed(string $key, $value)
    {
        if (is_string($value)) {
            $value = trim($value);
        }
        $this->addOption('computed', $key, $value);
        return $this;
    }

    /**
     * Adds a data-item to this Vue instance.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function addData(string $key, $value)
    {
        $this->addOption('data', $key, $value);
        return $this;
    }

    /**
     * Adds a method to this Vue instance.
     *
     * @param string $key
     * @param string $function
     * @return $this
     */
    public function addMethod(string $key, string $function)
    {
        $this->addOption('methods', $key, trim($function));
        return $this;
    }

    /**
     * Adds a property to pass to this Vue instance during it's creation.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function addPropsData(string $key, $value)
    {
        $this->addOption('propsData', $key, $value);
        return $this;
    }

    /**
     * Adds a watcher to this Vue instance.
     *
     * @param string $key
     * @param string|object|array $value
     * @return $this
     */
    public function addWatcher(string $key, $value)
    {
        $this->addOption('watch', $key, $value);
        return $this;
    }


    /**
     * Adds a specific option to $this->options.
     *
     * @param $optionType
     * @param string $key
     * @param $value
     */
    private function addOption($optionType, string $key, $value)
    {
        if (!property_exists($this->options, $optionType)) {
            $objectClass = 'Webflorist\\VueFactory\\Options\\'.ucfirst($optionType);
            $this->options->{$optionType} = new $objectClass();
        }
        $this->options->{$optionType}->{$key} = $value;
    }

    /**
     * Parses $item and returns it's JavaScript-pendant.
     *
     * @param mixed $item
     * @return string
     */
    private function javaScripIfy($item)
    {

        if (is_null($item)) {
            return 'null';
        }

        if (is_bool($item)) {
            return ($item === true) ? 'true' : 'false';
        }

        if (is_array($item)) {
            $jsArray = '[';
            foreach ($item as $value) {
                $jsArray .= $this->javaScripIfy($value) . ',';
            }
            $jsArray = rtrim($jsArray, ',');
            $jsArray .= ']';
            return $jsArray;
        }

        if (is_object($item)) {
            $jsObject = '{';
            foreach (get_object_vars($item) as $name => $value) {
                $jsObject .= '"' . trim($name) . '"' . ':' . $this->javaScripIfy($value) . ',';
            }
            $jsObject = rtrim($jsObject, ',');
            $jsObject .= '}';
            return $jsObject;
        }

        if ($this->isJavaScriptFunction($item)) {
            return $item;
        }

        return json_encode(trim($item));

    }

    /**
     * Is $string a JavaScript function?
     *
     * @param string $string
     * @return bool
     */
    private function isJavaScriptFunction(string $string)
    {
        if (strpos($string, 'function') === false) {
            return false;
        }
        $firstLineWithoutSpaces = str_replace(' ', '', strtok(trim($string), "\n"));
        if (strpos($firstLineWithoutSpaces, 'function(') !== false) {
            return true;
        }
        return false;
    }
}