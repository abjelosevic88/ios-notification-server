<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'message', 'publish_date', 'application_id'
    ];

    /**
     * Message belongs to application.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
