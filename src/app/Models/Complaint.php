<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\System;
use App\Models\User;

class Complaint extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the system.
     */
    public function system()
    {
        return $this->belongsTo(System::class, 'id');
    }

    /**
     * Get the user that owns the system.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * Get the user that owns the system.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * Get the user that owns the system.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
