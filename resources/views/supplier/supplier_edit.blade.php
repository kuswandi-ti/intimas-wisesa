@extends('template')
@section('content')
    <div class="section-body">
        <h2 class="section-title">{{ $page_title }}</h2>
        <p class="section-lead">{{ $page_desc }}</p>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Supplier</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Kode Supplier</label>
                                <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" maxlength="10" value="{{ $supplier->kode_supplier }}" placeholder="AUTO" readonly>
                                @if($errors->has('kode_supplier'))
                                    <p class="text-danger">{{ $errors->first('kode_supplier') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" maxlength="255" value="{{ $supplier->nama_supplier }}">
                                @if($errors->has('nama_supplier'))
                                    <p class="text-danger">{{ $errors->first('nama_supplier') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" maxlength="255" value="{{ $supplier->alamat }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Kontak</label>
                                <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" maxlength="255" value="{{ $supplier->nama_kontak }}">
                            </div>
                            <div class="form-group">
                                <label>Nomor Kontak</label>
                                <input type="text" class="form-control" id="nomor_kontak" name="nomor_kontak" maxlength="255" value="{{ $supplier->nomor_kontak }}">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
