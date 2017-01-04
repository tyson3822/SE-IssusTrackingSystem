<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DCN\RBAC\Traits\HasRoleAndPermission;
use DCN\RBAC\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $ability
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Issue[] $issues
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Log[] $logs
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $readNotifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\DCN\RBAC\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\DCN\RBAC\Models\Permission[] $userPermissions
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAbility($value)
 * @mixin \Eloquent
 */
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

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $value = bcrypt($value);
        }

        $this->attributes['password'] = $value;
    }

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
