@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Koperasi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Puskop</li>
@endsection

@section('content')
    <div class="row">
        <p class="mt-2 text-white">
            <a href="/tambah_puskop" class="btn btn-primary"> Tambah Puskop </a>
        </p>

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Koperasi</th>
                            <th>No Wa</th>
                            <th>Email</th>
                            <th>Bidang Usaha</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($puskop as $data)
                            <tr>
                                <td>#{{ $data->id }}</td>
                                <td>{{ $data->nama_koperasi }}</td>
                                <td>{{ $data->hp_wa }}</td>
                                <td>{{ $data->email_koperasi }}</td>
                                <td>{{ $data->bidang_koperasi }}</td>
                                <td class="">
                                    @if ($data->approval)
                                        <button type="button" class="btn btn-warning"
                                            onclick="modalBtn({{ json_encode($data) }})" data-bs-toggle="modal"
                                            data-bs-target="#modalInkop">Detail </button>
                                        <a href="/list_primkop_puskop/{{ $data->id }}" class="btn btn-info"> Primkop
                                        </a>
                                    @else
                                        <button type="button" class="btn btn-warning"
                                            onclick="modalBtn({{ json_encode($data) }})" data-bs-toggle="modal"
                                            data-bs-target="#modalInkop">Detail </button>
                                        <a href="/list_primkop_puskop/{{ $data->id }}" class="btn btn btn-info"> Primkop
                                        </a>
                                        <button onclick="rejectBtn({{ $data->id }}, '{{ $data->email_koperasi }}')"
                                            class="btn btn-danger"> Reject </button>   
                                        <button
                                            onclick="approveBtn({{ $data->id }}, '{{ $data->username }}','{{ $data->email_koperasi }}')"
                                            class="btn btn-warning"> Approve </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalInkop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Detail Koperasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Nama Koperasi:</h3>
                                    <p class="text-white" id="nama_koperasi"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No Wa:</h3>
                                    <p class="text-white" id="no_wa"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Email:</h3>
                                    <p class="text-white" id="email"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Bidang Koperasi:</h3>
                                    <p class="text-white" id="bidang_koperasi"</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Alamat:</h3>
                                    <p class="text-white" id="alamat"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No Sertifikat Koperasi:</h3>
                                    <p class="text-white" id="no_sertifikat"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Tanggal Akta Pendirian:</h3>
                                    <p class="text-white" id="tanggal_akta_pendirian"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No Akta Pendirian:</h3>
                                    <p class="text-white" id="no_akta_pendirian"></p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Tanggal SK Kemenkumham:</h3>
                                    <p class="text-white" id="tanggal_skk"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No SK Kemenkumham:</h3>
                                    <p class="text-white" id="no_skk"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                    <h3 class="text-white fs-5 mt-3">Tanggal SPKUM:</h3>
                                    <p class="text-white" id="tanggal_spkum"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No SPKUM:</h3>
                                    <p class="text-white" id="no_spkum"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Masa Berlaku SIUP:</h3>
                                    <p class="text-white" id="masa_berlaku_siup"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No SIUP:</h3>
                                    <p class="text-white" id="no_siup"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Masa Berlaku SIUP:</h3>
                                    <p class="text-white fs-6" id="masa_berlaku_siup"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No SIUP:</h3>
                                    <p class="text-white fs-6" id="no_siup"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">Masa Berlaku SK Domisili:</h3>
                                    <p class="text-white fs-6" id="masa_berlaku_skd"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No SK Domisli:</h3>
                                    <p class="text-white fs-6" id="no_skd"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                    <h3 class="text-white fs-5 mt-3">No PKP:</h3>
                                    <p class="text-white fs-6" id="no_pkp"></p>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-white fs-5 mt-3">No NPWP:</h3>
                                    <p class="text-white fs-6" id="no_npwp"></p>
                                </div>
                            </div>
                            {{-- <h3 class="text-white fs-5 mt-3">Provinsi:</h3>
                        <p class="text-white fs-6" id="provinsi"></p>
                        <h3 class="text-white fs-5 mt-3">Kota/Kabupaten:</h3>
                        <p class="text-white fs-6" id="kota"></p>
                        <h3 class="text-white fs-5 mt-3">Kecamatan:</h3>
                        <p class="text-white fs-6" id="kecamatan"></p>
                        <h3 class="text-white fs-5 mt-3">Kelurahan:</h3> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function modalBtn(data) {
            console.log(data)
            document.getElementById('nama_koperasi').innerText = data.nama_koperasi
            document.getElementById('no_wa').innerText = data.hp_wa
            document.getElementById('email').innerText = data.email_koperasi
            document.getElementById('bidang_koperasi').innerText = data.bidang_koperasi
            document.getElementById('alamat').innerText = data.alamat
            document.getElementById('tanggal_akta_pendirian').innerText = data.tanggal_akta_pendirian
            document.getElementById('no_akta_pendirian').innerText = data.no_akta_pendirian
            document.getElementById('no_skk').innerText = data.no_sk_kemenkumham
            document.getElementById('tanggal_skk').innerText = data.bidang_koperasi
            document.getElementById('no_spkum').innerText = data.no_spkum
            document.getElementById('tanggal_spkum').innerText = data.tanggal_spkum
            document.getElementById('no_siup').innerText = data.no_siup
            document.getElementById('masa_berlaku_siup').innerText = data.masa_berlaku_siup
            document.getElementById('no_skd').innerText = data.no_sk_domisili
            document.getElementById('masa_berlaku_skd').innerText = data.masa_berlaku_sk_domisili
            document.getElementById('no_npwp').innerText = data.no_npwp
            document.getElementById('no_pkp').innerText = data.no_pkp
            document.getElementById('no_sertifikat').innerText = data.no_sertifikat_koperasi
        }

        function approveBtn(id, username, email) {
            let data = {
                username,
                email
            };
            swal({
                title: "Approve",
                text: 'Apakah data sudah benar?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willOut) => {
                if (willOut) {
                    fetch(`/api/approve/send-mail/koperasi/${id}`, {
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
                                window.location = '/list_puskop'
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
                        console.log(data);
                        fetch(`/api/reject/send-mail/koperasi/${id}`, {
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
                                window.location = '/list_puskop'
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
