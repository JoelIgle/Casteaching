<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

        protected  $guarded = [];
        protected $dates = ['published_at'];
//        protected $casts = [
//            'published_at' => 'datetime',
//        ];
//    protected $fillable = [
//        'title',
//        'description',
//        'url',
//        'published_at',
//        'previous',
//        'next',
//        'serie_id',
//    ];

    public function getFormattedPublishedAtAttribute(): string
    {
        if (!$this->published_at) {
            return '';
        }
        $published_at = \Carbon\Carbon::parse($this->published_at);
        $locale_date = optional($published_at)->locale(config('app.locale'));
        return $locale_date->day . ' de ' . $locale_date->monthName . ' de ' . $locale_date->year;
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function setSerie(Serie $serie)
    {
        $this->serie_id = $serie->id;

        $this->save();

        return $this;
    }
}


