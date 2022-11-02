<?php

namespace App\Dao\Admin\Enroll;

use App\Contracts\Dao\Admin\Enroll\EnrollDaoInterface;
use App\Models\Payment;

class EnrollDao implements EnrollDaoInterface
{
    /**
     * @return Object $enrolls
     */
    public function index()
    {
        $enrolls = Payment::with('user', 'course')
            ->orderBy('id', 'desc')
            ->get();

        return $enrolls;
    }

    /**
     * to change status accpeted
     */
    public function accepted($id)
    {
        $enroll = Payment::findOrFail($id);
        $enroll->status = "accepted";
        $enroll->save();

        return $enroll;
    }

    /**
     * To delete enroll
     * @param $id
     */
    public function delete($id)
    {
        $enroll = Payment::findOrFail($id);
        $enroll->delete();

        return 'success';
    }
}
