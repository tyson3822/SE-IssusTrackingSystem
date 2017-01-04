<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project
 *
 * @property int $id
 * @property string $subject
 * @property string $description
 * @property string $visible
 * @property string $state
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Issue[] $issues
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereVisible($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
