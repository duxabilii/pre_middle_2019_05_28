<?php


namespace Classes;


class CleanInput
{
    static $js = '#(script|alert|eval|prompt|confirm|cmd|passthru|eval|exec|expression|system|fopen|fsockopen|file|file_get_contents|readfile|unlink)#uisU';

    /**
     * @param string $str
     * @return string
     */
    public static function clean(string $str)
    {
        $str = (string)preg_replace(
            self::$js,
            '\\1\\2&#40;\\3&#41;',
            $str
        );
        return (string)$str;
    }

    /**
     * @param string $str
     * @return bool
     */
    public static function check(string $str)
    {
        return (bool)preg_match(self::$js, $str);
    }


}