<?php namespace App\Models;



/**
 * App\Models\UserTest
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $city
 * @property \Carbon\Carbon $submitted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserTest whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserTest whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserTest whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserTest whereSubmittedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserTest whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserTest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserTest extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'city',
        'submitted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [
        'submitted_at'
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
        ];
    }

}
