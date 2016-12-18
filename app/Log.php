<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description','priority','state','user_id','issue_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'issue_id' => 'int',
    ];

    /**
     * Get the user that the log is belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the project that the issue belongs to.
     */
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
