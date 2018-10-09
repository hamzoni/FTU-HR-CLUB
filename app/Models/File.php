<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\File
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $entity_type
 * @property integer $entity_id
 * @property boolean $is_local
 * @property integer $file_category_type
 * @property string $s3_key
 * @property string $s3_bucket
 * @property string $s3_region
 * @property string $s3_extension
 * @property string $media_type
 * @property string $format
 * @property integer $file_size
 * @property boolean $is_enabled
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\UserInformation $userInformation
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereEntityType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereEntityId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereIsLocal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereFileCategoryType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereS3Key($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereS3Bucket($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereS3Region($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereS3Extension($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereMediaType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereFormat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereFileSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereIsEnabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Base
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'url',
        'title',
        'entity_type',
        'entity_id',
        'file_category_type',
        's3_key',
        's3_bucket',
        's3_region',
        's3_extension',
        'media_type',
        'content_type',
        'file_size',
        'is_enabled',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates = ['deleted_at'];

    protected $presenter = \App\Presenters\FilePresenter::class;

    public function userInformation()
    {
        return $this->belongsTo(UserInformation::class, 'entity_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'entity_id');
    }

    /*
     * API Presentation
     */

    public function toAPIArray()
    {
        return [
            'id' => $this->id,
        ];
    }
}
