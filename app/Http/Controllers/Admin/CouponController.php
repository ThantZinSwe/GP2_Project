<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Coupon\CouponServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\CouponUpdateRequest;
use App\Models\coupon;
use App\Models\Course;
use App\Models\UserCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    private $couponInterface;
    public function __construct(CouponServiceInterface $couponServiceInterface)
    {
        $this->couponInterface = $couponServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->couponInterface->index();
        return view('admin.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $coupon = $this->couponInterface->store($request);
        if($coupon){
            return redirect()->route('admin.coupon.index')->with('success', 'Coupon Created Successfully');
        }
        return redirect()->route('admin.coupon.index')->with('error', 'Coupon Created Fail');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = $this->couponInterface->edit($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponUpdateRequest $request, $id)
    {
        $coupon = $this->couponInterface->update($request, $id);
        if($coupon){
            return redirect()->route('admin.coupon.index')->with('success', 'Coupon Updated Successfully');
        }
        return redirect()->route('admin.coupon.index')->with('error', 'Coupon Updated Fail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $coupon = $this->couponInterface->delete($id);
        if($coupon){
            return redirect()->route('admin.coupon.index')->with('success', 'Coupon Deleted Successfully');
        }
        return redirect()->route('admin.coupon.index')->with('error', 'Coupon Deleted Fail');
    }
    public function calculateCoupon(Request $request){
        $coupon = $this->couponInterface->calculateCoupon($request);
        if($coupon){
            return response()->json(['status'=>'success', 'price'=>$coupon['total-price']]);
        }else {
            return response()->json(['status'=>'error', 'message'=>'not available coupon!']);
        }
    }
}
