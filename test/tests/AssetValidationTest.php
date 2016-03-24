<?php

use Tokenly\AssetNameUtils\Validator;
use \PHPUnit_Framework_Assert as PHPUnit;

/*
* 
*/
class AssetValidationTest extends PHPUnit_Framework_TestCase {

    public function testIsValidAssetName() {
        PHPUnit::assertTrue(Validator::isValidAssetName('MYTOKEN'));
        PHPUnit::assertTrue(Validator::isValidAssetName('A95428956661682202'));
        PHPUnit::assertFalse(Validator::isValidAssetName('ABADTOKEN'));
        PHPUnit::assertTrue(Validator::isValidAssetNames(['MYTOKEN', 'MYTOKENTWO']));
    }

}
