@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Tambah Pinjaman</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">    
            <div class="widget-content widget-content-area br-8 p-3">
           
                <form class="row g-3 needs-validation" novalidate enctype="multipart/for-data">
                    <input type="hidden" id="id_koperasi" value="{{$id_koperasi}}">
                    <input type="hidden" id="no_anggota" value="{{$no_anggota}}">
                    <div class="col-md-6 position-relative">
                        <div class="form-group">
                            <label for="jenis_pinjaman">Jenis Pinjaman</label>
                            <select name="jenis_pinjaman" id="jenis_pinjaman" class="form-control" required>
                                    <option value="00"> Pilih Jenis Pinjaman</option>
                                    <option value="biasa"> Biasa</option>
                                    <option value="darurat"> Darurat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="tanggal_pinjaman">Nominal</label>
                        <input type="date" name="tanggal_pinjaman" id="tanggal_pinjaman" class="form-control" placeholder="Masukan Tanggal Pinjaman" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="nominal">Nominal</label>
                        <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukan Nominal" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="lama_angsuran">Lama Angsuran</label>
                        <input type="number" name="lama_angsuran" id="lama_angsuran" class="form-control" placeholder="Masukan Lama Angsuran" required /> 
                    </div>
                   
                    <div class="col-md-6 position-relative">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukan Keterangan" required /> 
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="alasan">Alasan</label>
                        <input type="text" name="alasan" id="alasan" class="form-control" placeholder="Masukan Alasan" required /> 
                    </div>


                    <div class="col-12">
                        <button type="button" name="process" id="button-submit" class="btn btn-primary"
                            onclick="saveData()">
                            Simpan Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

            function saveData() {
            var jenis_pinjaman = document.getElementById("jenis_pinjaman").value;
            var id_koperasi = document.getElementById("id_koperasi").value;
            var no_anggota = document.getElementById("no_anggota").value;
            var nominal = document.getElementById("nominal").value;
            var lama_angsuran = document.getElementById("lama_angsuran").value;
            var keterangan = document.getElementById('keterangan').value;
            var tanggal_pinjaman = document.getElementById('tanggal_pinjaman').value;
            var alasan = document.getElementById('alasan').value;
            var csrfToken = document.head.querySelector("[name~=csrf_token][content]").content;

            if (jenis_pinjaman == '00') {
                swal({
                    title: "Perhatian!",
                    text: 'Pastikan data terisi! Kecuali pas foto dan ktp',
                    icon: "info",
                    buttons: true,
                })
                return false;
            }
            swal({
                title: "Please wait",
                text: "Submitting data...",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                className: "swal-loading",
            });
            var datajson = {
                    "jenis_pinjaman" : jenis_pinjaman,
                    "id_koperasi" : id_koperasi,
                    "no_anggota" : no_anggota,
                    "nominal" : nominal,
                    "lama_angsuran" : lama_angsuran,
                    "keterangan" : keterangan,
                    "tanggal_pinjaman" : tanggal_pinjaman,
                    "alasan" : alasan
            };

            fetch("/insert/pinjaman", {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                        "X-CSRF-Token": csrfToken,
                    },
                    method: "POST",
                    body: JSON.stringify(datajson),
                })
                .then((response) => response.json())
                .then((data) => {
                    swal.close();
                    if (data?.response_code == "00") {
                        swal({
                            title: "Status Pinjaman",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                window.location.href = '/member/pinjaman';
                            } else {
                                console.log("error");
                            }
                        });
                    } else {
                        swal({
                            title: "Status Pinjaman",
                            text: data?.response_message,
                            icon: "error",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {} else {
                                
                            }
                        });
                    }
                })
                .catch((error) => {
                    swal.close();
                    console.log(error)
                });
        }
    </script>
@endpush
