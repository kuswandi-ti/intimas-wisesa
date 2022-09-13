@extends('template')
@section('content')
    <div class="section-body">
        <h2 class="section-title">{{ $page_title }}</h2>
        <p class="section-lead">{{ $page_desc }}</p>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Data Master Barang</h4>
                        <a class="btn btn-info" href="{{ route('barang.create') }}"><i class="fas fa-plus-square"></i> Tambah</a>
                    </div>

                    <div class="card-body">
                        <form class="form-row">
                            @csrf
                            <div class="form-group col-md-8">
                                <input type="file" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-dark btn-block">Import Data</button>
                            </div>
                            <div class="form-group col-md-2">
                                <a href="{{ asset('assets/file/template.xlsx') }}" class="btn btn-outline-info btn-block">Download Template</a>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_barang" cellspacing="0" width="100%">
                                <tr>
                                    <th width="10%" class="text-center">Kode Barang</th>
                                    <th width="20%">Nama Barang</th>
                                    <th width="50%">Deskripsi</th>
                                    <th width="20%" class="text-center">Action</th>
                                </tr>
                                @if($barang->count() == 0)
                                    <tr>
                                        <td class="text-center text-danger" colspan="4"><strong>Tidak Ada Data</strong></td>
                                    </tr>
                                @else
                                    @foreach ($barang as $barangs)
                                        <tr>
                                            <td class="text-center">{{ $barangs->kode_barang }}</td>
                                            <td>{{ $barangs->nama_barang }}</td>
                                            <td>{{ $barangs->deskripsi }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('barang.destroy', $barangs->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('barang.edit', $barangs->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_file')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
