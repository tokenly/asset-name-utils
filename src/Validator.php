<?php

namespace Tokenly\AssetNameUtils;

class Validator {
    
    public static function isValidAssetNames($names) {
        if (!$names) { return false; }

        foreach($names as $name) {
            if (!self::isValidAssetName($name)) {
                return false;
            }
        }

        return true;
    }

    public static function isValidAssetName($name) {
        if ($name === 'BTC') { return true; }
        if ($name === 'XCP') { return true; }

        // check free asset names
        if (substr($name, 0, 1) == 'A') { return self::isValidFreeAssetName($name); }

        if (!preg_match('!^[A-Z]+$!', $name)) { return false; }
        if (strlen($name) < 4) { return false; }

        return true;
    }

    // allow integers between 26^12 + 1 and 256^8 (inclusive), prefixed with 'A'
    public static function isValidFreeAssetName($name) {
        if (substr($name, 0, 1) != 'A') { return false; }

        $number_string = substr($name, 1);
        if (!preg_match('!^\\d+$!', $number_string)) { return false; }
        if (bccomp($number_string, "95428956661682201") < 0) { return false; }
        if (bccomp($number_string, "18446744073709551615") > 0) { return false; }

        return true;
    }

}

