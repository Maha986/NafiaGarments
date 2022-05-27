<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\CustomerUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customers.index',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> ['required', 'max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'area'=> ['required', 'string', 'max:255'],
            'contact'=> ['required','numeric', 'digits:11'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'messaging_service_no'=> 'nullable|string|max:255',
            'messaging_service_name'=> 'nullable|string|max:255',
            'social_media_name_1'=> 'nullable|string|max:255',
            'link_1'=> 'nullable|string|max:255',
            'social_media_name_2'=> 'nullable|string|max:255',
            'link_2'=> 'nullable|string|max:255',
            'status'=> 'required',
        ]);

        $customer = new Customer();

        $customer->name = $request->get('name');
        $customer->city = $request->get('city');
        $customer->area = $request->get('area');
        $customer->contact = $request->get('contact');
        $customer->email = $request->get('email');
        $customer->messaging_service_no = $request->get('messaging_service_no');
        $customer->messaging_service_name = $request->get('messaging_service_name');
        $customer->social_media_name_1 = $request->get('social_media_name_1');
        $customer->link_1 = $request->get('link_1');
        $customer->social_media_name_2 = $request->get('social_media_name_2');
        $customer->link_2 = $request->get('link_2');
        $customer->status = $request->get('status');

        $customer->save();

        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->password);
        $user->o_auth = $request->password;

        $user->assignRole('customer');

        $user->save();

        $userId = $user->id;


        $customer->users()->attach($userId);

        Session::flash('message','Customer Added Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('customer.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer_user = Customer::with(['users'])->where('id',$customer->id)->first();
        $user = $customer_user->users()->first();

        $request->validate([
            'name'=> ['required', 'max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'area'=> ['required', 'string', 'max:255'],
            'contact'=> ['required','numeric', 'digits:11'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:5'],
            'messaging_service_no'=> 'nullable|string|max:255',
            'messaging_service_name'=> 'nullable|string|max:255',
            'social_media_name_1'=> 'nullable|string|max:255',
            'link_1'=> 'nullable|string|max:255',
            'social_media_name_2'=> 'nullable|string|max:255',
            'link_2'=> 'nullable|string|max:255',
            'status'=> 'required',
        ]);

        $customer->name = $request->get('name');
        $customer->city = $request->get('city');
        $customer->area = $request->get('area');
        $customer->contact = $request->get('contact');
        $customer->email = $request->get('email');
        $customer->messaging_service_no = $request->get('messaging_service_no');
        $customer->messaging_service_name = $request->get('messaging_service_name');
        $customer->social_media_name_1 = $request->get('social_media_name_1');
        $customer->link_1 = $request->get('link_1');
        $customer->social_media_name_2 = $request->get('social_media_name_2');
        $customer->link_2 = $request->get('link_2');
        $customer->status = $request->get('status');

        $customer->save();

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if (!empty($request->password)){
            $user->password = Hash::make($request->password);
            $user->o_auth = $request->password;
        }

        $user->save();

        $userId = $user->id;

        $customer->users()->detach();
        $customer->users()->attach($userId);

        Session::flash('message','Customer Updated Successfully');
        Session::flash('alert-type','success');

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer_user = Customer::with(['users'])->where('id',$customer->id)->first();
        $user = $customer_user->users()->first();

        $customer->users()->detach();

        $user->delete();
        $customer->delete();


        Session::flash('message','Customer Deleted Successfully');
        Session::flash('alert-type','success');
        return redirect()->route('customer.index');
    }
}
