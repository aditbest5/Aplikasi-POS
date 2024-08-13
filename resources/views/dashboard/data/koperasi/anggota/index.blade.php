@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Koperasi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Anggota</li>
@endsection

@section('content')
    <div class="row">
        <p class="mt-2">
            <a href="/tambah_anggota" class="btn btn-primary"> Tambah Anggota </a>
        </p>
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NO Anggota</th>
                            <th>NIS</th>
                            <th>Nama Anggota</th>
                            <th>No HP</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($primkop_anggota as $data)
                            <tr>
                                <td>#{{ $data->id }}</td>
                                <td>{{ $data->no_anggota }}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->nomor_hp }}</td>
                                <td>{{ $data->email ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        function approveBtn(id, email, username) {
            let data = {
                email,
                username,
            };
            swal({
                title: "Approve",
                text: 'Apakah data sudah benar?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willOut) => {
                if (willOut) {
                    fetch(`/api/approve/send-mail/anggota/${id}`, {
                            headers: {
                                'Access-Control-Allow-Origin': '*',
                                'Content-Type': 'application/json'
                            },
                            method: "POST",
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data)
                            if (data.response_code == '00') {
                                swal("Berhasil Approve!", {
                                    icon: "success",
                                });
                                window.location = '/list_anggota'
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

                }
            }).catch(err => {
                swal("Gagal approve data!\nCoba lagi", {
                    icon: "error",
                });
            });
        }

        function rejectBtn(id, email) {
            let data = {
                email,
            };
            swal({
                title: "Reject",
                text: 'Apakah anda yakin menolak keanggotaan?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willOut) => {
                if (willOut) {
                    swal({
                        text: 'Berikan alasan',
                        content: "input",
                        button: {
                            text: "Submit",
                            closeModal: false,
                        },
                    }).then((value) => {
                        data['alasan'] = value
                        console.log(data);
                        fetch(`/api/reject/send-mail/anggota/${id}`, {
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
                                window.location = '/list_anggota'
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
@endpush
