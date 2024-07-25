<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Task extends Model
{
    use HasFactory, HasApiTokens, SoftDeletes;

    protected $fillable = ['title', 'description', 'status', 'user_id', 'category_id'];

    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
}
