<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
              'first_name' => $this->faker->firstName(),
              'last_name' => $this->faker->lastName(),
              'phone' => $this->faker->e164PhoneNumber(),
              'email' => $this->faker->safeEmail(),
              'identity_number' => $this->faker->numerify('##############'),
              'license_number' => $this->faker->numerify('##########'),
              'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
              'remember_token' => Str::random(10),
              'card' => $this->faker->boolean,
              'delegation' => $this->faker->boolean,
              'salary' => $this->faker->randomNumber(4, true),
              'address' => $this->faker->address,
              'card_expiry' => $this->faker->dateTimeBetween('now', '+6 years'),
              'license_expiry' => $this->faker->dateTimeBetween('now', '+6 years'),
              'delegation_date' => $this->faker->dateTimeBetween('now', '+6 years'),
              'created_at' => $this->faker->dateTimeBetween('now', '-2 years'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
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
