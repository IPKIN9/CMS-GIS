@extends('layout.master')
@section('title')
    Jenis Kasus
@endsection
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>GIS <small>Jenis Kasus</small></h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Jenis Kasus</h2>
                   <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add">Tambah</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30">
                                    @if ($msg = Session::get('succes'))
                                        <div class="alert alert-success">
                                            {{$msg}}
                                        </div>
                                    @endif
                                    @if ($msg = Session::get('success_edit'))
                                        <div class="alert alert-success">
                                            {{$msg}}
                                        </div>
                                    @endif
                                    @if ($msg = Session::get('success_delete'))
                                    <div class="alert alert-success">
                                        {{$msg}}
                                    </div>
                                    @endif
                                </p>
                                <table id="datatable" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Kasus</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no= 1;
                                        @endphp
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$d->j_kasus}}</td>
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit-{{$d->id}}"><i class="fas fa-edit"></i>Edit</button>
                                                    <button class="btn btn-danger"  data-toggle="modal" data-target="#delete-{{$d->id}}" ><i class="fas fa-trash"></i>Hapus</button>
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

<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">JENIS KASUS</h4>
            </div>
            <form action="{{ route('jeniskasus') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Kasus</label>
                        <input class="form-control" name="j_kasus" type="text" placeholder="jenis kasus" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-primary" >SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>


@foreach ($data as $d)
<form action="/admin/jeniskasus/update/{{$d->id}}" method="POST">
    @csrf
    <div id="edit-{{$d->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Jenis Kasus</h4>
                </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Jenis Kasus</label>
                            <input class="form-control" name="j_kasus" type="text" value="{{$d->j_kasus}}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary" >SIMPAN</button>
                    </div>
            </div>
        </div>
    </div>
</form>
@endforeach


@foreach ($data as $d)
    <div id="delete-{{$d->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Jenis Kasus</h4>
                </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus data <strong>{{ $d->j_kasus }}</strong> ?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                        <a href="/admin/jeniskasus/delete/{{$d->id}}" class="btn btn-danger" >HAPUS</a>
                    </div>
            </div>
        </div>
    </div>
@endforeach
@endsection