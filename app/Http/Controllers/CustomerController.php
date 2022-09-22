<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'List Data Master Customer';
        $page_desc  = 'Halaman List Data Master Customer';
        $breadcrumb = 'Master Customer';

        $customer = Customer::all();

        return view('customer.customer_list', compact('page_title', 'page_desc', 'breadcrumb', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah Data Master Customer';
        $page_desc  = 'Halaman Tambah Data Master Customer';
        $breadcrumb = 'Master Customer';

        return view('customer.customer_add', compact('page_title', 'page_desc', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_customer' => 'required',
        ];

        $messages = [
            'nama_customer.required' => 'Nama Customer harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $code = Helper::create_code('customer');

        $customer = new Customer();

        $customer->kode_customer    = $code;
        $customer->nama_customer    = $request->nama_customer;
        $customer->alamat           = $request->alamat;
        $customer->nama_kontak      = $request->nama_kontak;
        $customer->nomor_kontak     = $request->nomor_kontak;

        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Data Customer berhasil disimpan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $page_title = 'Edit Data Master Customer';
        $page_desc  = 'Halaman Edit Data Master Customer';
        $breadcrumb = 'Master Customer';

        return view('customer.customer_edit', compact('page_title', 'page_desc', 'breadcrumb', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [
            'nama_customer' => 'required',
        ];

        $messages = [
            'nama_customer.required' => 'Nama Customer harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Data Customer berhasil disimpan !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Data Customer berhasil dihapus !!!');
    }
}
