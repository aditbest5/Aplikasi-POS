@extends('registrasi.layouts-2.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                <div class="main_title_1">
                    <h3>REGISTRASI ANGGOTA</h3>
                    <p>
                        Jadilah bagian dari perubahan! Bergabunglah dengan koperasi
                        kami dan nikmati manfaatnya! Sebagai anggota, Anda akan
                        mendapatkan akses ke berbagai layanan dan dukungan yang
                        dirancang untuk meningkatkan kesejahteraan Anda. Mari kita
                        bersama-sama membangun komunitas yang lebih kuat dan ekonomi
                        yang lebih adil.
                    </p>
                    <p><em>- Rumah Kesejahteraan Indonesia</em></p>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>

                    <form id="wrapped" enctype="multipart/form-data">
                        <input id="website" name="website" type="text" value="" />
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            <div class="step">
                                <h3 class="main_question">
                                    <strong>1 of 5</strong>Data Koperasi
                                </h3>
                                    <div class="form-group">
                                            <label for="nis">Masukan NIS</label>
                                            <input type="text" name="nis" id="nis" class="form-control"
                                                placeholder="Masukan NIS" required />
                                    </div>                                  
                            </div>
                            <div class="step">
                                <h3 class="main_question">
                                    <strong>2 of 5</strong>Data Pribadi
                                </h3>

                                <div class="row">
                                    <input type="hidden" name="koperasi_name" id="koperasi_name" />
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="no_anggota">No Anggota</label>
                                            <input type="text" name="no_anggota" id="no_anggota" class="form-control"
                                                placeholder="masukan no_anggota" required />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" name="nik" id="nik" class="form-control"
                                                placeholder="Masukan Nik" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                        placeholder="Masukan Nama Lengkap" required />
                                </div>

                                <div class="row">
                                    <div class="col-6 pe-2">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat</label>
                                            <input type="text" class="form-control w-100" name="tempat_lahir"
                                                id="tempat_lahir" placeholder="Masukan Tempat Lahir" required />
                                        </div>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <div class="form-group">
                                            <input type="date" class="form-control w-100" name="tanggal_lahir"
                                                id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="">Jenis Kelamin</label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="d-flex justify-content-start align-items-center gap-2">
                                                <input type="radio" name="jenis_kelamin" class="form-check"
                                                    value="laki-laki" checked />
                                                Laki Laki
                                            </div>

                                            <div class="d-flex justify-content-start align-items-center gap-2">
                                                <input type="radio" name="jenis_kelamin" class="form-check"
                                                    value="perempuan" checked />
                                                Perempuan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step 1-->

                            <div class="step">
                                <h3 class="main_question mb-4">
                                    <strong>3 of 5</strong>Data Pribadi
                                </h3>

                                <div class="row">
                                    <div class="col-6 pe-2">
                                        <div class="form-group">
                                            {{-- <label for="provinsi">Provinsi</label> --}}
                                            <p class="mb-1">Provinsi</p>
                                            <select id="provinsi" class="form-control"
                                                required>
                                                <option value="00" hidden selected>Pilih Provinsi</option>
                                            </select>
                                            <div id="provinsi-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <div class="form-group">
                                            {{-- <label for="kota">Kab/Kota</label> --}}
                                            <p class="mb-1">Kabupaten/Kota</p>
                                            <select id="kota" class="form-control"
                                                required>
                                                <option value="00" hidden selected>Pilih Kabuptaen/Kota</option>
                                            </select>
                                            <div id="kota-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 pe-2">
                                        <div class="form-group">
                                             {{-- <label for="kecamatan">Kecamatan</label> --}}
                                             <p class="mb-1">Kecamatan</p>
                                             <select id="kecamatan" class="form-control"
                                                 required>
                                                 <option value="00" hidden selected>Pilih Kecamatan</option>
                                             </select>
                                             <div id="kecamatan-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <div class="form-group">
                                            {{-- <label for="kelurahan">Kelurahan/Desa</label> --}}
                                            <p class="mb-1">Kelurahan/Desa</p>
                                            <select id="kelurahan" class="form-control"
                                                required>
                                                <option value="00" hidden selected>Pilih Kelurahan/Desa</option>
                                            </select>
                                            <div id="kelurahan-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                                        placeholder="Masukan Kode Pos" required />
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat jika tidak sesuai KTP</label>
                                    <textarea name="alamat" id="alamat" class="form-control" style="height: 8rem" placeholder="Masukan Alamat"></textarea>
                                </div>

                            </div>
                            <!-- /step 2-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>4 of 5</strong>Data Pribadi
                                </h3>

                                <div class="row">
                                    <div class="col-6 pe-2">
                                        <div class="form-group">
                                            <label for="nomor_hp">No. HP (WhatsApp)</label>
                                            <input type="text" name="nomor_hp" id="nomor_hp" class="form-control"
                                                placeholder="Masukan No HP" required />
                                        </div>
                                    </div>

                                    <div class="col-6 ps-2">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Masukan Email" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 pe-2">
                                        <div class="form-group">
                                            {{-- <label for="status_pernikahan">Status Perkawinan</label> --}}
                                            <p class="mb-1">Status Perkawinan</p>
                                            <select name="status_pernikahan" id="status_pernikahan" class="form-control">
                                                <option value="00" hidden>Pilih Status Perkawinan</option>
                                                <option value="belum kawin">Belum Kawin</option>
                                                <option value="sudah kawin">Sudah Kawin</option>
                                                <option value="cerai mati">Cerai Mati</option>
                                                <option value="cerai hidup">Cerai Hidup</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6 ps-2">
                                        <div class="form-group">
                                            {{-- <label for="agama">Agama</label> --}}
                                            <p class="mb-1">Agama</p>
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
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                        placeholder="Masukan Pekerjaan" required />
                                </div>
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" name="kewarganegaraan" id="kewarganegaraan"
                                        class="form-control" placeholder="Masukan Kewarganegaraan" required />
                                </div>
                            </div>
                            <!-- /step 3-->

                            <div class="submit step">
                                <h3 class="main_question">
                                    <strong>5 of 5</strong>Data Pribadi
                                </h3>

                                <div class="form-group">
                                    <label for="ktp">Foto KTP</label>
                                    <input type="file" name="ktp" id="ktp" class="form-control px-4"
                                        style="height: auto !important; padding-top: 15px !important; padding-bottom: 15px !important;"
                                        onchange="convertBase64ktp()" accept="image/jpeg, image/jpg, image/png"
                                        required />
                                </div>

                                <div class="form-group">
                                    <label for="alamat">foto pribadi</label>
                                    <div class="">
                                        <img src="/assets/images/selfie.JPG" alt="selfie" width="150"
                                            height="150" class="d-block mx-auto mb-3" style="border-radius: 10%" />
                                        <input type="file" name="selfie" id="selfie"
                                            class="form-control form-control px-4" onchange="convertBase64selfie()"
                                            style=" height: auto !important; padding-top: 15px !important; padding-bottom: 15px !important;"
                                            accept="image/jpeg, image/png, image/jpg" required />
                                    </div>
                                </div>
                            </div>
                            <!-- /step 4-->
                        </div>

                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">
                                Kembali
                            </button>
                            <button type="button" name="forward" class="forward" onclick="validateStep()" hidden>
                                Selanjutnya
                            </button>
                            <button type="button" name="process" id="button-submit" class="submit"
                                onclick="saveData()">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/function.js') }}"></script>
    <script>
        let baseStringSelfie;
        let baseStringKtp;
        let type1;
        let type2;
        let id_koperasi;

        window.addEventListener("load", () => {
            getProvince();
        });
        document.getElementById('nis').addEventListener('change', function() {
            const nis = this.value;
            if (nis) {
                fetch(`/api/anggota/verifikasi-nis/${nis}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        if (data.response_code !== '00') {
                            alert(data.response_message);
                        } else {
                            document.getElementById('nama_lengkap').value = data.response_message.nama_lengkap;
                            document.getElementById("no_anggota").value = data.response_message.no_anggota;
                            document.getElementById("nomor_hp").value = data.response_message.nomor_hp;
                            // Enable next step
                            document.querySelector('button[name="forward"]').hidden = false;
                            document.getElementById('nis').disabled = true;
                            id_koperasi = data.response_message.id_koperasi
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
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

        function saveData() {
            var no_anggota = document.getElementById("no_anggota").value;
            var nis = document.getElementById("nis").value;
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
            var image_selfie = baseStringSelfie;
            var image_ktp = baseStringKtp;
            var validselfie = document.getElementById("selfie").files[0];
            var validktp = document.getElementById("ktp").files[0];
            if ( validselfie == "" || validktp == "" || provinsi == '00' || kota == '00' || kecamatan =='00' || kelurahan == '00') {
                swal({
                    title: "Perhatian!",
                    text: "Pastikan semua data terisi!",
                    icon: "info",
                    buttons: true,
                });
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
                no_anggota,
                nis,
                nik: nik,
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
                selfie: image_selfie?.split(",")[1],
                ktp: image_ktp?.split(",")[1],
                type1: type1,
                type2: type2,
                id_koperasi: id_koperasi,
            };

            fetch("/api/register/anggota/update-insert-anggota", {
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
                                window.location.href = "/anggota/primkop/" + slug_url;
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
                        text: err,
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
