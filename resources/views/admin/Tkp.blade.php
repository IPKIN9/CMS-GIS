@extends('layout.master')
@section('title')
Tkp
@endsection
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>GIS <small>Data Jalan</small></h3>
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
                    <h2>Data Jalan</h2>
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add">Tambah</button>
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
                                                <button id="btn-edit" data-id="{{$d->id}}" class="btn btn-warning"><i
                                                        class="fa fa-edit"></i>Edit</button>
                                                <button id="btn-hapus" data-id="{{$d->id}}" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i>Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <div id="add" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- konten modal-->
                                                <div class="modal-content">
                                                    <!-- heading modal -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah kelurahan</h4>
                                                    </div>
                                                    <!-- body modal -->
                                                    <form action="{{route('Tkp.store')}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Tambah Tkp</label>
                                                                <input class="form-control" name="kelurahan" type="text"
                                                                    placeholder="Nama kelurahan" required>
                                                                <label>Tambah koordinat</label>
                                                                <input class="form-control" name="koordinat" type="text"
                                                                    placeholder="Nama koordinat" required>
                                                            </div>
                                                        </div>
                                                        <!-- footer modal -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">BATAL</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">SIMPAN</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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
@endsection