<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'event_type' => $this->faker->randomElement(['Casamento', 'Aniversário', 'Formatura', 'Corporativo']),
            'guests' => $this->faker->numberBetween(50, 500),
            'city' => $this->faker->city(),
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'observations' => $this->faker->optional()->paragraph(),
            'type' => $this->faker->randomElement(['contact', 'budget']),
        ];
    }
}

