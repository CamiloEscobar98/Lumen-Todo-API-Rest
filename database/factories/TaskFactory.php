<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Task;
use App\Models\User;
use App\Models\Category;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random(1)->first();
        $category = Category::all()->random(1)->first();

        return [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => $this->faker->unique()->sentence(3),
            'body' => $this->faker->unique()->paragraph(),
            'start_date' => $this->faker->dateTimeBetween('now', 'now'),
            'end_date' => $this->faker->dateTimeBetween('+1 day', '+2 weeks'),
        ];
    }
}
