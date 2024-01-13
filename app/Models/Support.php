<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'body',
    ];

    public static function saveRules(): array
    {
        return [
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ];
    }
}
