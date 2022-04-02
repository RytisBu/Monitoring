<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\System;
use App\Models\User;

class Complaint extends Model
{
    use HasFactory;

    protected $table = 'complaints';

    protected $fillable = [
        'name',
        'created_by_user',
        'updated_by_user',
        'category',
        'status',
        'priority',
        'assigned_user_id',
        'system_id',
        'description',
        'deleted',
    ];

    /**
     * Get the user that owns the system.
     */
    public function system()
    {
        return $this->belongsTo(System::class, 'system_id');
    }

    /**
     * Get the user that owns the system.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    /**
     * Get the user that owns the system.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }

    /**
     * Get the user that owns the system.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_user');
    }
}
