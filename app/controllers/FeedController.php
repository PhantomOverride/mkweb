<?php
class FeedController extends BaseController{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(){
        $posts = $this->post->orderBy('id','desc')->get();
        return View::make('rss_feed', ['posts' => $posts]);
    }
}
?>