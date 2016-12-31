<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Log
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $priority
 * @property string $state
 * @property int $user_id
 * @property int $issue_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @property-read \App\Issue $issue
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log wherePriority($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereIssueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
