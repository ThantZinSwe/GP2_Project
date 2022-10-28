<?php

namespace App\Contracts\Services\Admin\Blog;

use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for blog
 */
interface BlogServiceInterface
{
     /**
     * To save blog
     * @param int $request
     * @return Object Blog
     */
    public function blogSave(BlogRequest $request);

      /**
   * To edit blog
   * @param string $slug
   * @return Object Blog
   */
    public function blogEdit($slug);

     /**
   * To update blog
   * @param string $slug and $request
   * @return Object Blog
   */
    public function blogUpdate(Request $request, $slug);

     /**
   * To delete blog
   * @param string $slug
   * @return Object Blog
   */
    public function blogDelete($slug);

}
