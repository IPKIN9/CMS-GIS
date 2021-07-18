@extends('layout.master')
@section('title')
Kasus
@endsection
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>GIS <small>Data Kasus</small></h3>
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
                    <h2>Data Kasus</h2>
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
                                            <th>Jenis Kasus</th>
                                            <th>Jalan</th>
                                            <th>Jumlah Korban</th>
                                            <th>Kondisi</th>
                                            <th>Admin</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no =1;
                                        @endphp
                                        @foreach ($data['kasus'] as $d)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$d->kasus_rol->j_kasus}}</td>
                                            <td>{{$d->jalan_rol->nama_jalan}}</td>
                                            <td>{{$d->jumlah_korban}}</td>
                                            <td>{{$d->kon_rol->kon_kasus}}</td>
                                            <td>{{$d->user_rol->nama}}</td>
                                            <td>{{$d->ket}}</td>
                                            <td>
                                                <button type="button" id="btn_edit" data-id="{{$d->id}}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                                <button type="button" id="btn_hapus" data-id="{{$d->id}}"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kasus</h4>
            </div>
            <form id="form-input" action="{{route('Kasus.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jenis Kasus</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="hidden" name="id" id="id">
                            <select id="kasus_id" name="kasus_id" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['j_kasus'] as $d)
                                <option value="{{$d->id}}">{{$d->j_kasus}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jalan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="jalan_id" name="jalan_id" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['jalan'] as $d)
                                <option value="{{$d->id}}">{{$d->nama_jalan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jumlah Korban</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="jumlah_korban" required name="jumlah_korban" type="text" class="form-control"
                                placeholder="Isi disini..">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Kondisi Korban</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select id="kon_id" name="kon_id" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['kondisi'] as $d)
                                <option value="{{$d->id}}">{{$d->kon_kasus}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea id="message" required="required" class="form-control" name="ket"
                                data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"
                                data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                data-parsley-validation-threshold="10"></textarea>
                        </div>
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
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#batal').on('click',function(){
                    location.reload();
                });

        $('body').on('click','#btn_edit', function()
        {
            let dataId = $(this).data('id');
            $.get('Kasus/'+ dataId + '/edit', function (data) {
                $('#univ-modal').modal('show');
                $('#id').val(data.id);
                $('#kasus_id').val(data.kasus_id);
                $('#jalan_id').val(data.jalan_id);
                $('#jumlah_korban').val(data.jumlah_korban);
                $('#kon_id').val(data.kon_id);
                $('#message').val(data.ket);
                $('#form-input').attr('action','{{route('Kasus.update')}}')
            })
        });

        $('body').on('click','#btn_hapus',function(){
            let dataId = $(this).data('id');
            $.get('Kasus/'+dataId+'/edit',function(data){
                $('.modal-body').html('');
                $('.modal-body').append(
                    `<h3>Apakah anda yakin ingin menghapus data <strong> Jenis Kasus `
                        + data.kasus_rol.j_kasus +`</strong> ?</h3>
                    <input type="hidden" name="id" value="`+ data.id +`">
                    `
                );
                $('#form-input').attr('action','{{route('Kasus.destroy')}}')
                $('#univ-modal').modal('show');
                $('#simpan').html('Hapus');
            });
        });
    });
</script>
@endsection