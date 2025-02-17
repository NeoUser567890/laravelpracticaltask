<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\UserRole;

class UserRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=UserRole::class;
    public function definition()
    {
        return [
            //
            'name' =>$this->faker->randomElement(['admin','user'])
        ];
    }
}
