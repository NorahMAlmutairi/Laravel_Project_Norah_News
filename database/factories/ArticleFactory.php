<?php

namespace Database\Factories;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $thumbnails = scandir('storage/app/public/thumbnails');
        if (in_array('.', $thumbnails))
            array_splice($thumbnails, array_search('.', $thumbnails), 1);
        if (in_array('..', $thumbnails))
            array_splice($thumbnails, array_search('..', $thumbnails), 1);
        return [
            'user_id' => 1,
            'category_id' => rand(1, 8),
            'title' => $this->faker->sentence(rand(5, 20)),
            'thumbnail' => 'storage/thumbnails/' . collect($thumbnails)->random(),
            'content' => $this->faker->paragraphs(rand(3, 10), true),
            'visits' => rand(0, 3000),
            'published_at' => Carbon::today()->subDays(rand(0, 365))->subSeconds(rand(0, 86400))
        ];
    }
}
