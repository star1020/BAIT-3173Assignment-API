<?php

namespace Database\Factories;

use App\Models\Card_info;
use Illuminate\Database\Eloquent\Factories\Factory;

class Card_infoFactory extends Factory
{
    protected $model = Card_info::class;

    public function definition()
    {
        $paymentMethod = $this->faker->randomElement(['credit card', 'debit card']);

        return [
            'card_number' => $this->faker->creditCardNumber,
            'expiration_date' => $this->faker->creditCardExpirationDate->format('m/y'),
            'cardholder_name' => $this->faker->name,
            'cvv' => $this->faker->randomNumber(3),
            'payment_method' => $paymentMethod,
        ];
    }
}
