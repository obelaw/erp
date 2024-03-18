<?php

namespace O\Calculate;

function percentageCalculate(float $amount, float $percentage)
{
    return $percentage * $amount / 100;
}
