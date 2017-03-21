<?php

class Template {

    private $template;
    public $content;

    public function __construct($template) {
        $this->template = $template;
        $this->content = $this->getContent();
    }

    public function set($key, $value) {
        $this->content = str_replace('${' . $key . '}', $value, $this->content);
    }

    public function getContent() {
        $ret = '';
        $uchwyt = fopen($this->template, "r");
        while (!feof($uchwyt)) {
            $buffer = fgets($uchwyt, 4096);
            $ret .= $buffer;
        }
        fclose($uchwyt);
        return $ret;
    }

    public function write($fileName) {
        $fd = fopen($fileName, "w");
        fwrite($fd, $this->content);
        fclose($fd);
    }

}