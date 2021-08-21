<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Validator::extend('numeric_br', function($attribute, $value, $parameters, $validator) {
            if (isset($value)) {
                $value = str_replace(['.',','],['','.'], $value);
                return is_numeric($value);
            }
            return false;
        });
        Validator::extend('Cnpj', function($attribute, $value, $parameters, $validator) {
            $c = preg_replace('/\D/', '', $value);
            $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
            if (strlen($c) != 14) {
                return false;
            }
            elseif (preg_match("/^{$c[0]}{14}$/", $c) > 0) {
                return false;
            }
            for ($i = 0, $n = 0; $i < 12; $n += $c[$i] * $b[++$i]);
            if ($c[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
                return false;
            }
            for ($i = 0, $n = 0; $i <= 12; $n += $c[$i] * $b[$i++]);
            if ($c[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
                return false;
            }
            return true;    
        });
        Validator::extend('Cpf', function($attribute, $value, $parameters, $validator) {
            $c = preg_replace('/\D/', '', $value);
            if (strlen($c) != 11 || preg_match("/^{$c[0]}{11}$/", $c)) {
                return false;
            }
            for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);
            if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
                return false;
            }
            for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);
            if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
                return false;
            }
            return true;
        });
        Paginator::useBootstrap();
    }
}
