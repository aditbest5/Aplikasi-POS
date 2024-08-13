@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Tambah Simpanan</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">    
            <div class="widget-content widget-content-area br-8 p-3">
           
                <form class="row g-3 needs-validation" novalidate enctype="multipart/for-data">
                    <input type="hidden" name="id_koperasi" id="id_koperasi" value="{{$id_koperasi}}">
                    <div class="col-md-6 position-relative">
                        <label for="simpanan_pokok">Simpanan Pokok</label>
                        <input type="number" name="simpanan_pokok" id="simpanan_pokok" class="form-control" placeholder="Masukan Simpanan Pokok" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="simpanan_wajib">Simpanan Wajib</label>
                        <input type="number" name="simpanan_wajib" id="simpanan_wajib" class="form-control" placeholder="Masukan Simpanan Wajib" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="simpanan_sukarela">Simpanan Sukarela</label>
                        <input type="number" name="simpanan_sukarela" id="simpanan_sukarela" class="form-control" placeholder="Masukan Simpanan Sukarela" required /> 
                    </div>
                   
                    <div class="col-md-6 position-relative">
                        <label for="tanggal_simpanan">Tanggal Simpanan</label>
                        <input type="date" name="tanggal_simpanan" id="tanggal_simpanan" class="form-control" placeholder="Masukan Tanggal Simpanan" required /> 
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="no_anggota">No Anggota</label>
                        <input type="text" name="no_anggota" id="no_anggota" class="form-control" placeholder="No Anggota" required /> 
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="no_anggota">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder=" Masukan Keterangan" required /> 
                    </div>

                    <div class="col-12">
                        <button type="button" name="process" id="button-submit" class="btn btn-primary" onclick="saveData()">
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
            var simpanan_pokok = document.getElementById("simpanan_pokok").value;
            var id_koperasi = document.getElementById("id_koperasi").value;
            var no_anggota = document.getElementById("no_anggota").value;
            var simpanan_wajib = document.getElementById("simpanan_wajib").value;
            var simpanan_sukarela = document.getElementById("simpanan_sukarela").value;
            var keterangan = document.getElementById('keterangan').value;
            var tanggal_simpanan = document.getElementById('tanggal_simpanan').value;
            var csrfToken = document.head.querySelector("[name~=csrf_token][content]").content;

            if (simpanan_pokok == '' || simpanan_wajib == '' || simpanan_sukarela == '') {
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
                    "simpanan_pokok" : simpanan_pokok,
                    "id_koperasi" : id_koperasi,
                    "no_anggota" : no_anggota,
                    "simpanan_wajib" : simpanan_wajib,
                    "simpanan_sukarela" : simpanan_sukarela,
                    "keterangan" : keterangan,
                    "tanggal_simpanan" : tanggal_simpanan
            };

            fetch("/insert/simpanan", {
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
                                window.location.href = '/simpanan';
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
