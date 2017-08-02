<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Http\Controllers\Controller;

class ArchiveController extends ApiController
{
    /**
     * @var CategoryRepository
     */
    protected $category;

    /**
     * @var TagRepository
     */
    protected $tag;

    /**
     * @var PostRepository
     */
    protected $post;

    /**
     * CategoryController Constructor
     *
     * @param CategoryRepository $category
     * @param TagRepository $tag
     * @param PostRepository $post
     */
    public function __construct(CategoryRepository $category, TagRepository $tag, PostRepository $post)
    {
    	$this->category = $category;
    	$this->tag = $tag;
    	$this->post = $post;
    }

    /**
     * Get all categories
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function categories()
    {
    	return $this->category->all();
    }

    /**
     * Get posts on specific category
     *
     * @param $name
     * @return array|\Illuminate\Support\Collection
     */
    public function getPostsByCategory($name)
    {
    	return $this->category->getPostsByName($name);
    }

    /**
     * Get all tags
     *
     * @return \Illuminate\Support\Collection
     */
    public function tags()
    {
    	return $this->tag->all();
    }

    /**
     * Get posts by give tag
     *
     * @param $name
     * @return array|\Illuminate\Support\Collection
     */
    public function getPostsByTag($name)
    {
    	return $this->tag->getPostsByTag($name);
    }

    /**
     * Group posts according to year/month posted
     *
     * @return array
     */
    public function getExistDates()
    {
    	return $this->post->groupDates();
    }

    public function getPostsByDate($date)
    {
    	return $this->post->getPostsByYearMonth($date);
    }
}
