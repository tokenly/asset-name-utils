<?php

use Tokenly\AssetNameUtils\Validator;
use \PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\TestCase;

/*
* 
*/
class AssetValidationTest extends TestCase {

    public function testIsValidAssetName() {
        PHPUnit::assertTrue(Validator::isValidAssetName('MYTOKEN'));
        PHPUnit::assertTrue(Validator::isValidAssetName('A95428956661682202'));
        PHPUnit::assertFalse(Validator::isValidAssetName('ABADTOKEN'));
        PHPUnit::assertTrue(Validator::isValidAssetNames(['MYTOKEN', 'MYTOKENTWO']));
    }

}
