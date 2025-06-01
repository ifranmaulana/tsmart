<?php
namespace App\Helpers;

use NumberFormatter;

class CurrencyHelper {
    public static function format($amount, $currency = 'IDR', $locale = 'id_ID') {
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($amount, $currency);
    }
}