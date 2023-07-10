<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'date_paid',
        'card_number',
        'status',
        'user_id',
        'card_id'
    ];

    // Payment made from a card
    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    // Payment made by the user of the card
    public function paidBy()
    {
        return $this->hasOne(User::class);
    }
}
