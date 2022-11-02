<?php

namespace App\Services\Admin\Enroll;

use App\Contracts\Dao\Admin\Enroll\EnrollDaoInterface;
use App\Contracts\Services\Admin\Enroll\EnrollServiceInterface;
use App\Mail\EnrollMail;
use Illuminate\Support\Facades\Mail;

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
}
