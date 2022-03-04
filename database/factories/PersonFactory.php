<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Person;
use App\Models\Extra\Gender;
use App\Models\Extra\Localization\City;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender_aux = Gender::all()->random(1)->first();
        $gender = $gender_aux->slug == 'M' ? 'male' : 'female';
        $firstname = $this->faker->firstName($gender);
        $lastname = $this->faker->lastName($gender);
        return [
            'gender_id' => $gender_aux->id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'private_email' => $this->faker->unique()->safeEmail,
            'birthdate' => $this->faker->dateTimeBetween('-40 years', '-17 years')
        ];
    }

    /**
     * Configure the model factory.
     * 
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Person $person) {
            $city = City::all()->random(1)->first();
            $person->addressPerson()->create([
                'city_id' => $city->id,
                'address' => $this->faker->address,
                'neighbor' => $this->faker->company,
            ]);

            $person->phonePerson()->create([
                'country_id' => $city->state->country->id,
                'phone' => $this->faker->unique()->phoneNumber
            ]);

            $password = '1234';
            $person->user()->create([
                'email' => $this->faker->safeEmail,
                'password' => $password,
                'real_password' => $password,
            ]);
        });
    }
}
