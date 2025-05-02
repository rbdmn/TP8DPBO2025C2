<?php

class Template
{
    private $filename = '';
    private $content = '';

    public function __construct($filename = '')
    {
        $this->filename = $filename;
        $this->content = file_exists($filename) ? file_get_contents($filename) : '';
    }

    public function clear()
    {
        // Remove any unreplaced placeholders
        $this->content = preg_replace("/DATA_[A-Z_0-9]+/", "", $this->content);
    }

    public function write()
    {
        $this->clear();
        echo $this->content;
    }

    public function getContent()
    {
        $this->clear();
        return $this->content;
    }

    public function replace($placeholder = '', $value = '')
    {
        // Convert various value types to string
        if (is_int($value) || is_float($value)) {
            $value = (string)$value;
        } elseif (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        } elseif (is_array($value)) {
            $value = implode(' ', $value);
        }

        // Simple string replacement
        $this->content = str_replace($placeholder, $value, $this->content);
    }

    // Helper method for HTML escaping
    public static function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}