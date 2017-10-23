<?php
namespace testing;
require_once(TEST_ROOT_DIR.'/vendor/autoload.php');
$cwDir = dirname(__FILE__);
$requireFile = str_replace('\test','',$cwDir).'\index.php';
require_once($requireFile);
use PHPUnit\Framework\TestCase;
use phpmock\MockBuilder;
use phpmock\functions\FixedValueFunction;
class indexText extends TestCase {
  public function testGetName(){
    $lo_builder =  new MockBuilder();
      $lo_builder->setNamespace(__NAMESPACE__)
        ->setName("getFirstName")
        ->setFunctionProvider(new FixedValueFunction('Lee'));
        /*->setFunction(
            function ($lc_ruleText, $lc_newPassword) {
              var_dump("calling ...");
                return true;
            }
        );*/
       $lo_mock = $lo_builder->build();
       
      $lo_mock->enable();
      var_dump(getFirstName());      
      $result = getName();
      $this->assertEquals('Lee mark',$result);
      $lo_mock->disable();
  }
}

