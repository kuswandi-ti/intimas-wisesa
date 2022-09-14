@extends('template')
@section('content')
    <div class="section-body">
        <h2 class="section-title">{{ $page_title }}</h2>
        <p class="section-lead">{{ $page_desc }}</p>

        <form id="form_barangkeluar" action="{{ route('barangkeluar_updatehdr', $data_header->id) }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Barang Keluar</h4>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if($errors->has('error'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('error') }}
                                </div>
                            @endif

                            <div class="form-row">
                                <input type="hidden" class="form-control" id="id_header" name="id_header" value="{{ $data_header->id }}" readonly>

                                <div class="form-group col-md-2">
                                    <label for="no_dokumen">No. Dokumen</label>
                                    <input type="text" class="form-control" id="no_dokumen" name="no_dokumen" value="{{ $data_header->no_dokumen }}" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tgl_dokumen">Tgl Dokumen (yyyy-mm-dd)</label>
                                    <input type="text" class="form-control" id="tgl_dokumen" name="tgl_dokumen" value="{{ $data_header->tgl_dokumen }}" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $data_header->keterangan }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered" id="dynamic-row">
                                <tr>
                                    <th width="20%" class="text-center">Kode Barang</th>
                                    <th width="60%" class="text-center">Nama Barang</th>
                                    <th width="10%" class="text-center">Qty</th>
                                    <th width="10%" class="text-center">Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                    <td>
                                        &nbsp;
                                    </td>
                                    <td>
                                        &nbsp;
                                    </td>
                                    <td>
                                        <button type="button" name="action" id="dynamic-add" class="btn btn-warning btn-block"><i class="fas fa-plus-square"></i></button>
                                    </td>
                                </tr>
                            </table>

                            <a href="#" class="btn btn-icon btn-warning" id="btn_simpan" name="btn_simpan"><i class="fas fa-save"></i> Simpan Data</a>

                            <br/><br/>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped table-bordered color-table info-table" id="data_table_bm_dtl" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;" class="text-center">ID</th>
                                                    <th width="20%" class="text-center">Kode Barang</th>
                                                    <th width="60%">Nama Barang</th>
                                                    <th width="10%" class="text-center">Qty</th>
                                                    <th width="10%" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="body-data">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-icon btn-block btn-info"><i class="fas fa-save"></i> Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

            var i = 0;
            $("#dynamic-add").click(function() {
                $("#dynamic-row").append(
                    '<tr>' +
                        '<td>' +
                            '<select class="form-control kode_barang" id="kode_barang_'+i+'" name="fields['+i+'][kode_barang]">' +
                                '@foreach ($master_barang as $bm)' +
                                    '<option data-nama="{{ $bm->nama_barang }}" value="{{ $bm->kode_barang }}">{{ $bm->kode_barang }}</option>' +
                                '@endforeach' +
                            '</select>' +
                        '</td>' +
                        '<td>' +
                            '<input type="text" class="form-control" id="nama_barang_'+i+'" name="fields['+i+'][nama_barang]">' +
                        '</td>' +
                        '<td>' +
                            '<input type="text" class="form-control" id="qty_'+i+'" name="fields['+i+'][qty]">' +
                        '</td>' +
                        '<td>' +
                            '<button type="button" name="action" id="dynamic-remove" class="btn btn-danger btn-block btn-lg"><i class="fas fa-trash"></i></button>' +
                        '</td>' +
                    '</tr>'
                );
                i++;
            });

            $(document).on('click', '#dynamic-remove', function() {
                $(this).parents('tr').remove();
            });

            load_detail();

            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
            });

            /*
            https://stackoverflow.com/questions/33236798/jquery-get-selected-value-from-dynamically-generated-dropdown
             */
            $(document).on('change', '.kode_barang', function() {
                var i = 0;
                $.each($(".kode_barang option:selected"), function(){
                    const nama = $('#kode_barang_'+i+' option:selected').data('nama');
                    $('#nama_barang_'+i).val(nama);
                    i++;
                });
            });

            $("#btn_simpan").click(function(e) {
                e.preventDefault();

                var url         = '{{ url('barangkeluar/store_dtl') }}';

                $.ajax({
                    url : url,
                    method : 'POST',
                    data : $('#form_barangkeluar').serialize(),
                    success : function(response) {
                        if (response.success) {
                            load_detail();
                        } else {
                            alert("Error")
                        }
                    },
                    error : function(error) {
                        console.log(error)
                    }
                });
            });

            $('body').on('click', '#btn_hapus', function (e) {
                e.preventDefault();

                var id          = $(this).data("id");
                var url         = '{{ url('barangkeluar/destroy_dtl') }}';
                var url_delete  = url + "/" + id;

                $.ajax({
                    url : url_delete,
                    type: 'DELETE',
                    success : function(response) {
                        if (response.success) {
                            load_detail();
                        } else {
                            alert("Error")
                        }
                    },
                    error : function(error) {
                        console.log(error)
                    }
                });
            });

            function load_detail() {
                var id_header = $("input[name=id_header]").val();
                $.ajax({
                    type    : 'get',
                    url     : '{{ URL::to('barangkeluar/list_dtl') }}',
                    data    : {
                        'id_header' : id_header
                    },
                    success : function(data) {
                        $('#body-data').html(data);
                    }
                });
            }
        });
    </script>
@endsection
