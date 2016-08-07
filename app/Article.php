<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Fields allowed to mass assign.
     *
     * @var array
     */
    protected $fillable = [
    	'title',
    	'body',
        'published_at'
    ];

    /**
     * Carbon based date fields.
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * Returns Published articles.
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Returns Unpublished articles.
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * Sets the published_at attribute as Carbon parsed $date.
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }


}
