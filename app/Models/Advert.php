<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    public $fillable = [
        'first_name',
        'surname',
        'last_name',
        'gender',
        'avg_age',
        'last_seen',
        'lost_date',
        'picture',
        'description',
        'rel_contact',
        'reward_offered',
        'relation',
        'user_id'
    ];
    // methods 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function card()
    {
        return $this->hasOne(Card::class);
    }

}
