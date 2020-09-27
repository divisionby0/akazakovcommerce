<?php


class Locales
{
    private static $texts = array(
        "NOT_LOGGED_IN"=>"Неавторизированные пользователи не могут просматривать курсы",
        "NOT_PAYED"=>"Чтобы просматривать курс вам нужно его оплатить");

    public static function getText($key){
        return self::$texts[$key];
    }
}