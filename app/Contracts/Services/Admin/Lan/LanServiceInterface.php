<?php

namespace App\Contracts\Services\Admin\Lan;

use App\Http\Requests\LanguageStoreRequest;

/**
 * Interface of Data Access Object for user
 */
interface LanServiceInterface
{
    /**
     * To save language
     * @param int $request
     * @return Object language
     */
     /**
     * To save language
     * @param int $request
     * @return void
     */
    public function saveLanguage(LanguageStoreRequest $request);
    /**
     * To get language list
     *
     * @return object Language
     */
    public function getLanguageList();
    /**
     * To get language by slug
     *
     * @param [type] $slug to find with slug
     * @return object language
     */
    public function getLanguageBySlug($slug);
    /**
     * To update language by slug
     *
     * @param [type] $slug
     * @param languageStoreRequest $request
     * @return void
     */
    public function updateLanguageBySlug($slug,languageStoreRequest $request);
    /**
     * To delete language by slug
     *
     * @param [type] $slug
     * @return void
     */
    public function deleteLanguageBySlug($slug);

}
