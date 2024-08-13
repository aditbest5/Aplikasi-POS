@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Pinjaman</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">    
            <div class="widget-content widget-content-area br-8 p-3">
            <h2 class="mt-2 text-white">
                Data Pengajuan Pinjaman Anggota
            </h2>
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
                                <td> <button onclick="approvePinjaman({{$data->id}})" class="btn btn-primary">Approve</button> </td>
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
    function approvePinjaman(e) {
            swal({
                title: "Are you sure?",
                text: "to Approve this Data ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willOut) => {
                    if (willOut) {
                        window.location.href ='/approve/pinjaman/'+e;
                    } else {
                        console.log('NaN')
                    }
                });
        }
    </script>
@endpush
