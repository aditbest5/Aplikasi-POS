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
                            <label for="nama_koperasi" class="form-label">Nama Koperasi</label>
                            <input type="text" name="nama_koperasi" id="nama_koperasi" class="form-control"
                                placeholder="Masukan Nama Koperasi" />
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="singkatan_koperasi" class="form-label">Nama Singkat Koperasi</label>
                        <input type="text" name="singkatan_koperasi" id="singkatan_koperasi" class="form-control"
                            placeholder="Masukan Singkatan Koperasi" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="email" class="form-label">Email Koperasi</label>
                        <input type="text" name="email" id="email" class="form-control"
                            placeholder="Masukan Nama Lengkap" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="no_telp" class="form-label">No Telp</label>
                        <input type="text" class="form-control w-100" name="no_telp" id="no_telp"
                            placeholder="no_telp" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="no_wa" class="form-label">No WA</label>
                        <input type="text" class="form-control w-100" name="no_wa" id="no_wa"
                            placeholder="no_wa" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="no_fax" class="form-label">No Fax</label>
                        <input type="text" class="form-control w-100" name="no_fax" id="no_fax"
                            placeholder="no_fax" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="web" class="form-label">Website (Opsional)</label>
                        <input type="text" class="form-control w-100" name="web" id="web" placeholder="web" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="bidang_koperasi" class="form-label">Bidang Koperasi</label>
                        <input type="text" name="bidang_koperasi" id="bidang_koperasi" class="form-control"
                            placeholder="Masukan Bidang Koperasi" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" class="form-control" style="height: 120px"></textarea>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Provinsi</label>
                        <select id="provinsi" class="form-control" required>
                            <option value="00" hidden selected>Pilih Provinsi</option>
                        </select>
                        <div id="provinsi-error" class="text-danger mt-1 hidden"></div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Kabupaten/Kota</label>
                        <select id="kota" class="form-control" required>
                            <option value="00" hidden selected>Pilih Kabuptaen/Kota</option>
                        </select>
                        <div id="kota-error" class="text-danger mt-1 hidden"></div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Kecamatan</label>
                        <select id="kecamatan" class="form-control">
                            <option value="00" hidden selected>Pilih Kecamatan</option>
                        </select>
                        <div id="kecamatan-error" class="text-danger mt-1 hidden"></div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Kelurahan/Desa</label>
                        <select id="kelurahan" class="form-control">
                            <option value="00" hidden selected>Pilih Kelurahan/Desa</option>
                        </select>
                        <div id="kelurahan-error" class="text-danger mt-1 hidden"></div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Kode Pos</label>
                        <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                            placeholder="Masukan kode_pos" />
                    </div>


                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Nama Pengurus</label>
                        <input type="text" name="nama_pengurus" id="nama_pengurus" class="form-control"
                            placeholder="Masukan nama_pengurus" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No Pengurus KTP</label>
                        <input type="text" name="no_ktp_pengurus" id="no_ktp_pengurus" class="form-control"
                            placeholder="Masukan no_ktp_pengurus" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No Anggota</label>
                        <input type="text" name="no_anggota_pengurus" id="no_anggota_pengurus" class="form-control"
                            placeholder="Masukan no_anggota" />
                    </div>
                    <!-- <div class="col-md-6 position-relative">
                            <label for="validationTooltip04" class="form-label">Jabatan Pengurus</label>
                                <input type="text" name="jabatan_pengurus" id="jabatan_pengurus" value="1"
                                class="form-control" placeholder="Masukan Jabatan" hidden />
                        </div> -->

                    <div class="col-md-6 position-relative">
                        <label for="kewarganegaraan">No WA</label>
                        <input type="text" name="no_wa_pengurus" id="no_wa_pengurus" class="form-control"
                            placeholder="Masukan no_wa_pengurus" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Nama Pengawas</label>
                        <input type="text" name="nama_pengawas" id="nama_pengawas" class="form-control"
                            placeholder="Masukan Nama Pengawas" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No KTP Pengawas</label>
                        <input type="text" name="no_ktp_pengawas" id="no_ktp_pengawas" class="form-control"
                            placeholder="Masukan no_ktp_pengawas" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Foto KTP Pengawas</label>
                        <input type="file" name="image_ktp_pengawas" id="image_ktp_pengawas" class="form-control"
                            placeholder="Masukan image_ktp_pengawas" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Foto KTP Ketua</label>
                        <input type="file" name="image_ktp_ketua" id="image_ktp_ketua" class="form-control"
                            placeholder="Masukan image_ktp_ketua" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No Anggota Pengawas</label>
                        <input type="text" name="no_anggota_pengawas" id="no_anggota_pengawas" class="form-control"
                            placeholder="Masukan Nomor Anggota" />
                    </div>

                    <!-- <div class="col-md-6 position-relative">
                            <label for="validationTooltip04" class="form-label">Jabatan Pengawas</label>
                                <input type="text" name="jabatan_pengawas" id="jabatan_pengawas" value="3"
                                    class="form-control" placeholder="Masukan Jabatan" hidden />
                        </div> -->

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No Wa Pengawas</label>
                        <input type="text" name="no_wa_pengawas" id="no_wa_pengawas" class="form-control"
                            placeholder="Masukan Nomor WA" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No Akta</label>
                        <input type="text" class="form-control" name="no_akta" id="no_akta"
                            placeholder="Masukan Nomor" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Tanggal Akta</label>
                        <input type="date" class="form-control w-100" name="tanggal_akta" id="tanggal_akta"
                            placeholder="Masukan Tanggal Akta" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No SKK</label>
                        <input type="text" class="form-control w-100" name="no_skk" id="no_skk"
                            placeholder="Masukan Nomor" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Tanggal SKK</label>
                        <input type="date" class="form-control w-100" name="tanggal_skk" id="tanggal_skk"
                            placeholder="Masukan Tanggal SK" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Nomor Surat Pengesahan</label>
                        <input type="text" class="form-control w-100" name="no_spkk" id="no_spkk"
                            placeholder="Masukan Nomor" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Tanggal Surat Pengesahan</label>
                        <input type="date" class="form-control w-100" name="tanggal_spkk" id="tanggal_spkk"
                            placeholder="Masukan Tanggal Surat Pengesahan" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No Akta Perubahan</label>
                        <input type="text" class="form-control w-100" name="no_akta_perubahan" id="no_akta_perubahan"
                            placeholder="Masukan Nomor" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Masa Berlaku Perubahan</label>
                        <input type="date" class="form-control w-100" name="masa_berlaku_perubahan"
                            id="masa_berlaku_perubahan" placeholder="Masukan Masa Berlaku" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Nomor SIUP/NIB</label>
                        <input type="text" class="form-control w-100" name="no_siup" id="no_siup"
                            placeholder="Masukan Nomor" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Masa Berlaku SIUP</label>
                        <input type="date" class="form-control w-100" name="masa_berlaku_siup" id="masa_berlaku_siup"
                            placeholder="Masukan Masa Berlaku" />
                    </div>


                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No SKDU</label>
                        <input type="text" class="form-control w-100" name="no_skdu" id="no_skdu"
                            placeholder="Masukan Nomor" />
                    </div>


                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Masa Berlaku SKDU</label>
                        <input type="date" class="form-control w-100" name="masa_berlaku_skdu" id="masa_berlaku_skdu"
                            placeholder="Masukan Masa Berlaku" />
                    </div>


                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Nomor NPWP</label>
                        <input type="text" class="form-control w-100" name="no_npwp" id="no_npwp"
                            placeholder="Masukan Nomor NPWP" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Nomor PKP</label>
                        <input type="text" class="form-control w-100" name="no_pkp" id="no_pkp"
                            placeholder="Masukan Nomor PKP" />
                    </div>


                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No. Sertifikat Koperasi</label>
                        <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control w-100"
                            placeholder="Masukan Nomor" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload Sertifikats<span
                                style="color: red;">*</span></label>
                        <input type="file" name="no_sertifikat" id="doc_sertifikat_koperasi"
                            class="form-control w-100" placeholder="Masukan Nomor" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload Logo<span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="foto_logo" name="foto_logo" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload Dokumen Siup<span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="dokumen_siup" name="dokumen_siup" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload Dokumen SK Kemenkumham<span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="dokumen_sk_kemenkumham"
                            name="dokumen_sk_kemenkumham" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload Dokumen Akta Perubahan <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="dokumen_akta_perubahan"
                            name="dokumen_akta_perubahan" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload Dokumen Akta Pendirian <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="dokumen_akta_pendirian"
                            name="dokumen_akta_pendirian" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload Dokumen SPKUM <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="dokumen_spkum" name="dokumen_spkum" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload Dokumen Domisili <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="dokumen_sk_domisili"
                            name="dokumen_sk_domisili" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Upload NPWP <span
                                style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="image_npwp" name="image_npwp" />
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
    <script src="{{ asset('assets/js/function.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>

    <script>
        let baseStringKtpKetua;
        let baseStringLogo;
        let baseStringNpwp;
        let baseStringPengawas;
        let baseStringSiup;
        let baseStringSkKemenkumham;
        let baseStringAktaPerubahan;
        let baseStringAktaPendirian;
        let baseStringSpkum;
        let baseStringDomisili;
        let baseStringDokumenSertifikat;
        let tingkatan_koperasi;
        let koperasi;
        let id_koperasi;

        const ktpKetua = document.getElementById('image_ktp_ketua');
        const ktpPengawas = document.getElementById('image_ktp_pengawas');
        const npwpInput = document.getElementById('image_npwp');
        const logoInput = document.getElementById('foto_logo');
        const dokumenSiup = document.getElementById('dokumen_siup');
        const documentSertifikat = document.getElementById('doc_sertifikat_koperasi');
        const dokumenSkKemenkumham = document.getElementById('dokumen_sk_kemenkumham');
        const dokumenAktaPerubahan = document.getElementById('dokumen_akta_perubahan');
        const dokumenAktaPendirian = document.getElementById('dokumen_akta_pendirian');
        const dokumenSpkum = document.getElementById('dokumen_spkum');
        const dokumenDomisili = document.getElementById('dokumen_sk_domisili');

        const previewProfil = document.getElementById('preview-profil');
        const previewLogo = document.getElementById('preview-logo');

        window.addEventListener("load", () => {
            getProvince();
            tingkatan_koperasi = "{{ $tingkatan }}"
            id_koperasi = {{ $id }};
            console.log(tingkatan_koperasi)
        });

        const fileToBase64 = (file, callback) => {
            const reader = new FileReader();
            reader.onload = (e) => callback(e.target.result);
            reader.readAsDataURL(file);
        };

        ktpKetua.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringKtpKetua = base64;
                });
            }
        });

        ktpPengawas.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringPengawas = base64;
                });
            }
        });

        logoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringLogo = base64;
                });
            }
        });

        npwpInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringNpwp = base64;
                });
            }
        });

        dokumenSiup.addEventListener('change', () => {
            const file = dokumenSiup.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringSiup = base64;
                });
            }
        });

        dokumenSkKemenkumham.addEventListener('change', () => {
            const file = dokumenSkKemenkumham.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringSkKemenkumham = base64;
                });
            }
        });

        dokumenAktaPerubahan.addEventListener('change', () => {
            const file = dokumenAktaPerubahan.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringAktaPerubahan = base64;
                });
            }
        });

        dokumenAktaPendirian.addEventListener('change', () => {
            const file = dokumenAktaPendirian.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringAktaPendirian = base64;
                });
            }
        });

        dokumenSpkum.addEventListener('change', () => {
            const file = dokumenSpkum.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringSpkum = base64;
                });
            }
        });

        dokumenDomisili.addEventListener('change', () => {
            const file = dokumenDomisili.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringDomisili = base64;
                });
            }
        });

        documentSertifikat.addEventListener('change', () => {
            const file = documentSertifikat.files[0];
            if (file) {
                fileToBase64(file, (base64) => {
                    baseStringDokumenSertifikat = base64;
                });
            }
        });



        async function saveData() {
            const nama_koperasi = document.getElementById("nama_koperasi").value;
            const singkatan_koperasi = document.getElementById("singkatan_koperasi").value;
            const email = document.getElementById("email").value;
            const no_telp = document.getElementById("no_telp").value;
            const no_wa = document.getElementById("no_wa").value;
            const no_fax = document.getElementById("no_fax").value;
            const web = document.getElementById("web").value;
            const bidang_koperasi = document.getElementById("bidang_koperasi").value;
            const alamat = document.getElementById("alamat").value;
            const kelurahan = document.getElementById("kelurahan").value;
            const kecamatan = document.getElementById("kecamatan").value;
            const kota = document.getElementById("kota").value;
            const provinsi = document.getElementById("provinsi").value;
            const kode_pos = document.getElementById("kode_pos").value;
            const no_ktp_pengurus = document.getElementById("no_ktp_pengurus").value;
            const nama_pengurus = document.getElementById("nama_pengurus").value;
            const no_anggota_pengurus = document.getElementById("no_anggota_pengurus").value;
            const jabatan_pengurus = 1;
            const no_wa_pengurus = document.getElementById("no_wa_pengurus").value;
            const no_ktp_pengawas = document.getElementById("no_ktp_pengawas").value;
            const nama_pengawas = document.getElementById("nama_pengawas").value;
            const no_anggota_pengawas = document.getElementById("no_anggota_pengawas").value;
            const jabatan_pengawas = 3;
            const no_wa_pengawas = document.getElementById("no_wa_pengawas").value;
            const no_akta = document.getElementById("no_akta").value;
            const tanggal_akta = document.getElementById("tanggal_akta").value;
            const no_skk = document.getElementById("no_skk").value;
            const tanggal_skk = document.getElementById("tanggal_skk").value;
            const no_spkk = document.getElementById("no_spkk").value;
            const tanggal_spkk = document.getElementById("tanggal_spkk").value;
            const no_akta_perubahan = document.getElementById("no_akta_perubahan").value;
            const masa_berlaku_perubahan = document.getElementById("masa_berlaku_perubahan").value;
            const no_siup = document.getElementById("no_siup").value;
            const masa_berlaku_siup = document.getElementById("masa_berlaku_siup").value;
            const no_skdu = document.getElementById("no_skdu").value;
            const masa_berlaku_skdu = document.getElementById("masa_berlaku_skdu").value;
            const no_npwp = document.getElementById("no_npwp").value;
            const no_pkp = document.getElementById("no_pkp").value;
            const no_sertifikat = document.getElementById("no_sertifikat").value;

            const slug = createSlug(singkatan_koperasi);
            const username = createUsername(singkatan_koperasi);
            // if (!validKtp || !validLogo || !validDokumen || provinsi == '00' || kota == '00' || kecamatan == '00' ||
            //     kelurahan == '00') {
            //     alert("Pastikan Data Terisi Semua!");
            //     return false;
            // }
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
                singkatan_koperasi,
                nama_koperasi,
                slug,
                email,
                username,
                no_telp,
                no_wa,
                no_fax,
                web,
                bidang_koperasi,
                alamat,
                kelurahan,
                kecamatan,
                kota,
                provinsi,
                kode_pos,
                no_ktp_pengurus,
                nama_pengurus,
                no_anggota_pengurus,
                jabatan_pengurus,
                no_wa_pengurus,
                no_ktp_pengawas,
                nama_pengawas,
                no_anggota_pengawas,
                jabatan_pengawas,
                no_wa_pengawas,
                no_akta,
                tanggal_akta,
                no_skk,
                tanggal_skk,
                no_spkk,
                tanggal_spkk,
                no_akta_perubahan,
                masa_berlaku_perubahan,
                no_siup,
                masa_berlaku_siup,
                no_skdu,
                masa_berlaku_skdu,
                no_npwp,
                no_pkp,
                no_sertifikat,
                image_ktp_ketua: baseStringKtpKetua,
                logo: baseStringLogo,
                doc_siup: baseStringSiup,
                doc_sertifikat_koperasi: baseStringDokumenSertifikat,
                image_ktp_pengawas: baseStringPengawas,
                image_npwp: baseStringNpwp,
                doc_sk_kemenkumham: baseStringSkKemenkumham,
                doc_akta_perubahan: baseStringAktaPerubahan,
                doc_akta_pendirian: baseStringAktaPendirian,
                doc_spkum: baseStringSpkum,
                doc_domilisi: baseStringDomisili,
            };
            if (tingkatan_koperasi == 'rki') {
                await fetch(`/api/register/rki/insert-koperasi/2`, {
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
                                    window.location.href = "/list_puskop";
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
            } else {
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
                                    window.location = "/list_puskop";
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

        }
    </script>
@endpush
