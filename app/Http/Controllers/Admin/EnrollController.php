<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Enroll\EnrollServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;

class EnrollController extends Controller
{

    /**
     * $enrollInterface
     */
    private $enrollInterface;

    public function __construct(EnrollServiceInterface $enrollServiceInterface)
    {
        $this->enrollInterface = $enrollServiceInterface;
    }

    /**
     * Show Enroll List
     * @return View admin/enroll
     * @return Object $enrolls
     */
    public function index()
    {
        $enrolls = $this->enrollInterface->index();
        return view('admin.enroll.index', compact('enrolls'));
    }

    /**
     * status chage pending to accepted
     * send mail
     * @param $id
     */
    public function accepted($id)
    {
        $this->enrollInterface->accepted($id);
        return back()->with(['success' => 'Status Accepted and mail send successfully']);
    }

    /**
     * To delete enroll
     * @param $id
     */
    public function delete($id)
    {
        $this->enrollInterface->delete($id);
        return back()->with(['success' => 'Enroll deleted successfully']);
    }

    /**
     * @return View admin/enroll/import
     */
    public function import()
    {
        return view('admin.enroll.importpayment');
    }

    /**
     * @return View admin/enroll
     * @return Object $export
     */
    public function exportPayment()
    {
        $export = $this->enrollInterface->exportPayment();
        return $export;
    }

    /**
     * @param ImportRequest $request
     * @return View admin/enroll
     */
    public function importPayment(ImportRequest $request)
    {
        $export = $this->enrollInterface->importPayment($request);
        return redirect('/admin/enroll')->with(['success' => 'Import Payment successfully']);
    }

}
