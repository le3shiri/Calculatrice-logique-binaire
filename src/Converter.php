<?php

namespace App;

class Converter
{
    public static function toBinary(int $num, int $pad = 0): string
    {
        if ($num >= 0) {
            $bin = decbin($num);
            if ($pad > 0) {
                $bin = str_pad($bin, $pad, '0', STR_PAD_LEFT);
            }
            return $bin;
        } else {
            $lower = $num & 0xFF;
            $bin = decbin($lower);
            $bin = str_pad($bin, 8, '0', STR_PAD_LEFT);
            return '…' . $bin;
        }
    }

    public static function toHex(int $num, int $pad = 0): string
    {
        if ($num >= 0) {
            $hex = dechex($num);
            if ($pad > 0) {
                $hex = str_pad($hex, $pad, '0', STR_PAD_LEFT);
            }
            return $hex;
        } else {
            $lower = $num & 0xFF;
            $hex = dechex($lower);
            $hex = str_pad($hex, 2, '0', STR_PAD_LEFT);
            return '…' . $hex;
        }
    }
}