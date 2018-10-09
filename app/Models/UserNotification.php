<?php

namespace App\Models;

/**
 * App\Models\UserNotification
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $category_type
 * @property string $type
 * @property string $data
 * @property string $content
 * @property string $locale
 * @property boolean $read
 * @property \Carbon\Carbon $sent_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereCategoryType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereData($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereRead($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereSentAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserNotification extends Notification
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_notifications';

    protected $presenter = \App\Presenters\UserNotificationPresenter::class;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }
}
