<?php

class EncodeURL {

    public function encodeStringToUrl($name) {
        if (!is_string($name)) {
            return null;
        }
        $name = str_replace('-', '', $name);
        $name = str_replace('_', '', $name);
        $name = str_replace(' ', '', $name);
        $name = strtolower($name);
        $name = urlencode($name);
        return $name;
    }

}
