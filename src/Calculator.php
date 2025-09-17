<?php

namespace App;

class Calculator
{
    private int $a;
    private int $b;

    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function and(): int
    {
        return $this->a & $this->b;
    }

    public function or(): int
    {
        return $this->a | $this->b;
    }

    public function xor(): int
    {
        return $this->a ^ $this->b;
    }

    public function notA(): int
    {
        return ~$this->a;
    }
}