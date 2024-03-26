<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    protected $table = 'lists';
    use HasFactory;
    protected $fillable = [
        'folder_id',
        'title',
        'status',
    ];
}
