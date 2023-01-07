<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->safeEmail(),
            'postcode' => '123-4567',
            'address' => $this->faker->address(),
            'building_name' => $this->faker->streetAddress(),
            'opinion' => $this->faker->text(100),
            /*
            'postcode' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'building_name' => $this->faker->streetAddress(),
            'opinion' => $this->faker->text(100),
            */
        ];
    }
}
