<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	        //Creates categories
	        factory(App\Models\Category::class, 5)->create()->each(function ($category) {
	        	//Create posts and relations between
	        	$category->posts()->saveMany(factory(App\Models\Post::class, 5)->create()->each(function ($post) {
	        		//Create comments
	        		$post->comments()->saveMany(factory(App\Models\Comment::class, 2)->create()
	        		);
	        		//Create tags
	        		$post->tags()->sync(factory(App\Models\Tag::class, 2)->create()->pluck('id')->toArray()
	        		);
	        	})
	        );
        });

	    //For friend links
	    factory(App\Models\Link::class, 5)->create();
    }
}
