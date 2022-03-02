<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\Extra\Localization\City;

class AddressPerson extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address_person';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'person_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['city_id', 'neighbor', 'address'];

    /**
     * Set the AddressPerson's neighbor.
     *
     * @param  string  $value
     * @return void
     */
    public function setNeighborAttribute($value)
    {
        return $this->attributes['neighbor'] = Str::lower($value);
    }

    /**
     * Get the AddressPerson's neighbor.
     *
     * @param  string  $value
     * @return string
     */
    public function getNeighborAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the AddressPerson's address.
     *
     * @param  string  $value
     * @return void
     */
    public function setAddressAttribute($value)
    {
        return $this->attributes['address'] = Str::lower($value);
    }

    /**
     * Get the AddressPerson's address.
     *
     * @param  string  $value
     * @return string
     */
    public function getAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Get the city which is being relationed with the addressPerson.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
