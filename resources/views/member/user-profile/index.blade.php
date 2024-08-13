@extends('dashboard.layouts.app')

@push('link-style')
<link href="{{ asset('assets/dashboard/src/plugins/css/light/notification/snackbar/custom-snackbar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/src/assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/dashboard/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/dashboard/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/dashboard/src/assets/css/light/elements/alert.css') }}" rel="stylesheet" type="text/css">
@endpush
@push('css')
    <style>
        .general-info {
            border-radius: 10px;
        }
        .nav.nav-pills li.nav-item button.nav-link {
            color: #304378;
        }
        .nav.nav-pills li.nav-item button.nav-link svg {
            color: #304378;
        }
        .nav.nav-pills li.nav-item button.nav-link.active {
            background-color: #304378;
            color: white;
        }
        .nav.nav-pills li.nav-item button.nav-link.active svg  {
            color: white;
        }
    </style>
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
@endsection

@section('content')
<div class="account-settings-container layout-top-spacing">
    <div class="account-content">
        <form novalidate enctype="multipart/for-data"></form>
        <input type="hidden" name="koperasi_name" id="koperasi_name" />
        <input type="hidden" name="id_anggota" id="id_anggota" value="{{$profile->id}}"/>
        <div class="row mb-3">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row" id="animateLine" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link w-100 active" id="animated-underline-home-tab" data-bs-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Informasi Pribadi
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link w-100" id="animated-underline-address-tab" data-bs-toggle="tab" href="#animated-underline-address" role="tab" aria-controls="animated-underline-address" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Alamat dan Kontak
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link w-100" id="animated-underline-status-tab" data-bs-toggle="tab" href="#animated-underline-status" role="tab" aria-controls="animated-underline-status" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            Status dan Lainnya
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link w-100" id="animated-underline-docs-tab" data-bs-toggle="tab" href="#animated-underline-docs" role="tab" aria-controls="animated-underline-docs" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            Unggah Dokumen
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="animateLineContent-4">
            <!-- Informasi Pribadi -->
            <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing pb-3">
                        <div class="section general-info">
                            <div class="info">
                                <h6 class="">Informasi Pribadi</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label for="no_anggota">No Anggota</label>
                                                                <input type="text" name="no_anggota" id="no_anggota" class="form-control" placeholder="No Anggota" value="{{$profile->no_anggota}}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label for="nik">NIK</label>
                                                                <input type="text" name="nik" id="nik" class="form-control" placeholder="Nomer Induk Kependudukan" value="{{$profile->nik}}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="nama_lengkap">Nama Lengkap</label>
                                                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap" value="{{$profile->nama_lengkap}}" required />
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                                <input type="text" class="form-control w-100" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" value="{{$profile->tempat_lahir}}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                                <input type="date" class="form-control w-100" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" value="{{$profile->tanggal_lahir}}" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                                <div class="d-flex justify-content-start gap-4">
                                                                    <div class="d-flex justify-content-start gap-2">
                                                                        <input type="radio" name="jenis_kelamin" class="form-check" value="laki-laki" checked />
                                                                        Laki Laki
                                                                    </div>
                                                                    <div class="d-flex justify-content-start gap-2">
                                                                        <input type="radio" name="jenis_kelamin" class="form-check" value="perempuan" />
                                                                        Perempuan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end row -->
                                                </div> <!-- end form -->
                                            </div> <!-- end col-xl-10 -->
                                        </div> <!-- end row -->
                                    </div> <!-- end col-lg-11 -->
                                </div> <!-- end row -->
                            </div> <!-- end info -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alamat dan Kontak -->
            <div class="tab-pane fade" id="animated-underline-address" role="tabpanel" aria-labelledby="animated-underline-address-tab">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing pb-3">
                        <div class="section general-info">
                            <div class="info">
                                <h6 class="">Alamat dan Kontak</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="provinsi" class="form-label">Provinsi</label>
                                                    <select id="provinsi" class="form-control" required>
                                                        <option value="00" hidden selected>Pilih Provinsi</option>
                                                    </select>
                                                    <div id="provinsi-error" class="text-danger mt-1 hidden"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="kota" class="form-label">Kabupaten/Kota</label>
                                                    <select id="kota" class="form-control" required>
                                                        <option value="00" hidden selected>Pilih Kabuptaen/Kota</option>
                                                    </select>
                                                    <div id="kota-error" class="text-danger mt-1 hidden"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                                    <select id="kecamatan" class="form-control" required>
                                                        <option value="00" hidden selected>Pilih Kecamatan</option>
                                                    </select>
                                                    <div id="kecamatan-error" class="text-danger mt-1 hidden"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="kelurahan" class="form-label">Kelurahan</label>
                                                    <select id="kelurahan" class="form-control" required>
                                                        <option value="00" hidden selected>Pilih Kelurahan/Desa</option>
                                                    </select>
                                                    <div id="kelurahan-error" class="text-danger mt-1 hidden"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="kode_pos" class="form-label">Kode Pos</label>
                                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="Masukan Kode Pos" value="{{$profile->kode_pos}}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="alamat" class="form-label">Alamat jika tidak sesuai KTP</label>
                                                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" value="{{$profile->alamat}}" required>
                                                    <small class="text-danger">*Jika Tidak Sesuai dengan KTP</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="nomor_hp" class="form-label">No. HP <small>(Whatsapps)</small></label>
                                                    <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="Masukan No HP" value="{{$profile->nomor_hp}}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" id="email" value="{{$profile->email}}" class="form-control" placeholder="Masukan Email" required />
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end col-lg-11 -->
                                </div> <!-- end row -->
                            </div> <!-- end info -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status dan Lainnya -->
            <div class="tab-pane fade" id="animated-underline-status" role="tabpanel" aria-labelledby="animated-underline-status-tab">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing pb-3">
                        <div class="section general-info">
                            <div class="info">
                                <h6 class="">Status dan Lainnya</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="status_pernikahan" class="form-label">Status Perkawinan</label>
                                                    <select name="status_pernikahan" id="status_pernikahan" class="form-control">
                                                        <option value="00" hidden>Pilih Status Perkawinan</option>
                                                        <option value="belum kawin">Belum Kawin</option>
                                                        <option value="sudah kawin">Sudah Kawin</option>
                                                        <option value="cerai mati">Cerai Mati</option>
                                                        <option value="cerai hidup">Cerai Hidup</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="agama" class="form-label">Agama</label>
                                                    <select name="agama" id="agama" class="form-control">
                                                        <option value="00" hidden>Pilih Agama</option>
                                                        <option value="islam">Islam</option>
                                                        <option value="protestan">Protestan</option>
                                                        <option value="katolik">Katolik</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="buddha">Buddha</option>
                                                        <option value="konghucu">Konghucu</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" value="{{$profile->pekerjaan}}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                                    <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" placeholder="Masukan Kewarganegaraan" value="{{$profile->kewarganegaraan}}" required />
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end col-lg-11 -->
                                </div> <!-- end row -->
                            </div> <!-- end info -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unggah Dokumen -->
            <div class="tab-pane fade" id="animated-underline-docs" role="tabpanel" aria-labelledby="animated-underline-docs-tab">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing pb-3">
                        <div class="section general-info">
                            <div class="info">
                                <h6 class="">Unggah Dokumen</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="ktp" class="form-label">Foto KTP</label>
                                                    <img src="{{asset($profile->ktp)}}" alt="ktp" width="150" height="150" class="d-block mx-auto mb-3" style="border-radius: 10%" />
                                                    <input type="file" name="ktp" id="ktp" class="form-control px-4" style="height: auto !important; padding-top: 15px !important; padding-bottom: 15px !important;" onchange="convertBase64ktp()" accept="image/jpeg, image/jpg, image/png" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="ktp" class="form-label">Foto Selfie</label>
                                                    <img src="{{asset($profile->selfie)}}" alt="selfie" width="150" height="150" class="d-block mx-auto mb-3" style="border-radius: 10%" />
                                                    <input type="file" name="selfie" id="selfie" class="form-control form-control px-4" onchange="convertBase64selfie()" style=" height: auto !important; padding-top: 15px !important; padding-bottom: 15px !important;" accept="image/jpeg, image/png, image/jpg" />
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end col-lg-11 -->
                                </div> <!-- end row -->
                            </div> <!-- end info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card p-2">
                    <div class="form-group text-end">
                        <button type="button" class="btn btn-success" name="process" onclick="updateData()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/function.js') }}"></script>

    <script>
        let baseStringSelfie;
        let baseStringKtp;
        let type1;
        let type2;
        let slug_url;
        let roles;

        window.addEventListener("load", () => {
            const url = new URL(window.location.href);
            const path = url.pathname.split("/");
            roles = "primkop";
            slug_url = "KSUPegangsaan";
            getProvince();
        });

        function convertBase64selfie() {
            var fl = document.getElementById("selfie").files[0];
            type1 = fl.type.split("/")[1];
            var reader = new FileReader();
            reader.onloadend = function() {
                baseStringSelfie = reader.result;
            };
            reader.readAsDataURL(fl);
        }

        function convertBase64ktp() {
            var flt = document.getElementById("ktp").files[0];
            type2 = flt.type.split("/")[1];
            var reader = new FileReader();
            reader.onloadend = function() {
                baseStringKtp = reader.result;
            };
            reader.readAsDataURL(flt);
        }

        function updateData() {
            var id_anggota = document.getElementById("id_anggota").value;
            var no_anggota = document.getElementById("no_anggota").value;
            var nik = document.getElementById("nik").value;
            var nama_lengkap = document.getElementById("nama_lengkap").value;
            var tempat_lahir = document.getElementById("tempat_lahir").value;
            var tanggal_lahir = document.getElementById("tanggal_lahir").value;
            var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
            var kelurahan = document.getElementById("kelurahan").value;
            var kecamatan = document.getElementById("kecamatan").value;
            var kota = document.getElementById("kota").value;
            var provinsi = document.getElementById("provinsi").value;
            var kode_pos = document.getElementById("kode_pos").value;
            var agama = document.getElementById("agama").value;
            var status_pernikahan = document.getElementById("status_pernikahan").value;
            var pekerjaan = document.getElementById("pekerjaan").value;
            var kewarganegaraan = document.getElementById("kewarganegaraan").value;
            var alamat = document.getElementById("alamat").value;
            var nomor_hp = document.getElementById("nomor_hp").value;
            var email = document.getElementById("email").value;
            var koperasi_name = document.getElementById("koperasi_name").value;
            var image_selfie = baseStringSelfie;
            var image_ktp = baseStringKtp;
            const username = createUsername(nama_lengkap);
            if (provinsi == '00' || kota == '00' || kecamatan == '00' || kelurahan == '00' || agama == '00' ||
                status_pernikahan == '00') {
                swal({
                    title: "Perhatian!",
                    text: 'Pastikan data terisi! Kecuali pas foto dan ktp',
                    icon: "info",
                    buttons: true,
                })
                console.log('sa',provinsi,
kota,
kecamatan,
kelurahan,
agama,
status_pernikahan);
                return false;
            }
            swal({
                title: "Please wait",
                text: "Submitting data...",
                // icon: "/assets/images/loading.gif",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                className: "swal-loading",
            });
            var jsondata = {
                slug_url,
                no_anggota,
                nik: nik,
                username,
                nama_lengkap: nama_lengkap,
                tempat_lahir: tempat_lahir,
                tanggal_lahir: tanggal_lahir,
                jenis_kelamin: jenis_kelamin,
                kelurahan: kelurahan,
                kecamatan: kecamatan,
                kota: kota,
                provinsi: provinsi,
                kode_pos: kode_pos,
                agama: agama,
                status_pernikahan: status_pernikahan,
                pekerjaan: pekerjaan,
                kewarganegaraan: kewarganegaraan,
                alamat: alamat,
                nomor_hp: nomor_hp,
                email: email,
                selfie: image_selfie?.split(',')[1],
                ktp: image_ktp?.split(',')[1],
                koperasi_name: koperasi_name,
                type1: type1,
                type2: type2,
                id_role: 2,
                id_koperasi: {{ $id_koperasi }},
                id_anggota: id_anggota
            };
            console.log('data');
            fetch("/api/member/user-profile/update", {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                    },
                    method: "POST",
                    body: JSON.stringify(jsondata),
                })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data)
                    swal.close();
                    if (data.response_code == "00") {
                        swal({
                            title: "Status Registrasi",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                window.location.reload();
                                console.log("success")
                            } else {
                                console.log("error");
                            }
                        });
                    } else {
                        swal({
                            title: "Status Registrasi",
                            text: data?.response_message,
                            icon: "error",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {} else {
                                console.log("error");
                            }
                        });
                    }
                })
                .catch((error) => {
                    swal.close();
                    console.log(error)
                    swal({
                        title: "Status Registrasi",
                        text: error,
                        icon: "info",
                        buttons: true,
                    }).then((willOut) => {
                        if (willOut) {
                            window.location.reload();
                        } else {
                            console.log("error");
                        }
                    });
                });
        }
    </script>
@endpush

