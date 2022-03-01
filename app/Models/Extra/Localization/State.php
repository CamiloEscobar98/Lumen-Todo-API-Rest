<?php

namespace App\Models\Extra\Localization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class State  extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['country_id', 'value', 'slug'];

    /**
     * Set the State's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        return $this->attributes['value'] = Str::lower($value);
    }

    /**
     * Get the State's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the State's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = Str::lower($value);
    }

    /**
     * Get the State's slug.
     *
     * @param  string  $value
     * @return string
     */
    public function getSlugAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Get the country which is being relationed with the state.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * Get the cities which are being relationed with the state.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }
}
