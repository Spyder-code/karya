<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupHistory extends Model
{
    use HasFactory;
    protected $table = 'transaction_histories';
    protected $fillable = [
        'user_id',
        'payment_method_id',
        'status',
        'transaction_id',
        'store',
        'amount'
    ];
}
