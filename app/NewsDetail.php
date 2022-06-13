<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property int $new_id
 * @property string $phone
 * @property string $mail
 * @property string $created_at
 * @property string $updated_at
 */
class NewsDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_detail';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'new_id', 'phone', 'mail', 'created_at', 'updated_at'];
    public function news(){
        return $this->belongsToMany(News::class,'id','new_id');
        // return $this->belongsTo(Project::class);
    }
}
