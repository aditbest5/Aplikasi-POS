@extends('registrasi.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                <div class="main_title_1">
                    <h3 class="fs-4">Versatile Jaya</h3>
                    <h3>REGISTRASI TOKO</h3>
                    <p>Daftarkan Toko Usaha Anda</p>
                    <p><em>- Aditya Aprianto</em></p>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>

                    <form id="wrapped">
                        <input id="website" name="website" type="text" value="" />
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            <div class="step">
                                <h3 class="main_question">
                                    <strong>1 of 2</strong>Data Toko
                                </h3>
                                <div class="form-group">
                                    <label for="nama_toko">Nama Toko</label>
                                    <input type="text" name="nama_toko" id="nama_toko" class="form-control"
                                        placeholder="Masukan Nama Koperasi" required />
                                </div>
                                <div class="form-group">
                                    <label for="email_toko">Email Toko</label>
                                    <input type="email" name="email_toko" id="email_toko" class="form-control"
                                        placeholder="Masukan Nama Lengkap" />
                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp_toko">Nomor HP Toko</label>
                                    <input type="text" name="nomor_hp_toko" id="nomor_hp_toko"
                                        class="form-control" placeholder="Masukan Bidang Koperasi" required />
                                </div>
                                <div class="form-group">
                                    <label for="foto_logo">Upload Logo<span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" id="foto_logo" name="foto_logo" required />
                                    <img id="preview-logo" height="100" width="100" class="mt-1"
                                        src="/assets/images/default.jpg" alt="Preview Image">
                                </div>


                            </div>
                            <!-- /step 1-->
                            <div class="step">
                                <h3 class="main_question mb-4">
                                    <strong>2 of 2</strong>Alamat Toko
                                </h3>

                                <div class="form-group">
                                    <label for="alamat_toko">Alamat Lengkap</label>
                                    <textarea name="alamat_toko" id="alamat_toko" class="form-control" style="height: 120px"
                                        onkeyup="getVals(this, 'alamat');" required></textarea>
                                </div>

                                <!-- /review_block-->
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="provinsi">Provinsi</label> --}}
                                            <p class="mb-1">Provinsi</p>
                                            <select id="provinsi" class="form-control" required>
                                                <option value="00" hidden selected>Pilih Provinsi</option>
                                            </select>
                                            <div id="provinsi-error" class="text-danger mt-1 hidden"></div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="kabupaten">Kabupaten/Kota</label> --}}
                                            <p class="mb-1">Kabupaten/Kota</p>
                                            <select id="kota" class="form-control" required>
                                                <option value="00" hidden selected>Pilih Kabuptaen/Kota</option>
                                            </select>
                                            <div id="kota-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="kecamatan">Kecamatan</label> --}}
                                            <p class="mb-1">Kecamatan</p>
                                            <select id="kecamatan" class="form-control">
                                                <option value="00" hidden selected>Pilih Kecamatan</option>
                                            </select>
                                            <div id="kecamatan-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="kelurahan">Kelurahan/Desa</label> --}}
                                            <p class="mb-1">Kelurahan/Desa</p>
                                            <select id="kelurahan" class="form-control">
                                                <option value="00" hidden selected>Pilih Kelurahan/Desa</option>
                                            </select>
                                            <div id="kelurahan-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                                        placeholder="Masukan kode_pos" required />
                                </div>
                            </div>
                            <!-- /step 2-->
                            <div class="submit step">
                                <h3 class="main_question">
                                    <strong>3 of 3</strong>Nama Pengguna
                                </h3>
                                <button type="button" onclick="tambahPengurusBtn()" class="btn btn-success mb-3">Tambah Data</button>
                                <div id="pengurusList">
                                    <!-- Daftar Pengurus yang Ditambahkan akan muncul di sini -->
                                </div>
                            </div>
                            <!-- /step 3-->
                        </div>

                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">
                                Prev
                            </button>
                            <button type="button" name="forward" class="forward">
                                Next
                            </button>
                            <button type="button" onclick="saveData()" name="process" class="submit">
                                Submit
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
        let pengurusData = [];
        let baseStringLogo;
        const logoInput = document.getElementById('foto_logo');
        const previewLogo = document.getElementById('preview-logo');
        window.addEventListener("load", () => {
            getProvince();
        });

        function renderPengurusList() {
            const pengurusList = document.getElementById('pengurusList');
            pengurusList.innerHTML = '';
            pengurusData.forEach((pengurus, index) => {
                console.log(index)
                const pengurusCard = document.createElement('div');
                pengurusCard.className = 'card pengurus-card';
                pengurusCard.innerHTML = `
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-6">
                                    <h5 class="card-title">${pengurus.nama_user}</h5>
                                    <h5 class="card-title">${pengurus.email_user}</h5>
                                    <h5 class="card-title">${pengurus.nomor_hp_user}</h5>
                                    <h5 class="card-title">${pengurus.username}</h5>
                                    <p class="text-dark">${pengurus.role}</p>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-warning btn-sm" onclick="editPengurus(${index})">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deletePengurus(${index})">Delete</button>
                                </div>
                            </div>
                        </div>
                    `;
                pengurusList.appendChild(pengurusCard);
            });
        }

        function tambahPengurusBtn() {
            swal({
                title: "Tambah Pengurus",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: `
                                <input id="swal-input1" class="swal-content__input" placeholder="Nama Lengkap">
                                <input id="swal-input2" class="swal-content__input" placeholder="Email User">
                                <input id="swal-input3" class="swal-content__input" placeholder="Nomor Hp User">
                                <input id="swal-input4" class="swal-content__input" placeholder="Username">
                                <select id="swal-input5" class="swal-content__input" placeholder="role">
                                    <option value="owner">Owner</option>
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            `
                    },
                },
                buttons: {
                    cancel: true,
                    confirm: {
                        text: "Tambah",
                        closeModal: false,
                    }
                },
            }).then((isConfirm) => {
                if (isConfirm) {
                    const nama_user = document.getElementById('swal-input1').value;
                    const email_user = document.getElementById('swal-input2').value;
                    const nomor_hp_user = document.getElementById('swal-input3').value;
                    const username = document.getElementById('swal-input4').value;
                    const role = document.getElementById('swal-input5').value;

                    if (!nama_user || !role || !nomor_hp_user || !email_user || !nomor_hp_toko  || !username ) {
                        swal.showValidationError('Semua bidang harus diisi');
                        return;
                    }

                    pengurusData.push({
                        nama_user,
                        role,
                        nomor_hp_user,
                        email_user,
                        username,
                    });
                    renderPengurusList();
                    console.log(pengurusData)

                    swal.close();
                }
            });
        }

        function editPengurus(index) {
            const pengurus = pengurusData[index];
            swal({
                title: "Edit Pengurus",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: `
                                <input id="swal-input1" class="swal-content__input" value="${pengurus.nama_user}" placeholder="Nama Pengurus">
                                <input id="swal-input2" class="swal-content__input" value="${pengurus.email_user}" placeholder="role">
                                <input id="swal-input3" class="swal-content__input" value="${pengurus.nomor_hp_user}" placeholder="Nomor Telepon">
                                <input id="swal-input4" class="swal-content__input" value="${pengurus.username}" placeholder="Email">
                                <select id="swal-input5" class="swal-content__input" placeholder="role">
                                    <option value="owner">Owner</option>
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                </select>                            `
                    },
                },
                buttons: {
                    cancel: true,
                    confirm: {
                        text: "Update",
                        closeModal: false,
                    }
                },
            }).then((isConfirm) => {
                if (isConfirm) {
                    const nama_user = document.getElementById('swal-input1').value;
                    const email_user = document.getElementById('swal-input2').value;
                    const nomor_hp_user = document.getElementById('swal-input3').value;
                    const username = document.getElementById('swal-input4').value;
                    const role = document.getElementById('swal-input5').value;

                    if (!nama_user || !role || !nomor_hp_user  || !username ||!email_user) {
                        swal.showValidationError('Semua bidang harus diisi');
                        return;
                    }

                    pengurusData[index] = {
                        nama_user,
                        role,
                        nomor_hp_user,
                        username,
                        email_user,
                    };
                    renderPengurusList();
                    swal.close();
                }
            });
        }

        function deletePengurus(index) {
            pengurusData.splice(index, 1);
            renderPengurusList();
        }


        logoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewLogo.src = e.target.result;
                    baseStringLogo = e.target.result;
                    type3 = file.type.split('/')[1];
                }
                reader.readAsDataURL(file);
            }
        });

        async function saveData() {
            const nama_toko = document.getElementById("nama_toko").value;
            const alamat_toko = document.getElementById("alamat_toko").value;
            const email_toko = document.getElementById("email_toko").value;
            const nomor_hp_toko = document.getElementById("nomor_hp_toko").value;
            const kelurahan = document.getElementById("kelurahan").value;
            const kecamatan = document.getElementById("kecamatan").value;
            const kota = document.getElementById("kota").value;
            const provinsi = document.getElementById("provinsi").value;
            const kode_pos = document.getElementById("kode_pos").value;
            const image_logo = baseStringLogo;
            const validLogo = logoInput.files[0];

            if (!validLogo || pengurusData.length < 1) {
                swal({
                    title: "Perhatian!",
                    text: "Pastikan semua data terisi!",
                    icon: "info",
                    buttons: true,
                });
                return false;
            }
            // Show loading dialog
            swal({
                title: "Please wait",
                text: "Submitting data...",
                // icon: "/assets/images/loading.gif",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                className: "swal-loading",
            });
            const jsondata = {
                alamat_toko,
                nama_toko,
                pengurusData: pengurusData,
                email_toko,
                nomor_hp_toko,
                kelurahan,
                kecamatan,
                kota,
                provinsi,
                kode_pos,
                logo: image_logo?.split(",")[1],
            };
            console.log(jsondata)

            await fetch(`/api/register/insert-toko`, {
                    headers: {
                        'Access-Control-Allow-Origin': '*',
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify(jsondata)
                })
                .then(response => response.json())
                .then(data => {
                    swal.close();
                    console.log(data)
                    if (data.response_code == '00') {
                        swal({
                            title: "Status Registrasi",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                window.location.href = "/";
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
                }).catch(err => {
                    console.log(err);
                    swal.close();
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
