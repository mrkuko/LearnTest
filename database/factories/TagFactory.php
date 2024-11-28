<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

define('JOB_CATEGORIES', [
    'Engineering', 'Business', 'Finance', 'Healthcare', 'Information Technology',
    'Education', 'Legal', 'Construction', 'Marketing', 'Science'
]);

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(JOB_CATEGORIES),
        ];
    }
}
