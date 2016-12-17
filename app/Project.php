<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'description', 'visible','state',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'project_id' => 'int',
    ];

    /**
     * Get the users that join the project.
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'project_user_relations')->withPivot('user_auth');
    }

    /**
     * Get the project that the issue belongs to.
     */
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }


}
