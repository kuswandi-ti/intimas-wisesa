<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'List Data Master Supplier';
        $page_desc  = 'Halaman List Data Master Supplier';
        $breadcrumb = 'Master Supplier';

        $supplier = Supplier::all();

        return view('supplier.supplier_list', compact('page_title', 'page_desc', 'breadcrumb', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah Data Master Supplier';
        $page_desc  = 'Halaman Tambah Data Master Supplier';
        $breadcrumb = 'Master Supplier';

        return view('supplier.supplier_add', compact('page_title', 'page_desc', 'breadcrumb'));
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
            'nama_supplier' => 'required',
        ];

        $message = [
            'nama_supplier.required' => 'Nama Supplier harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $code = Helper::create_code("supplier");

        $supplier = new Supplier();

        $supplier->kode_supplier    = $code;
        $supplier->nama_supplier    = $request->nama_supplier;
        $supplier->alamat           = $request->alamat;
        $supplier->nama_kontak      = $request->nama_kontak;
        $supplier->nomor_kontak     = $request->nomor_kontak;

        $supplier->save();

        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil disimpan !!!');
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
    public function edit(Supplier $supplier)
    {
        $page_title = 'Edit Data Master Supplier';
        $page_desc  = 'Halaman Edit Data Master Supplier';
        $breadcrumb = 'Master Supplier';

        return view('supplier.supplier_edit', compact('page_title', 'page_desc', 'breadcrumb', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'nama_supplier' => 'required',
        ];

        $message = [
            'nama_supplier.required' => 'Nama Supplier harus diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil disimpan !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil disimpan !!!');
    }
}
