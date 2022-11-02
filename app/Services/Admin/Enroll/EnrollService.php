<?php

namespace App\Services\Admin\Enroll;

use App\Contracts\Dao\Admin\Enroll\EnrollDaoInterface;
use App\Contracts\Services\Admin\Enroll\EnrollServiceInterface;
use App\Exports\PaymentExport;
use App\Http\Requests\ImportRequest;
use App\Imports\PaymentImport;
use App\Mail\EnrollMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class EnrollService implements EnrollServiceInterface
{
    /**
     * $enrollDao
     */
    private $enrollDao;

    /**
     * Create new Dao instance
     * @return void
     */
    public function __construct(EnrollDaoInterface $enrollDaoInterface)
    {
        $this->enrollDao = $enrollDaoInterface;
    }

    /**
     * @return Object $enrolls
     */
    public function index()
    {
        return $this->enrollDao->index();
    }

    /**
     * to change status accpeted
     * send mail to user
     * @param $id
     */
    public function accepted($id)
    {
        $enroll = $this->enrollDao->accepted($id);
        Mail::to($enroll->user->email)->send(new EnrollMail($enroll));
        return $enroll;
    }

    /**
     * To delete enroll
     * @param $id
     */
    public function delete($id)
    {
        return $this->enrollDao->delete($id);
    }

    /**
     * to export payment excel
     */
    public function exportPayment()
    {
        return Excel::download(new PaymentExport, 'paymentlist.xlsx');
    }

    /**
     * @param ImportRequest $request
     */
    public function importPayment(ImportRequest $request)
    {
        $start = new PaymentImport;
        Excel::import($start, $request->file);
    }
}
