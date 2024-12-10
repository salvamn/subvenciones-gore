<?php



if (!function_exists('formatear_numero')) {
    function formatear_numero($numero)
    {
        if($numero < 100){
            return $numero;
        }
        return number_format($numero, 0, ',', '.');
    }
}
