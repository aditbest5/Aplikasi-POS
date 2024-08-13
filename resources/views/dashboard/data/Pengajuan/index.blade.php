@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing mt-2">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Datetime</th>
                            <th>Nama Koperasi</th>
                            <th>Email Koperasi</th>
                            <th>Nama Ketua</th>
                            <th>Nomer Ketua</th>
                            <th>Tingkat Koperasi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_pengajuan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $data->nama_koperasi }}</td>
                                <td>{{ $data->email_koperasi }}</td>
                                <td>{{ $data->nama_ketua }}</td>
                                <td>{{ $data->nomer_ketua }}</td>
                                <td>{{ $data->tingkat_koperasi }}</td>
                                <td>
                                    @if($data->approve == 'Accept')
                                    <span class="badge badge-success">Accept</span>
                                    @elseif($data->approve == 'Process')
                                    <span class="badge badge-warning">Process</span>
                                    @else
                                    <span class="badge badge-danger">Reject</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->approve == 'Process')
                                        <button onclick="rejectBtn({{ $data->id }})" class="btn btn-danger"> Reject </button>
                                        <button onclick="approveBtn({{ $data->id }})" class="btn btn-primary"> Approve </button>
                                    @else
                                        No Action
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        function approveBtn(id) {
            swal({
                title: "Approve",
                text: 'Apakah data sudah benar?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willOut) => {
                if (willOut) {
                    fetch(`/api/approve/send-mail/pengajuan/${id}`, {
                            headers: {
                                'Access-Control-Allow-Origin': '*',
                                'Content-Type': 'application/json'
                            },
                            method: "POST",
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.response_code == '00') {
                                swal("Berhasil Approve!", {
                                    icon: "success",
                                });
                                window.location.href = ''
                            } else {
                                swal("Gagal Approve!", {
                                    icon: "info",
                                });
                            }
                        }).catch(err => {
                            console.log(err);
                            swal("Gagal Approve!", {
                                icon: "info",
                            });
                        });
                } else {
                    console.log('érror');
                }
            }).catch(err => {
                console.log(err);
                swal("Gagal approve data!\nCoba lagi", {
                    icon: "error",
                });
            });
        }

        function rejectBtn(id) {
            let data = {};
            swal({
                title: "Reject",
                text: 'Apakah Anda yakin menolak koperasi ini?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willOut) => {
                if (willOut) {
                    swal({
                        text: 'Berikan alasan Anda',
                        content: "input",
                        button: {
                            text: "Submit",
                            closeModal: false,
                        },
                    }).then((value) => {
                        data['alasan'] = value
                        fetch(`/api/reject/send-mail/pengajuan/${id}`, {
                            headers: {
                                'Access-Control-Allow-Origin': '*',
                                'Content-Type': 'application/json'
                            },
                            method: "DELETE",
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data)
                            if (data.response_code == '00') {
                                swal("Berhasil Reject!", {
                                    icon: "success",
                                });
                                window.location = '/list_inkop'
                            } else {
                                swal("Gagal Reject!", {
                                    icon: "info",
                                });
                            }
                        }).catch(err => {
                            console.log(err);
                            swal("Gagal Reject!", {
                                icon: "info",
                            });
                        });
                    });
                } else {

                }
            }).catch(err => {
                swal("Gagal approve data!\nCoba lagi", {
                    icon: "error",
                });
            });
        }
    </script>
@endsection
