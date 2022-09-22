@extends('template')
@section('content')
    <div class="section-body">
        <h2 class="section-title">{{ $page_title }}</h2>
        <p class="section-lead">{{ $page_desc }}</p>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            <h4>List Data Master Supplier</h4>
                            <a class="btn btn-info" href="{{ route('supplier.create') }}"><i class="fas fa-plus-square"></i> Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_supplier" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode Supplier</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th class="text-center">Nama Kontak</th>
                                        <th class="text-center">Nomor Kontak</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplier as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->kode_supplier }}</td>
                                            <td>{{ $row->nama_supplier }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td class="text-center">{{ $row->nama_kontak }}</td>
                                            <td class="text-center">{{ $row->nomor_kontak }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('supplier.destroy', $row->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('supplier.edit', $row->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
        });

        $('#data_table_supplier').DataTable({
            rowReorder: true,
            responsive: true
        });
    </script>
@endsection
