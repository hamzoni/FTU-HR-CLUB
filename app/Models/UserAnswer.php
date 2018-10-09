<?php namespace App\Models;



/**
 * App\Models\UserAnswer
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $question_id
 * @property string $answer
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAnswer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAnswer whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAnswer whereAnswer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserAnswer extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'question_id',
        'answer',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    // Relations

    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'question_id' => $this->question_id,
            'answer' => $this->answer,
        ];
    }

}
