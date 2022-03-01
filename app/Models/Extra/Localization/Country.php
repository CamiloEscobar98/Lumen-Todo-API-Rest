<?php

namespace App\Models\Extra\Localization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'slug'];

    /**
     * Set the Country's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        return $this->attributes['value'] = Str::lower($value);
    }

    /**
     * Get the Country's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the Country's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = Str::lower($value);
    }

    /**
     * Get the Country's slug.
     *
     * @param  string  $value
     * @return string
     */
    public function getSlugAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Get the states which are being relationed with the country.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states()
    {
        return $this->hasMany(State::class, 'country_id', 'id');
    }

    /**
     * Get the cities which are being relationed with the states relationed with the country.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }
}
