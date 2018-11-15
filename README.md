# webflorist/vuefactory
**PHP package to generate Vue-Apps**

## Description
This package provides functionality for building Vue-Apps in PHP.

## Installation
1. Require the package via composer:  `composer require webflorist/vuefactory`

## Configuration
No configuration is necessary.

## Usage
### Example
This PHP-code....
```php
(new Webflorist\VueFactory\VueInstance('#app'))
    ->addComputed('computed_5','function () { return 2+3 })')
    ->addComputed('computed_8','function () { return 4+4 })')
    ->addData('string','value')
    ->addData('boolean_true',true)
    ->addData('boolean_false',false)
    ->addData('array',['item1','item2'])
    ->addData('object',(new \stdClass()))
    ->addMethod('say_hello','function () { alert("Hello!") })')
    ->addMethod('say_bye','function () { alert("Bye!") })')
    ->addPropsData('property1','value1')
    ->addPropsData('property2',true)
    ->addPropsData('property3',['item1', 'item2'])
    ->addWatcher('data1','value1')
    ->addWatcher('data2','value2')
    ->generate();
```
...results in the following JS-code:
```js
new Vue({
    "el": "#app",
    "computed": {
        "computed_5": function() {
            return 2 + 3
        },
        "computed_8": function() {
            return 4 + 4
        }
    },
    "data": {
        "string": "value",
        "boolean_true": true,
        "boolean_false": false,
        "array": ["item1", "item2"],
        "object": {}
    },
    "methods": {
        "say_hello": function() {
            alert("Hello!")
        },
        "say_bye": function() {
            alert("Bye!")
        }
    },
    "propsData": {
        "property1": "value1",
        "property2": true,
        "property3": ["item1", "item2"]
    },
    "watch": {
        "data1": "value1",
        "data2": "value2"
    }
});
```