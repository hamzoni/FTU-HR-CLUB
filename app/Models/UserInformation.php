<?php namespace App\Models;

/**
 * App\Models\UserInformation
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $fullname
 * @property string $phone_number
 * @property string $university
 * @property string $graduated_year
 * @property string $major
 * @property string $major2
 * @property string $cv_id
 * @property string $personality
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\File $cv
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereFullname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation wherePhoneNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereUniversity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereGraduatedYear($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereMajor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereMajor2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereCvId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation wherePersonality($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserInformation extends Base
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_informations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'fullname',
        'phone_number',
        'university',
        'university_name',
        'graduated_year',
        'major',
        'major2',
        'cv_id',
        'personality'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    // Relations
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cv()
    {
        return $this->belongsTo(File::class, 'cv_id');
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
            'fullname' => $this->fullname,
            'phone_number' => $this->phone_number,
            'university' => $this->university,
            'university_name' => $this->university_name,
            'graduated_year' => $this->graduated_year,
            'major' => $this->major,
            'cv_id' => $this->cv_id,
        ];
    }
}
