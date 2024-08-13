@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Simpanan</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">    
            <div class="widget-content widget-content-area br-8 p-3">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Simpanan Pokok</th>
                            <th>Simpanan_Wajib </th>
                            <th>Simpanan Sukarela</th>
                            <th>Tanggal Simpanan</th>
                            <th>No Anggota</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_simpanan as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->simpanan_pokok }}</td>
                                <td>{{ $data->simpanan_wajib }}</td>
                                <td>{{ $data->simpanan_sukarela }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_simpanan)->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $data->no_anggota }}</td>
                                <td>{{ $data->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
