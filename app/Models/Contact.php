<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function emails(): BelongsToMany
    {
        return $this->belongsToMany(Email::class, 'contact_email', 'contact_id', 'email_id');
    }

    public function mobile_numbers(): BelongsToMany
    {
        return $this->belongsToMany(MobileNumber::class, 'contact_mobile_number', 'contact_id', 'mobile_number_id');
    }
}
