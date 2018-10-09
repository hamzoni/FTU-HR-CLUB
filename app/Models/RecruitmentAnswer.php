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
class RecruitmentAnswer extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recruitment_answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'content'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

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
