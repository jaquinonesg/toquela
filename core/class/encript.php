<?php

class Encript {

    private static $charAllows = '0bc1de2f3gh4ij5kl6m7n@8op9qrstuvwxyz';
    private static $characters = 'a0bc1de2f3gh4ij5kl6m7n@8op9qrstuvwxyz';
    private static $num_encript;
    public static $string;

    private static function encode($inputVar, $num = 0) {
        self::$num_encript = $num;
        $len = strlen($inputVar);
        for ($i = 0; $i < strlen($inputVar); $i++) {
            self::addNum($len++);
            $position = strpos(self::$charAllows, strtolower($inputVar{$i}));
            if (!is_int($position)) {
                return 'Cadena ingresada con caracteres invalidos "' . $inputVar{$i} . '"';
            }
            $char = self::characters();
            $string .= $char{$position};
        }
        return self::$string = $string;
    }

    private static function decode($inputVar, $num = 0) {
        self::$num_encript = $num;
        $len = strlen($inputVar);
        for ($i = 0; $i < strlen($inputVar); $i++) {
            self::addNum($len++);
            $position = strpos(self::characters(), strtolower($inputVar{$i}));
            $char = self::$charAllows;
            $string .= $char{$position};
        }
        return self::$string = $string;
    }

    private static function addNum($len) {
        self::$num_encript = ((self::$num_encript + ($len)) - (int) (sqrt($len * log(($len * 4) - 1) * log($len * 10))));
    }

    private static function characters() {
        $num = self::$num_encript % (strlen(self::$characters) - 1);
        return substr(self::$characters, $num) . substr(self::$characters, 0, $num);
    }

    public static function fnEncrypt($sValue) {
        return self::encode($sValue, 10835);
    }

    public static function fnDecrypt($sValue) {
        return self::decode($sValue, 10835);
    }

}
