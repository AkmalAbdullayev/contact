<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileNumber extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'contact_mobile_number', 'mobile_number_id', 'contact_id');
    }
}
