<?php
namespace VueFactoryTests\Feature;

use Webflorist\VueFactory\VueInstance;
use VueFactoryTests\TestCase;

class VueAppTest extends TestCase
{

    public function test_simple_vue_app()
    {
        $code = (new VueInstance('#app'))->generate();
        $this->assertEquals(
            'new Vue({"el":"#app"});',
            $code
        );
    }

    public function test_simple_vue_app_with_computed_property()
    {
        $code = (new VueInstance('#app'))
            ->addComputed('computed_5','function () { return 2+3 }')
            ->addComputed('computed_8','function () { return 4+4 }')
            ->generate();
        $this->assertEquals(
            'new Vue({"el":"#app","computed":{"computed_5":function () { return 2+3 },"computed_8":function () { return 4+4 }}});',
            $code
        );
    }

    public function test_simple_vue_app_with_data()
    {
        $code = (new VueInstance('#app'))
            ->addData('string','value')
            ->addData('boolean_true',true)
            ->addData('boolean_false',false)
            ->addData('array',['item1','item2'])
            ->addData('object',(new \stdClass()))
            ->generate();
        $this->assertEquals(
            'new Vue({"el":"#app","data":{"string":"value","boolean_true":true,"boolean_false":false,"array":["item1","item2"],"object":{}}});',
            $code
        );
    }

    public function test_simple_vue_app_with_methods()
    {
        $code = (new VueInstance('#app'))
            ->addMethod('say_hello','function () { alert("Hello!") }')
            ->addMethod('say_bye','function () { alert("Bye!") }')
            ->generate();
        $this->assertEquals(
            'new Vue({"el":"#app","methods":{"say_hello":function () { alert("Hello!") },"say_bye":function () { alert("Bye!") }}});',
            $code
        );
    }

    public function test_simple_vue_app_with_propsData()
    {
        $code = (new VueInstance('#app'))
            ->addPropsData('property1','value1')
            ->addPropsData('property2',true)
            ->addPropsData('property3',['item1', 'item2'])
            ->generate();
        $this->assertEquals(
            'new Vue({"el":"#app","propsData":{"property1":"value1","property2":true,"property3":["item1","item2"]}});',
            $code
        );
    }

    public function test_simple_vue_app_with_watchers()
    {
        $code = (new VueInstance('#app'))
            ->addWatcher('data1','value1')
            ->addWatcher('data2','value2')
            ->generate();
        $this->assertEquals(
            'new Vue({"el":"#app","watch":{"data1":"value1","data2":"value2"}});',
            $code
        );
    }

    public function test_simple_vue_app_with_mountedHook()
    {
        $code = (new VueInstance('#app'))
            ->addMountedHook('alert("mounted!")')
            ->generate();
        $this->assertEquals(
            'new Vue({"el":"#app","mounted":function () { alert("mounted!") }});',
            str_replace(["\r", "\n"], '', $code)

        );
    }

    public function test_complex_vue_app()
    {
        $code = (new VueInstance('#app'))
            ->addComputed('computed_5','function () { return 2+3 }')
            ->addComputed('computed_8','function () { return 4+4 }')
            ->addData('string','value')
            ->addData('boolean_true',true)
            ->addData('boolean_false',false)
            ->addData('array',['item1','item2'])
            ->addData('object',(new \stdClass()))
            ->addMethod('say_hello','function () { alert("Hello!") }')
            ->addMethod('say_bye','function () { alert("Bye!") }')
            ->addPropsData('property1','value1')
            ->addPropsData('property2',true)
            ->addPropsData('property3',['item1', 'item2'])
            ->addWatcher('data1','value1')
            ->addWatcher('data2','value2')
            ->generate();
        $this->assertEquals(
            'new Vue({"el":"#app","computed":{"computed_5":function () { return 2+3 },"computed_8":function () { return 4+4 }},"data":{"string":"value","boolean_true":true,"boolean_false":false,"array":["item1","item2"],"object":{}},"methods":{"say_hello":function () { alert("Hello!") },"say_bye":function () { alert("Bye!") }},"propsData":{"property1":"value1","property2":true,"property3":["item1","item2"]},"watch":{"data1":"value1","data2":"value2"}});',
            $code
        );
    }

}