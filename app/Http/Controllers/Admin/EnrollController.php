<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Enroll\EnrollServiceInterface;
use App\Http\Controllers\Controller;

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
}
