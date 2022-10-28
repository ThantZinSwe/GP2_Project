<?php

namespace App\Services\Admin\CodeLanguage;

use App\Contracts\Dao\Admin\CodeLanguage\CodeLanguageDaoInterface;
use App\Contracts\Services\Admin\CodeLanguage\CodeLanguageServiceInterface;
use Illuminate\Http\Request;

class CodeLanguageService implements CodeLanguageServiceInterface{
  /**
   * language dao
   */
  private $languageDao;
  /**
   * Class Constructor
   * @param LanguageDaoInterface
   * @return
   */
  public function __construct(CodeLanguageDaoInterface $languageDao)
  {
    $this->languageDao = $languageDao;
  }
 
  /**
   * To save language
   *
   * @param Request $request
   * @return void
   */
  public function saveLanguage(Request $request){
    return $this->languageDao->saveLanguage($request);
  }
  /**
   * To get all language
   *
   * @return language list
   */
  public function getLanguageList(){
    return $this->languageDao->getLanguageList();
  }
  /**
   * To update language by slug
   *
   * @param [type] $slug
   * @param Request $request
   * @return void
   */
  public function updateLanguageBySlug($slug,Request $request){
    return $this->languageDao->updateLanguageBySlug($slug,$request);
  }
  /**
   * To delete language by slug
   *
   * @param [type] $slug
   * @return void
   */
  public function deleteLanguageBySlug($slug){
    return $this->languageDao->deleteLanguageBySlug($slug);
  }
  /**
   * To select language by slug
   *
   * @param [type] $slug
   * @return void
   */
  public function getLanguageBySlug($slug){
    return $this->languageDao->getLanguageBySlug($slug);
  }
}