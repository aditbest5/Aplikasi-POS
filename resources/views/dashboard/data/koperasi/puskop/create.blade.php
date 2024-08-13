@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Koperasi</a></li>
    <li class="breadcrumb-item"><a href="#">Puskop</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing mt-3">
            <div class="widget-content widget-content-area br-8 p-3">
                <form class="row g-3 needs-validation" novalidate entype="multipart/form-data">
                    <div class="col-md-6 position-relative">
                        <div class="form-group">
                            <label for="namaKoperasi" class="form-label">Nama Koperasi</label>
                            <input type="text" name="namaKoperasi" id="namaKoperasi" class="form-control"
                                placeholder="Masukan Nama Koperasi" />
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Masukan username" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukan Password" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control w-100" name="confirmPassword" id="confirmPassword"
                            placeholder="confirm password" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="namaKetua" class="form-label">Nama Ketua</label>
                        <input type="text" class="form-control w-100" name="namaKetua" id="namaKetua"
                            placeholder="nama ketua" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="nomerKetua" class="form-label">Nomer HP Ketua</label>
                        <input type="text" class="form-control w-100" name="nomerKetua" id="nomerKetua"
                            placeholder="+628xxxxxxxxx" />
                    </div>

                    <div class="col-12">
                        <button type="button" onclick="saveData()" name="process" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- <script>
        window.addEventListener("load", () => {
            getProvince();
        });
    </script> --}}
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>

    <script>
        let id_koperasi;
        let nis
        window.addEventListener("load", () => {
            id_koperasi = {{ $id }};
            nis = {{$koperasi->nis}}
        });

        async function saveData() {
            const namaKoperasi = document.getElementById("namaKoperasi").value;
            const username = document.getElementById("username").value;
            const namaKetua = document.getElementById("namaKetua").value;
            const nomerKetua = document.getElementById("nomerKetua").value;
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;
            
            const jsondata = {
                namaKoperasi,
                username,
                namaKetua,
                nomerKetua,
                password,
                confirmPassword,
                nis,
            };
            await fetch(`/api/register/koperasi/insert-koperasi/${id_koperasi}/2`, {
                        headers: {
                            'Access-Control-Allow-Origin': '*',
                            'Content-Type': 'application/json'
                        },
                        method: "POST",
                        body: JSON.stringify(jsondata)
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        if (data.response_code == '00') {
                            swal({
                                title: "Status Registrasi",
                                text: data?.response_message,
                                icon: "success",
                                buttons: true,
                            }).then((willOut) => {
                                if (willOut) {
                                    window.location.href = "/list_puskop";
                                } else {
                                    console.log("error");
                                }
                            });
                        } else {
                            swal({
                                title: "Status Registrasi",
                                text: data?.response_message,
                                icon: "info",
                                buttons: true,
                            }).then((willOut) => {
                                if (willOut) {} else {
                                    console.log("error");
                                }
                            });
                        }
                    }).catch(err => {
                        console.log(err);
                        swal({
                            title: "Status Registrasi",
                            text: 'Server Error',
                            icon: "error",
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
