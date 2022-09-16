@extends('template')
@section('content')
    <div class="section-body">
        <h2 class="section-title">{{ $page_title }}</h2>
        <p class="section-lead">{{ $page_desc }}</p>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Data Master Customer</h4>
                        <a class="btn btn-info" href="{{ route('customer.create') }}"><i class="fas fa-plus-square"></i> Tambah</a>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered color-table info-table display responsive nowrap" id="data_table_customer" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode Customer</th>
                                    <th>Nama Customer</th>
                                    <th>Alamat</th>
                                    <th>Nama Kontak</th>
                                    <th>No. Kontak</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $customers)
                                        <tr>
                                            <td class="text-center">{{ $customers->kode_customer }}</td>
                                            <td>{{ $customers->nama_customer }}</td>
                                            <td>{{ $customers->alamat }}</td>
                                            <td>{{ $customers->contact_name }}</td>
                                            <td>{{ $customers->contact_no }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('customer.edit', $customers->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
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

            $('#data_table_customer').DataTable({
                rowReorder: true,
                responsive: true
            });
        });
    </script>
@endsection
