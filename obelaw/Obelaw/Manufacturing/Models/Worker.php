<?php

namespace Obelaw\Manufacturing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class Worker extends ModelBase
{
    use HasFactory;

    protected $table = 'manufacturing_workers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'job_position',
        'employee_code',
    ];
}
