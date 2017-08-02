<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;

class AdminController extends ApiController
{
    protected $post;

    protected $comment;

    public function __construct(PostRepository $post, CommentRepository $comment)
    {
    	$this->post = $post;
    	$this->comment = $comment;
    }

    public function statistics()
    {
    	$postsCount = $this->post->getPostCount();
    	$commentsCount = $this->comment->getUnreadCommentCount();
    	return ['post_count' => $postsCount, 'unread_comment_count' => $commentsCount];
    }
}
