@extends('layout.master')
@section('title')
    Kondisi Korban
@endsection
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Users <small>Some examples to get you started</small></h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
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
                                            <th>Kondisi korban</th>
                                            <th>Keterangan</th>
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
                                                <td>{{$d->kon_kasus}}</td>
                                                <td>{{$d->ket}}</td>
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

{{-- Modal Tambah --}}
<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Kondisi korban</h4>
            </div>
            <!-- body modal -->
            <form action="{{ route('kondisikorban') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kondisi korban</label>
                        <input class="form-control" name="kon_kasus" type="text" placeholder="Kondisi korban" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="ket" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-primary" >SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
  
@foreach ($data as $d)
<form action="/admin/KondisiKorban/update/{{$d->id}}" method="POST">
    @csrf
    <div id="edit-{{$d->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kondisi korban</h4>
                </div>
                <!-- body modal -->
                
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kondisi korban</label>
                            <input class="form-control" name="kon_kasus" type="text" value="{{$d->kon_kasus}}" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="ket" id="" class="form-control" cols="30" rows="10">{{$d->ket}}</textarea>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary" >SIMPAN</button>
                    </div>
            </div>
        </div>
    </div>
</form>
@endforeach


    
@endsection