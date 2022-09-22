@extends('template')
@section('content')
    <div class="section-body">
        <h2 class="section-title">{{ $page_title }}</h2>
        <p class="section-lead">{{ $page_desc }}</p>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Customer</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Kode Customer</label>
                                <input type="text" class="form-control" id="kode_customer" name="kode_customer" maxlength="10" value="{{ $customer->kode_customer }}" placeholder="AUTO" readonly>
                                @if($errors->has('kode_customer'))
                                    <p class="text-danger">{{ $errors->first('kode_customer') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama Customer</label>
                                <input type="text" class="form-control" id="nama_customer" name="nama_customer" maxlength="255" value="{{ $customer->nama_customer }}">
                                @if($errors->has('nama_customer'))
                                    <p class="text-danger">{{ $errors->first('nama_customer') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" maxlength="255" value="{{ $customer->alamat }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Kontak</label>
                                <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" maxlength="255" value="{{ $customer->nama_kontak }}">
                            </div>
                            <div class="form-group">
                                <label>Nomor Kontak</label>
                                <input type="text" class="form-control" id="nomor_kontak" name="nomor_kontak" maxlength="255" value="{{ $customer->nomor_kontak }}">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
