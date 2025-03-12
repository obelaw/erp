<?php

namespace Obelaw\Audit\Traits;

use Illuminate\Support\Str;
use Obelaw\Audit\Models\Serial;

trait HasSerialize
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot()
    {
        parent::boot();


        static::created(function ($item) {

            $year = date('Y');

            $lastItem = Serial::where('recordable_type', get_class($item))
                ->where('year', $year)
                ->orderBy('id', 'DESC')
                ->first();

            $sequence = $lastItem?->sequence ?? 0;
            $newSequence = $sequence + 1;

            $item->serials()->create([
                'year' => $year,
                'sequence' => $newSequence,
                'serial' => static::buildReference(
                    method_exists(static::class, 'serialPrefix') ? static::serialPrefix($item) : '',
                    static::$serialSection ?? 'global',
                    $newSequence
                ),
                'ulid' => (string) Str::ulid(),
                'barcode' => Str::random(16, 'int'),
            ]);
        });

        static::deleting(function ($item) {
            if ($item->serialOne) {
                $item->serialOne->delete();
            }
        });
    }

    /**
     * Build Reference
     */
    private static function buildReference(string $prefix, string $section, int $sequence)
    {
        $out = $prefix ? $prefix . '/' : '';
        $out .= date('Y') . '/';
        $out .= Str::upper(Str::limit($section, 5, '')) . '/';
        $out .= Str::padLeft($sequence, 7, '0');
        return $out;
    }

    public function getSerialAttribute()
    {
        return $this->serialOne?->serial ?? '---';
    }

    public function getUlidAttribute()
    {
        return $this->serialOne?->ulid ?? '---';
    }

    public function getBarcodeAttribute()
    {
        return $this->serialOne?->barcode ?? '---';
    }

    /**
     * Get all of the model's serials.
     */
    public function serials()
    {
        return $this->morphMany(Serial::class, 'recordable');
    }

    /**
     * Get all of the model's serial.
     */
    public function serialOne()
    {
        return $this->morphOne(Serial::class, 'recordable');
    }
}
