@extends('template')
@section('content')
    <div class="section-body">
        <h2 class="section-title">{{ $page_title }}</h2>
        <p class="section-lead">{{ $page_desc }}</p>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Data Transaksi Barang Masuk</h4>
                        <a class="btn btn-info" href="{{ route('barangmasuk_createhdr') }}"><i class="fas fa-plus-square"></i> Tambah</a>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered color-table info-table display responsive nowrap" id="data_barang_masuk" width="100%">
                                <thead>
                                    <tr>
                                        <th width="10%" class="text-center">No. Dokumen</th>
                                        <th width="20%" class="text-center">Tgl. Dokumen (yyyy-mm-dd)</th>
                                        <th width="50%">Keterangan</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($barang_masuk_hdr->count() == 0)
                                        <tr>
                                            <td class="text-center text-danger" colspan="4"><strong>Tidak Ada Data</strong></td>
                                        </tr>
                                    @else
                                        @foreach ($barang_masuk_hdr as $bm_hdr)
                                            <tr>
                                                <td class="text-center">{{ $bm_hdr->no_dokumen }}</td>
                                                <td class="text-center">{{ $bm_hdr->tgl_dokumen }}</td>
                                                <td>{{ $bm_hdr->keterangan }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('barangmasuk_edit', $bm_hdr->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    <a class="btn btn-outline-danger btn-sm" href="#"><i class="fas fa-print"></i> Print</a>
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

            $('#data_barang_masuk').DataTable({
                rowReorder: true,
                responsive: true
            });
        });
    </script>
@endsection
