@extends('layouts.app')
@section('contents')
<link rel="stylesheet" href="_button-group.scss">
<link rel="stylesheet" href="_alert.scss">

<!-- DataTales Example -->
<div class="col" style="margin-bottom: 20px">
    <strong class="text-bg-light shadow-none">LIST PERMOHONAN KERJA SAMA</strong>
</div>
<div class="col">
    <div class="row" style="margin-right: 450px;margin-bottom: 20px;">
        <div class="col shadow-sm">
            <a class="btn btn-icon" type="button" href="dashboard">
                <i class="fas fa-home text-info">
            </a></i>
            <a href="#" style="margin-left: 10px;">
                <span style="color: rgb(0, 0, 0);">/
                </span>Pengajuan Izin Kerja Sama
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card shadow">
        <div class="col" style="margin-top: 10px">
            <p><strong>Tabel Daftar Kerma</strong></p>
        </div>
        <div class="col" style="margin-bottom: 10px">
            <a href="{{ route('kerjasama.tambah')}}" class="btn btn-primary" type="button" style="background-color:green">
                <strong>Pengajuan Baru</strong>
            </a>
            <a href="" class="btn btn-primary" type="button" style="background-color:gray">
                <i class="fas fa-list"></i>
                <strong>List Berkas</strong>
            </a>
        </div>
        <div class="table-responsive mx-auto" style="max-width: 1400px; overflow-x: auto;">
        <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-6">
            <div class="dataTables_length" id="dataTable_length">
                <label for="entries" style="display:flex;"> Show
                    <select name="entries" aria-controls="dataTable" class="form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    entries
                </label>
            </div>
        </div>
    </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="1400%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status Pengisian</th>
                        <th>Status Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kerjasama as $row)
                    <tr rowspan="3" class="text-center" style="background-color:whitesmoke;">
                        <th><br>{{ $row->id }}</th>
                        <td><br>{{ $row->judul }}</td>
                        <td><br>{{ $row->tanggal_pengajuan }}</td>
                        <td><br>{{ $row->status_pengisian }}</td>
                        <td><br>{{ $row->status_berkas }}</td>
                        <td>
                        <div class="btn-groupbtn-group-vertical">
                            <button class="btn-sm button-spacing" style="background-color:blue; color:white">View</button><br>
                            <button class="btn-sm btn-warning button-spacing" href="{{ route('kerjasama.edit', $row->id) }}">Edit</button><br>
                            <button class="btn-sm btn-danger button-spacing" name="deleteToggle" data-toggle="modal" data-target="#deleteModal" data-attr="{{ $row->id }}">Hapus</button>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <div class="row" style="margin-top: 10px;">
            <div class="col-6">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                    Showing {{ $kerjasama->firstItem() }} to {{ $kerjasama->lastItem() }} of {{ $kerjasama->total() }} entries
                </div>
            </div>
            <div class="col-6">
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item {{ $kerjasama->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $kerjasama->previousPageUrl() }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $kerjasama->lastPage(); $i++)
                    <li class="page-item {{ $i == $kerjasama->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $kerjasama->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor
                    <li class="page-item {{ $kerjasama->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $kerjasama->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
            @endsection
            <div class="modal fade" tabindex="-1" aria-hidden="true" id="deleteModal" aria-labelledby="deleteModalLabel">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="deleteModalLabel" class="modal-title">Hapus Data </h5>
                        </div>   
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <a href="" id="deleteButton" class="btn btn-primary">Ok</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@section('script')
<script>
    const deleteToggle = document.getElementsByName('deleteToggle')
    const deleteButton = document.getElementById('deleteButton')

    deleteToggle.forEach(toggle => {
        const id = toggle.getAttribute('data-attr')

        toggle.addEventListener('click', function() {
            deleteButton.setAttribute('href', '/kerjasama/hapus/' + id)
        })
    })
</script>
@endsection
