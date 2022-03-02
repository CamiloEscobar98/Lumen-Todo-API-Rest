<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Extra\Localization\Country;

class PhonePerson extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phone_person';

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
    protected $fillable = ['phone', 'country_id'];


    /**
     * Get the country which is being relationed with the phone number of the person.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the person which is being relationed with the phone.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class, 'uuid', 'uuid');
    }
}
