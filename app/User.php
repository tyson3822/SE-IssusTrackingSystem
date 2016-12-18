<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DCN\RBAC\Traits\HasRoleAndPermission;
use DCN\RBAC\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use Notifiable,HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the projects that user join.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class,'project_user_relations')->withPivot('user_auth');
    }

    /**
     * Get the issues that are assigned to user.
     */
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    /**
     * Get the logs that the user has.
     */
    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
