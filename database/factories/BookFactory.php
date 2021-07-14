<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker ->randomDigitNotNull, 
            'image' => $this->faker ->image, 
            'title_id' => $this->faker ->randomDigitNotNull, 
            'subtitle' => $this->faker ->word, 
            'author' => $this->faker ->name, 
            'category_id' => $this->faker ->randomDigitNotNull, 
            'content' => $this->faker ->realText, 
            'status' => 1

        ];
    }
}
