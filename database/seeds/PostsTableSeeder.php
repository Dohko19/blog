<?php

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
    	Post::truncate();
    	Category::truncate();
        Tag::truncate();

    	$category = new Category;
    	$category->name = "Categoria 1";
    	$category->save();

    	$category = new Category;
    	$category->name = "Categoria 2";
    	$category->save();

        $post = new Post;
        $post->title = "Mi primer Post";
        $post->url = str_slug("Mi primer Post");
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Cuerpo de mi Primer post</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 1']));

        $post = new Post;
        $post->title = "Mi Segundo Post";
        $post->url = str_slug("Mi Segundo Post");
        $post->excerpt = "Extracto de mi Segundo post";
        $post->body = "<p>Cuerpo de mi Segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 2']));

        $post = new Post;
        $post->title = "Mi Tercer Post";
        $post->url = str_slug("Mi Tercer Post");
        $post->excerpt = "Extracto de mi Tercer post";
        $post->body = "<p>Cuerpo de mi Tercer post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 3']));

        $post = new Post;
        $post->title = "Mi Cuarto Post";
        $post->url = str_slug("Mi Cuarto Post");
        $post->excerpt = "Extracto de mi Cuarto post";
        $post->body = "<p>Cuerpo de mi Cuarto post</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 4']));

        $post = new Post;
        $post->title = "Mi quinto Post";
        $post->url = str_slug("Mi quinto Post");
        $post->excerpt = "Extracto de mi quinto post";
        $post->body = "<p>Cuerpo de mi quinto post</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 5']));

        $post = new Post;
        $post->title = "Mi sexto Post";
        $post->url = str_slug("Mi sexto Post");
        $post->excerpt = "Extracto de mi sexto post";
        $post->body = "<p>Cuerpo de mi sexto post</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 6']));

        $post = new Post;
        $post->title = "Mi septimo Post";
        $post->url = str_slug("Mi septimo Post");
        $post->excerpt = "Extracto de mi septimo post";
        $post->body = "<p>Cuerpo de mi septimo post</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 7']));
    }
}
