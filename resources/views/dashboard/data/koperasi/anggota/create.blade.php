@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Koperasi</a></li>
    <li class="breadcrumb-item"><a href="#">Anggota</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8 p-3">
                <form class="row g-3 needs-validation" novalidate enctype="multipart/for-data">
                    <input type="hidden" name="koperasi_name" id="koperasi_name" />
                    <div class="col-md-6 position-relative">
                        <div class="form-group">
                            <label for="no_anggota">No Anggota</label>
                            <input type="text" name="no_anggota" id="no_anggota" class="form-control"
                                placeholder="masukan no_anggota" required />
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan Nik"
                            required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="nomor_hp">Nomor HP</label>
                        <input type="text" name="nomor_hp" id="nomor_hp" class="form-control"
                            placeholder="Masukan Nama Lengkap" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="username">Username</label>
                        <input type="text" class="form-control w-100" name="username" id="username"
                            placeholder="Masukan Tempat Lahir" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Password</label>
                        <input type="password" class="form-control w-100" name="password" id="password"
                            placeholder="Masukan Tanggal Lahir" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control w-100" name="confirmPassword" id="confirmPassword"
                            placeholder="Masukan Tanggal Lahir" required />
                    </div>

                    <div class="col-12">
                        <button type="button" name="process" id="button-submit" class="btn btn-primary"
                            onclick="saveData()">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script>   
        let nis
        window.addEventListener("load", () => {
            nis = '{{$koperasi->nis}}'
            console.log(nis);
        });
        function saveData() {
            var no_anggota = document.getElementById("no_anggota").value;
            var nama_lengkap = document.getElementById("nama_lengkap").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var nomor_hp = document.getElementById("nomor_hp").value;
            
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
                no_anggota,
                username,
                nama_lengkap: nama_lengkap,
                password: password,
                confirmPassword: confirmPassword,
                nomor_hp: nomor_hp,
                nis,
                id_koperasi: {{ $id_koperasi }},
            };

            fetch("/api/register/anggota/insert-anggota", {
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
                                window.location = "/list_anggota";
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
                            //window.location.href = "/registrasi/rki/" + tingkatan_koperasi;
                        } else {
                            console.log("error");
                        }
                    });
                });
        }
    </script>
@endpush
