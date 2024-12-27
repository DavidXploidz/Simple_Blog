<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Tutorials', 'description' => 'Step-by-step guides to learn new skills'],
            ['name' => 'Reviews', 'description' => 'Opinions and evaluations of products, services, books, movies'],
            ['name' => 'Lists', 'description' => 'Compilations of items in an easy-to-digest format'],
            ['name' => 'News', 'description' => 'Up-to-date information on current events'],
            ['name' => 'Interviews', 'description' => 'Conversations with experts or influencers'],
            ['name' => 'Tips', 'description' => 'Recommendations and suggestions to solve problems'],
            ['name' => 'Inspiration', 'description' => 'Motivational stories, quotes, and reflections'],
            ['name' => 'Humor', 'description' => 'Funny and entertaining content'],
            ['name' => 'Lifestyle', 'description' => 'Tips for improving quality of life'],
            ['name' => 'Travel', 'description' => 'Travel guides, destinations, and travel experiences'],
            ['name' => 'Health and wellness', 'description' => 'Tips for a healthy life'],
            ['name' => 'Technology', 'description' => 'News and advancements in the world of technology'],
            ['name' => 'Finance', 'description' => 'Tips for managing money and saving'],
            ['name' => 'Cooking', 'description' => 'Recipes, ingredients, and cooking techniques'],
            ['name' => 'Fashion', 'description' => 'Fashion trends, style, and beauty'],
        ];
    
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
