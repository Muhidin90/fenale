<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_name',
        'card_number',
        'expire_date',
        'cvv',
        'zip_code',
        'user_card_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
