@extends('layouts.app')

@section('title','Form kerjasama')

@section('contents')
<form action="{{ isset($kerjasama) ? route('kerjasama.tambah.update',$kerjasama->id) : route('kerjasama.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($kerjasama) ? 'Form Edit kerjasama' : 'Form Tambah kerjasama'}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">No</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{ isset($kerjasama) ? $kerjasama->id : '' }}" readonly> 
                        </div>  
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ isset($kerjasama) ? $kerjasama->judul : '' }}"> 
                        </div>  
                        <div class="form-group">
                            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                            <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ isset($kerjasama) ? $kerjasama->tanggal_pengajuan : '' }}"> 
                        </div>  
                        <div class="form-group">
                            <label for="status_pengisian">Status Pengisian</label>
                            <select class="form-control" id="status_pengisian" name="status_pengisian">
                                <option value="completed" {{ isset($kerjasama) && $kerjasama->status_pengisian == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="uncompleted" {{ isset($kerjasama) && $kerjasama->status_pengisian == 'uncompleted' ? 'selected' : '' }}>Uncompleted</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status_berkas">Status Berkas</label>
                            <select class="form-control" id="status_berkas" name="status_berkas">
                                <option value="completed" {{ isset($kerjasama) && $kerjasama->status_berkas == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="uncompleted" {{ isset($kerjasama) && $kerjasama->status_berkas == 'uncompleted' ? 'selected' : '' }}>Uncompleted</option>
                            </select>
                        </div>
                    </div class="card-footer">
                       <button type="submit" class="btn btn-primary">Simpan</button> 
                    </div>
                </div>
        </div>
    </div>
</form>
@endsection