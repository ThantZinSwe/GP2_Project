<?php

namespace App\Services\Admin\Lan;

use App\Contracts\Dao\Admin\Lan\LanDaoInterface;
use App\Contracts\Services\Admin\Lan\LanServiceInterface;
use App\Http\Requests\LanguageStoreRequest;
use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for role
 */
class LanService implements LanServiceInterface
{
    private $lanDao;
    /**
     * Class Constructor
     * @param LanDaoInterface
     * @return
     */
    public function __construct(LanDaoInterface $lanDao)
    {
        $this->lanDao = $lanDao;
    }
    /**
   * To save language
   *
   * @param Request $request
   * @return void
   */
  public function saveLanguage(LanguageStoreRequest $request){
    return $this->lanDao->saveLanguage($request);
  }
  /**
   * To get all language
   *
   * @return language list
   */
  public function getLanguageList(){
    return $this->lanDao->getLanguageList();
  }
  /**
   * To update language by slug
   *
   * @param [type] $slug
   * @param Request $request
   * @return void
   */
  public function updateLanguageBySlug($slug,LanguageStoreRequest $request){
    return $this->lanDao->updateLanguageBySlug($slug,$request);
  }
  /**
   * To delete language by slug
   *
   * @param [type] $slug
   * @return void
   */
  public function deleteLanguageBySlug($slug){
    return $this->lanDao->deleteLanguageBySlug($slug);
  }
  /**
   * To select language by slug
   *
   * @param [type] $slug
   * @return void
   */
  public function getLanguageBySlug($slug){
    return $this->lanDao->getLanguageBySlug($slug);
  }
   
}
