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
                        <form action="/import_barang" method="post" enctype="multipart/form-data" class="form-row" id="form_import">
                            <div class="input-group mb-3">
                                <input type="file" name="file" id="file" class="form-control">
                                <button
                                    class="btn btn-dark button-loader"
                                    type="submit"
                                    id="btn_import"
                                    data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading...">Import Data Excel </button>
                                &nbsp;
                                <a href="{{ asset('assets/file/template.xlsx') }}" class="btn btn-outline-info">Download Template</a>
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
                            <table class="table table-hover table-striped table-bordered color-table info-table display responsive nowrap" id="data_table_barang" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Deskripsi</th>
                                        <th>Customer</th>
                                        <th>Supplier</th>
                                        <th>Satuan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($barang->count() == 0)
                                        <tr>
                                            <td class="text-center text-danger" colspan="7"><strong>Tidak Ada Data</strong></td>
                                        </tr>
                                    @else
                                        @foreach ($barang as $barangs)
                                            <tr>
                                                <td class="text-center">{{ $barangs->kode_barang }}</td>
                                                <td>{{ $barangs->nama_barang }}</td>
                                                <td>{{ $barangs->deskripsi }}</td>
                                                <td>{{ $barangs->nama_customer }}</td>
                                                <td>{{ $barangs->nama_supplier }}</td>
                                                <td>{{ $barangs->satuan }}</td>
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
                                </tbody>
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

            $('#data_table_barang').DataTable({
                rowReorder: true,
                responsive: true
            });

            $('#btn_import').click(function(event) {
                event.preventDefault();

                if ($('#file').val() == '') {
                    alert("Silahkan pilih filenya terlebih dahulu !!!");
                    return;
                }

                var form = $('#form_import')[0];
                var data = new FormData(form);

                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "/import_barang",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function () {
                        $('.button-loader').button('loading');
                    },
                    success: function (data) {
                        $('.button-loader').button('reset');
                        location.reload(true);
                    },
                    error: function (e) {
                        alert("Error");
                    },
                    complete: function () {
                        $('.button-loader').button('reset');
                    },
                });
            });
        });
    </script>
@endsection
