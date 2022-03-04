<?php

namespace App\Models\Extra;

use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gender extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'slug'];

    /**
     * Set the Gender's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        return $this->attributes['value'] = Str::lower($value);
    }

    /**
     * Get the Gender's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the Gender's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = Str::lower($value);
    }

    /**
     * Get the Gender's slug.
     *
     * @param  string  $value
     * @return string
     */
    public function getSlugAttribute($value)
    {
        return Str::upper($value);
    }

    /**
     * Get the people which are being relationed with the gender.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany(Person::class, 'gender_id', 'id');
    }
}
