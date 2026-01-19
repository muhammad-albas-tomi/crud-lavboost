<?php

namespace App\Helpers;

class CurrencyHelper
{
    /**
     * Format number to Indonesian Rupiah
     *
     * @param float $amount
     * @return string
     */
    public static function formatRupiah($amount)
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }

    /**
     * Format number to Indonesian Rupiah with decimal
     *
     * @param float $amount
     * @param int $decimals
     * @return string
     */
    public static function formatRupiahDecimal($amount, $decimals = 2)
    {
        return 'Rp ' . number_format($amount, $decimals, ',', '.');
    }
}
