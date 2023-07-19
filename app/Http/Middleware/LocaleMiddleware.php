<?php
namespace App\Http\Middleware;

use Closure;
use App;
use Request;



class LocaleMiddleware
{
    public static $mainLanguage = 'uk'; //основной язык, который не должен отображаться в URl

    public static $languages = ['uk', 'ru', 'en']; // Указываем, какие языки будем использовать в приложении.


    /*
     * Проверяет наличие корректной метки языка в текущем URL
     * Возвращает метку или значеие null, если нет метки
     */
    public static function getLocale()
    {

        $uri = Request::path(); //получаем URI


        $segmentsURI = explode('/',$uri); //делим на части по разделителю "/"

        //Проверяем метку языка  - есть ли она среди доступных языков
        if (!empty($segmentsURI[1]) && in_array($segmentsURI[1], self::$languages)) {
//dd('fs');
            if ($segmentsURI[1] != self::$mainLanguage){
//                dd('asd');
                return $segmentsURI[1];
            }

            if ($segmentsURI[1] == self::$mainLanguage){
                return 'uk';
            }

        }



        return null;
    }

    /*
    * Устанавливает язык приложения в зависимости от метки языка из URL
    */
    public function handle($request, Closure $next)
    {
//        dd('sf');
        $locale = self::getLocale();
//dd($locale);
        if($locale) {
//            dd($locale);
            if ($locale != self::$mainLanguage){
//                dd('asd');
                App::setLocale($locale);
            } else {
                App::setLocale(self::$mainLanguage);
            }

        }
        //если метки нет - устанавливаем основной язык $mainLanguage
        else {
            App::setLocale(self::$mainLanguage);
        }
//dd($locale);
        return $next($request); //пропускаем дальше - передаем в следующий посредник
    }

}
