<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\Unit\SerieTest;

class Serie extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['created_at'];

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public static function testedBy() {
        return SerieTest::class;
    }

    public function getFormattedCreatedAtAttribute(): string
    {
        if (!$this->created_at) {
            return '';
        }
        $created_at = \Carbon\Carbon::parse($this->created_at);
        $locale_date = optional($created_at)->locale(config('app.locale'));
        return $locale_date->day . ' de ' . $locale_date->monthName . ' de ' . $locale_date->year;
    }
}
