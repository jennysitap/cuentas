<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model {
    use HasFactory;

    protected $fillable = [
        'ammount', 'type', 'description', 'user_id', 'category_id', 'account_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
