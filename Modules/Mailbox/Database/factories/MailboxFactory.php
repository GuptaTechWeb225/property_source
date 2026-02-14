<?php

namespace Modules\Mailbox\Database\Factories;

use Modules\Sale\Entities\SaleCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mailbox>
 */
class MailboxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence,
            'message' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['draft', 'sent', 'starred', 'important', 'trash']),
            'user_id' => auth()->id(),
            'created_by' => auth()->id(),
        ];
    }
}
