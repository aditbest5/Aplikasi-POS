@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kategori</li>
@endsection

@section('content')
    <div class="row">
        <p class="mt-2 text-white">
            <button data-bs-toggle="modal" data-bs-target="#modalInkop" class="btn btn-primary"> Tambah Kategori </button>
        </p>
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $data)
                            <tr>
                                <td>#{{ $data->id }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>
                                    <button class="btn btn-warning"> Edit </button>
                                    <button onclick="deleteBtn({{ $data->id }})" class="btn btn-danger"> Delete
                                    </button>
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
                            <h5 class="modal-title text-white" id="exampleModalLabel">Tambah kategori koperasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="g-3 needs-validation" novalidate enctype="multipart/for-data">
                                <div class="form-group mt-3">
                                    <label class="text-white" for="nama_kategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                        placeholder="masukan nama_kategori" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="deskripsi_kategori">Deskripsi</label>
                                    <input type="text" name="deskripsi_kategori" id="deskripsi_kategori"
                                        class="form-control" placeholder="masukan deskripsi_kategori" required />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="process" id="button-submit" class="btn btn-primary"
                            onclick="saveData()">
                            Simpan
                        </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let id_koperasi;
        window.addEventListener("load", () => {
            const url = new URL(window.location.href);
            const path = url.pathname.split("/");
            id_koperasi = {{ $id }};
        });

        function deleteBtn(id) {
            swal({
                    title: "Hapus Data!",
                    text: "Apakah anda yakin ingin menghapus kategori produk ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        fetch(`/api/products/delete-kategori/${id}`, {
                                headers: {
                                    "Access-Control-Allow-Origin": "*",
                                    "Content-Type": "application/json",
                                },
                                method: "DELETE",
                            })
                            .then((response) => response.json())
                            .then((data) => {
                                console.log(data)
                                if (data.response_code == "00") {
                                    swal({
                                        title: "Status",
                                        text: data?.response_message,
                                        icon: "success",
                                        buttons: true,
                                    }).then((willOut) => {
                                        if (willOut) {
                                            window.location = "/list_kategori_produk";
                                            console.log("success")
                                        } else {
                                            console.log("error");
                                        }
                                    });
                                } else {
                                    swal({
                                        title: "Status",
                                        text: data?.response_message,
                                        icon: "error",
                                        buttons: true,
                                    })
                                }
                            })
                            .catch((error) => {
                                console.log(error)
                                swal({
                                    title: "Status",
                                    text: error,
                                    icon: "info",
                                    buttons: true,
                                })
                            });
                    } else {
                        swal("Cancel!");
                    }
                });

        }

        function saveData() {
            var nama_kategori = document.getElementById("nama_kategori").value;
            var deskripsi = document.getElementById("deskripsi_kategori").value;
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
                nama_kategori,
                deskripsi,
            };

            // console.log(jsondata)

            fetch(`/api/products/insert-kategori/${id_koperasi}`, {
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
                            title: "Status",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                window.location = "/list_kategori_produk";
                                console.log("success")
                            } else {
                                console.log("error");
                            }
                        });
                    } else {
                        swal({
                            title: "Status",
                            text: data?.response_message,
                            icon: "error",
                            buttons: true,
                        })
                    }
                })
                .catch((error) => {
                    swal.close();
                    console.log(error)
                    swal({
                        title: "Status",
                        text: error,
                        icon: "info",
                        buttons: true,
                    })
                });
        }
    </script>
@endsection
