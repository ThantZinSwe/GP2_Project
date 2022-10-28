<?php

namespace App\Services\Admin\Blog;

use App\Contracts\Dao\Admin\Blog\BlogDaoInterface;
use App\Contracts\Services\Admin\Blog\BlogServiceInterface;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;


/**
 * Interface of Data Access Object for blog
 */
class BlogService implements BlogServiceInterface
{
    private $blogDao;
    /**
     * Class Constructor
     * @param BlogDaoInterface
     * @return
     */
    public function __construct(BlogDaoInterface $blogDao)
    {
        $this->blogDao = $blogDao;
    }

    /**
   * To save blog
   * @param int $request
   * @return Object Blog
   */
    public function blogSave(BlogRequest $request){
        return $this->blogDao->blogSave($request);
    }

    /**
   * To edit blog
   * @param string $slug
   * @return Object Blog
   */
    public function blogEdit($slug)
    {
        return $this->blogDao->blogEdit($slug);
    }

     /**
   * To update blog
   * @param string $slug and $request
   * @return Object Blog
   */
    public function blogUpdate(Request $request, $slug){
        return $this->blogDao->blogUpdate($request, $slug);
    }

     /**
   * To delete blog
   * @param string $slug
   * @return Object Blog
   */
    public function blogDelete($slug){
        return $this->blogDao->blogDelete($slug);
    }
    
}
