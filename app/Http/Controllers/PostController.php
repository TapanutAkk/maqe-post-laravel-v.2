<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Post;
use App\Author;

class PostController extends Controller
{

    const DATA_POST = Post::DATA;
    const DATA_AUTHOR = Author::DATA;

    public $posts;

    public function __construct(){

        date_default_timezone_set('Asia/Bangkok');

        $this->getPosts();

    }

    public function page($id){

        $posts = $this->posts;

        $page = $this->findFirstAndFinalPostPerEachPage($id, count($posts));

        return view('post.index', compact('posts','page'));

    }

    private function getPosts(){
        $posts = collect(self::DATA_POST);
        $new_posts = [];
        $authors = collect(self::DATA_AUTHOR);

        foreach ($posts as $post){

            $today = date("Y-m-d H:i:s");
            $date1 = date_create($post['created_at']);
            $date2 = date_create($today);
            $date1=date_create("2012-11-1");
            $date2=date_create("2013-12-12");
            $range_date = date_diff($date1,$date2);

            $last_date = $range_date->y.' years ago';
            if($range_date->y <= 0){
                $last_date = $range_date->m.' months ago';
                if($range_date->m <= 0){
                    $last_date = $range_date->d.' days ago';
                    if($range_date->d >= 7){
                        $last_date = ceil($range_date->d/7).' weeks ago';
                    }
                    if($range_date->d <= 0){
                        $last_date = 'today';
                    }
                }
            }

            $post['last_date'] = $last_date;

            $author = $authors->where('id', $post['author_id'])->first();
            if(!empty($author)){
                $post['author_name'] = $author['name'];
                $post['author_role'] = $author['role'];
                $post['author_place'] = $author['place'];
                $post['author_avatar_url'] = $author['avatar_url'];
            }

            array_push($new_posts, $post);

        }

        $this->posts = $new_posts;

    }

    private function findFirstAndFinalPostPerEachPage($id, $count_post){

        $finalPost = $id*8;
        $firstPost = $finalPost-7;

        if($finalPost > $count_post){
            $finalPost = $count_post;
        }

        return [
            'first' => $firstPost,
            'now' => $id,
            'final' => $finalPost
        ];

    }
}
