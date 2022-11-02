<?php

namespace App\Services\Admin\Enroll;

use App\Contracts\Dao\Admin\Enroll\EnrollDaoInterface;
use App\Contracts\Services\Admin\Enroll\EnrollServiceInterface;
use App\Exports\PaymentExport;
use App\Http\Requests\ImportRequest;
use App\Imports\PaymentImport;
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
     */
    public function accepted($id)
    {
        return $this->enrollDao->accepted($id);
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
