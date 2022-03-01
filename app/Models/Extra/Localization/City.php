<?php

namespace App\Models\Extra\Localization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['state_id', 'value', 'slug'];

    /**
     * Set the City's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        return $this->attributes['value'] = Str::lower($value);
    }

    /**
     * Get the City's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the City's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = Str::lower($value);
    }

    /**
     * Get the City's slug.
     *
     * @param  string  $value
     * @return string
     */
    public function getSlugAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Get the state which is being relationed with the city.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    /**
     * Get the country which is being relationed with the state relationed with the city.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */

    public function country()
    {
        return $this->hasOneThrough(Country::class, State::class);
    }
}
