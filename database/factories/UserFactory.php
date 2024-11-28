<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Factory class to generate fake data for User model.
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     * 
     * This static property stores the password to be used for user generation.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * This method returns an array of default attributes for the User model.
     *
     * @return array<string, mixed>  An associative array containing default user attributes
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),  // Generate a random name
            'email' => fake()->unique()->safeEmail(),  // Generate a unique email
            'email_verified_at' => now(),  // Set the email verification time to the current timestamp
            'password' => static::$password ??= Hash::make('password'),  // Set a default password if none is provided
            'remember_token' => Str::random(10),  // Generate a random remember token
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * This method allows the creation of a user with an unverified email address.
     *
     * @return static  The factory instance with the modified state
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,  // Set email_verified_at to null for unverified users
        ]);
    }
}
