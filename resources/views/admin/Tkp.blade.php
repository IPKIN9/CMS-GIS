@extends('layout.master')
@section('title')
Tkp
@endsection
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>GIS <small>Data Kelurahan</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>
    @if ($errors->any())
    <div class="alert alert-danger">
        Field inputan tidak boleh kosong
    </div>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Kelurahan</h2>
                    <button class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#univ-modal">Tambah</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30">
                                    @if ($msg = Session::get('status'))
                                    <div class="alert alert-success">
                                        {{$msg}}
                                    </div>
                                    @endif
                                </p>
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelurahan</th>
                                            <th>Koordinat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no =1;
                                        @endphp
                                        @foreach ($data as $d)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$d->kelurahan}}</td>
                                            <td>{{$d->koordinat}}</td>
                                            <td>
                                                <button id="btn_edit" data-id="{{$d->id}}" class="btn btn-warning"><i
                                                        class="fa fa-edit"></i>Edit</button>
                                                <button id="btn_hapus" data-id="{{$d->id}}" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i>Hapus</button>
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
    </div>
</div>
<div id="univ-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form id="form_input" action="{{route('Tkp.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label>Tambah Tkp</label>
                        <input class="form-control" id="kelurahan" name="kelurahan" type="text"
                            placeholder="Nama kelurahan" required>
                        <label>Tambah koordinat</label>
                        <input class="form-control" id="koordinat" name="koordinat" type="text"
                            placeholder="Nama koordinat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="batal" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" id="simpan" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#batal').on('click' , function(){
            location.reload();
        });

        $('body').on('click','#btn_edit',function(){
            let dataId = $(this).data('id');
            $.get('Tkp/'+ dataId + '/edit',function(data){
                $('#univ-modal').modal('show');
                $('.modal-title').html('Edit data');
                $('#id').val(data.id);
                $('#kelurahan').val(data.kelurahan);
                $('#koordinat').val(data.koordinat);
                $('#form_input').attr('action','{{route('Tkp.update')}}')
            });
        });
        $('body').on('click','#btn_hapus',function(){
            let dataId = $(this).data('id');
            $.get('Tkp/'+ dataId + '/edit',function(data){
                $('#univ-modal').modal('show');
                $('.modal-body').html('');
                $('.modal-body').append(`
                    <h3>Apakah anda yakin ingin menghapus data <strong>Kelurahan `+ data.kelurahan +`</strong></h3>
                    <input type="hidden" name="id" value="`+ data.id +`">
                `);
                $('#simpan').html('HAPUS');
                $('.modal-title').html('Hapus data');
                $('#form_input').attr('action','{{route('Tkp.destroy')}}')
            });
        });
    });
</script>
@endsection