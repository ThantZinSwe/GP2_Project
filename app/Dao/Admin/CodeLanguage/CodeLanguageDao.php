<?php

namespace App\Dao\Admin\Language;

use App\Contracts\Dao\Admin\CodeLanguage\CodeLanguageDaoInterface;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Data accessing object for post
 */
class CodeLanguageDao implements CodeLanguageDaoInterface{
  /**
   * To save language
   *
   * @param Request $request
   * @return void
   */
  public function saveLanguage(Request $request){
    $language = new Language();
    $slug = Str::slug($request->name);
    $language->slug = $slug;
    $language->name = $request->name;
    $language->save();
    return $language;
  }
  /**
   * To get all language
   *
   * @return language list
   */
  public function getLanguageList(){
    $languages = Language::all();
    return $languages;
  }
  /**
   * To update language by slug
   *
   * @param [type] $slug
   * @param Request $request
   * @return void
   */
  public function updateLanguageBySlug($slug,Request $request){
    $language = Language::where('slug',$slug)->first();
    
    $slug = Str::slug($request->name);
    $language->slug = $slug;
    $language->name = $request->name;
    $language->save();
    return $language;
  }
  /**
   * To delete language by slug
   *
   * @param [type] $slug
   * @return void
   */
  public function deleteLanguageBySlug($slug){
    Language::where('slug',$slug)->delete();
    return true;
  }
  /**
   * To get language by slug
   *
   * @param [type] $slug
   * @return void
   */
  public function getLanguageBySlug($slug){
    $language = Language::where('slug',$slug)->first();
    return $language;
  }
}