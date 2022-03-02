<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'slug'];

    /**
     * Set the Category's value.
     *
     * @param  string  $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        return $this->attributes['value'] = Str::lower($value);
    }

    /**
     * Get the Category's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the Category's slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = Str::lower($value);
    }

    /**
     * Get the Category's slug.
     *
     * @param  string  $value
     * @return string
     */
    public function getSlugAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Get a task list which are being relationed with the category.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
