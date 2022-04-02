<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Complaint;

class System extends Model
{
    use HasFactory;

    protected $table = 'systems';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'assigned_user_id',
        'status',
        'deleted',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['deleted'];

    /**
     * Get the user that owns the system.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    /**
     * Get the systems for the user post.
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public static function getActiveSystems()
    {
        return System::where('status', 'Active')->where('deleted', '0')->get();
    }
}
