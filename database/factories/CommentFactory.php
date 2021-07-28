<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => $this->faker->name(),
            'content' => $this->faker->sentence(rand(5, 20)),
            'likes' => rand(0, 100),
            'status' => collect(['Pending Approval', 'Visible', 'Hidden'])->random(),
            'article_id' => rand(1, 100)
        ];
    }
}
