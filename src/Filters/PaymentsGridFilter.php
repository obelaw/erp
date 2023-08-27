<?php

namespace Obelaw\Accounting\Filters;

class PaymentsGridFilter
{
    public function type($value)
    {
        if ($value == 'send') {
            return '<span class="status status-red">Send</span>';
        }

        if ($value == 'receive') {
            return '<span class="status status-green">Receive</span>';
        }
    }

    public function amount($value)
    {
        return '<span class="status">' . amount($value) . '</span>';
    }

    public function remainingDays($value)
    {
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        $day = $value;

        if ($today > $day) {
            return '<span class="status status-red">Late</span>';
        } elseif ($today == $day) {
            return '<span class="status status-green">Today</span>';
        } elseif ($today < $day) {
            return '<span class="status status-yellow">Coming</span>';
        }
    }

    public function collected($value, $row)
    {
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        $day = $row->due_date;

        if ($today > $day) {
            return '<span class="status status-red">Unrealized</span>';
        }

        if (is_null($value)) {
            return '<span class="status status-yellow">Uncollected</span>';
        }

        return '<span class="status status-green">Collected</span>';
    }
}
