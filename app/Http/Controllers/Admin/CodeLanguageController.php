<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Lan\LanServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageStoreRequest;

class CodeLanguageController extends Controller
{
    /**
     * language interface
     */
    private $languageInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LanServiceInterface $lanServiceInterface)
    {
        $this->languageInterface = $lanServiceInterface;
    }

    /**
     * To get all languages
     *
     * @return languages list view
     */
    public function index()
    {
        $languages = $this->languageInterface->getLanguageList();
        return view('admin.language.index', ['languages' => $languages]);
    }

    /**
     * To show language creat form
     *
     * @return language create form view
     */
    public function showCreateForm()
    {
        return view('admin.language.create');
    }

    /**
     * To store created language
     *
     * @param validated request language
     * @return language list
     */
    public function create(LanguageStoreRequest $request)
    {
        $this->languageInterface->saveLanguage($request);
        return redirect()->route('admin.language.list')->with(['success' => 'Language created successfully']);

    }

    /**
     * To show update Form view
     *
     * @param  $slug  get language to update
     * @return update form view
     */
    public function showUpdateForm($slug)
    {
        $language = $this->languageInterface->getLanguageBySlug($slug);
        return view('admin.language.edit', ['language' => $language]);
    }

    /**
     * To store updated language
     *
     * @param  $slug
     * @param validated  $request
     * @return language list view
     */
    public function update($slug, LanguageStoreRequest $languageStoreRequest)
    {
        $this->languageInterface->updateLanguageBySlug($slug, $languageStoreRequest);
        return redirect()->route('admin.language.list')->with(['success' => 'Language updated successfully']);
    }

    /**
     * To delete language
     *
     * @param [type] $slug
     * @return language list view
     */
    public function delete($slug)
    {
        $this->languageInterface->deleteLanguageBySlug($slug);
        return redirect()->route('admin.language.list')->with(['success' => 'Course deleted successfully']);
    }
}
