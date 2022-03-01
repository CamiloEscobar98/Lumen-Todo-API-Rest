<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Person extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'gender_id', 'private_email', 'birthdate'];

    /**
     * Set the Person's firstname.
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        return $this->attributes['firstname'] = Str::lower($value);
    }

    /**
     * Get the Person's firstname.
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the Person's lastname.
     *
     * @param  string  $value
     * @return void
     */
    public function setLastNameAttribute($value)
    {
        return $this->attributes['lastname'] = Str::lower($value);
    }

    /**
     * Get the Person's lastname.
     *
     * @param  string  $value
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the Person's private email.
     *
     * @param  string  $value
     * @return void
     */
    public function setPrivateEmailAttribute($value)
    {
        return $this->attributes['private_email'] = Str::lower($value);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'uuid', 'uuid');
    }
}
