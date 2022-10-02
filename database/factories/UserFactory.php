<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $password = bcrypt(fake()->password);
        $type = ['App\Models\Admin', 'App\Models\Staff', 'App\Models\Doctor'];
        

        return [
            'name' => fake()->name(),
            'username' => fake()->username(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'type' => $type[mt_rand(0,2)],
            'password' => $password, // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
