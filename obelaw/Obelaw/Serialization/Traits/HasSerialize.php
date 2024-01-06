<?php

namespace Obelaw\Serialization\Traits;

use Illuminate\Support\Str;
use Obelaw\Serialization\Models\Serial;

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
            $item->serials()->create([
                'serial' => static::buildReference(
                    static::$serialPrefix ?? 'global',
                    static::$serialHit ?? 0,
                    $item->id
                ),
                'ulid' => (string) Str::ulid(),
                'barcode' => str_random(16, 'int'),
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
    private static function buildReference(string $prefix, string $hit, int $reference)
    {
        $out = Str::upper(Str::padLeft($prefix, 5, 'O')) . '/';
        $out .= Str::upper(Str::padLeft($hit, 3, 'O')) . '/';
        $out .= Str::padLeft($reference, 7, '0');
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
        return $this->morphMany(Serial::class, 'modelable');
    }

    /**
     * Get all of the model's serial.
     */
    public function serialOne()
    {
        return $this->morphOne(Serial::class, 'modelable');
    }
}
