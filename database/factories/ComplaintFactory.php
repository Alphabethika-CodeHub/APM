<?php

namespace Database\Factories;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email(),

            'username' => $this->faker->randomElement([
                'user', 'user2', 'user3', 'user4', 'user5', 
                'user6', 'user7', 'user8', 'user9', 'user10'
            ]),

            'title' => $this->faker->sentence(),
            'subject' => $this->faker->paragraph(10),
            'date' => $this->faker->dateTimeBetween('+10 days', '+10 month'),
            'location' => $this->faker->address(),
            'status' => $this->faker->randomElement(['Process', 'Pending', 'Completed']),

            'user_id' => rand(1,10),
            
            'image' => $this->faker->randomElement([
                '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', 
                '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', 
                '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg', 
                '16.jpg', '17.jpg', '18.jpg', '19.jpg', '20.jpg',
            ]),

            'created_at' => $this->faker->dateTimeBetween('+10 days', '+10 month')

        ];
    }
}
