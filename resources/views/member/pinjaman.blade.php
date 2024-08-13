@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Pinjaman</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">    
            <div class="widget-content widget-content-area br-8 p-3">
            <p class="mt-2 text-white">
                <a href="/member/tambah_pinjaman" class="btn btn-primary"> Pengajuan Pinjaman </a>
            </p>
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Pinjaman</th>
                            <th>Jumlah</th>
                            <th>Jml Angsuran</th>
                            <th>Keterangan</th>
                            <th>Alasan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_pinjaman as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_pinjaman)->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $data->jenis_pinjaman }}</td>
                                <td>{{ $data->nominal }}</td>
                                <td>{{ $data->lama_angsuran }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ $data->alasan }}</td>
                                <td>{{ ($data->status == 1) ? 'pending' : (($data->status == 2) ? 'approved' : 'rejected') }}</td>
                                <td> <button onclick="deletePinjaman({{$data->id}})" class="btn btn-danger">Delete</button> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
    function deletePinjaman(e) {
            swal({
                title: "Are you sure?",
                text: "to Delete this Data ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willOut) => {
                    if (willOut) {
                        window.location.href ='/delete/pinjaman/'+e;
                    } else {
                        console.log('NaN')
                    }
                });
        }
    </script>
@endpush
