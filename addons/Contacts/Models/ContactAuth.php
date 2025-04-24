<?php

namespace Obelaw\Contacts\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Obelaw\Twist\Facades\Twist;

class ContactAuth extends Authenticatable implements FilamentUser, HasName
{
    /**
     * Create a new instance of the Model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = Twist::getConnection()) {
            $this->setConnection($connection);
        }

        $this->setTable(config('obelaw.database.table_prefix', Twist::getPrefixTable()) . 'contacts_contact_auths');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getFilamentName(): string
    {
        return $this->contact->name;
    }

    /**
     * Get the parent imageable model (user or post).
     */
    public function contact(): MorphTo
    {
        return $this->morphTo();
    }
}
