@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Inventory</li>
@endsection

@section('content')
    <div class="row">
        <p class="mt-2 text-white">
            <button data-bs-toggle="modal" data-bs-target="#modalInkop" class="btn btn-primary"> Tambah Produk </button>
        </p>
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Gambar Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Units</th>
                            <th>Kategori</th>
                            <th>Barcode</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $data)
                            <tr class="text-center">
                                <td>#{{ $data->id_produk }}</td>
                                <td>{{ $data->nama_produk }}</td>
                                <td><img width="50" height="50"
                                        src="{{ 'http://127.0.0.1:8000' . $data->image_produk }}" alt="Gambar produk">
                                </td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>{{ $data->uom }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#modalBarcode"
                                        onclick="setBarcodeId({{ $data->id_produk }})" class="btn">
                                        <h2 id="generate_barcode" class="generate_barcode">{{ $data->barcode }}</h2>
                                        <p id="generate_barcode" class="generate_barcode">{{ $data->barcode }}</p>
                                    </button>
                                </td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#modalStok" class="btn btn btn-info"
                                        onclick="getProduct({{ $data->id_produk }})">
                                        + Stok </button>
                                    <button data-bs-toggle="modal" data-bs-target="#modalEdit" class="btn btn btn-warning"
                                        onclick="editModal({{ $data->id_produk }})">
                                        Edit </button>
                                    <button onclick="deleteBtn({{ $data->id_produk }})" class="btn btn-danger"> Delete
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
                            <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="g-3 needs-validation" novalidate enctype="multipart/for-data">
                                <div class="form-group">
                                    <label class="text-white" for="nama_produk">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" class="form-control"
                                        placeholder="masukan nama produk" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="harga">Harga</label>
                                    <input type="text" name="harga" id="harga" class="form-control"
                                        placeholder="masukan harga" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="gambar_produk">Gambar</label>
                                    <input type="file" class="form-control" id="gambar_produk" name="gambar_produk"
                                        required />
                                    <img id="preview-gambar" height="100" width="100" class="mt-1"
                                        src="/assets/images/default.jpg" alt="Preview Image">
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group mt-3">
                                            <label class="text-white" for="stok">Stok</label>
                                            <input type="number" name="stok" id="stok" class="form-control"
                                                placeholder="masukan stok" required />
                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <div class="form-group mt-3">
                                            <label class="text-white" for="uom">Units</label>
                                            <input type="text" name="uom" id="uom" class="form-control"
                                                placeholder="Per Unit" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="barcode">Barcode</label>
                                    <input type="number" name="barcode" id="barcode" class="form-control"
                                        placeholder="masukan barcode" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="kategori">Kategori</label>
                                    <select type="text" name="kategori" id="kategori" class="form-control"
                                        required />
                                    @foreach ($categories as $data_kategori)
                                        <option value="{{ $data_kategori->id }}">{{ $data_kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                    </select>
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
            <!-- Modal Input Jumlah Barcode -->
            <div class="modal fade" id="modalBarcode" tabindex="-1" aria-labelledby="modalBarcodeLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="modalBarcodeLabel">Cetak Barcode</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="g-3 needs-validation" novalidate>
                                <div class="form-group">
                                    <label class="text-white" for="barcode_qty">Jumlah Barcode</label>
                                    <input type="number" name="barcode_qty" id="barcode_qty" class="form-control"
                                        placeholder="Masukkan jumlah barcode" required />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="printBarcode()">Cetak</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edit Produk -->
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="editModalLabel">Edit Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="g-3 needs-validation" novalidate enctype="multipart/for-data">
                                <input type="text" name="edit_id_produk" id="edit_id_produk" class="form-control"
                                    hidden required />
                                <div class="form-group">
                                    <label class="text-white" for="edit_nama_produk">Nama Produk</label>
                                    <input type="text" name="edit_nama_produk" id="edit_nama_produk"
                                        class="form-control" placeholder="masukan nama produk" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="edit_harga">Harga</label>
                                    <input type="text" name="edit_harga" id="edit_harga" class="form-control"
                                        placeholder="masukan harga" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="edit_gambar_produk">Gambar</label>
                                    <input type="file" class="form-control" id="edit_gambar_produk"
                                        name="edit_gambar_produk" required />
                                    <img id="preview-edit-gambar" height="100" width="100" class="mt-1"
                                        src="/assets/images/default.jpg" alt="Preview Image">
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group mt-3">
                                            <label class="text-white" for="edit_stok">Stok</label>
                                            <input type="number" name="edit_stok" id="edit_stok" class="form-control"
                                                placeholder="" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <div class="form-group mt-3">
                                            <label class="text-white" for="edit_uom">Units</label>
                                            <input type="text" name="edit_uom" id="edit_uom" class="form-control"
                                                placeholder="Per Unit" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="edit_barcode">Barcode</label>
                                    <input type="number" name="edit_barcode" id="edit_barcode" class="form-control"
                                        placeholder="masukan stok" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="edit_kategori">Kategori</label>
                                    <select type="text" name="edit_kategori" id="edit_kategori" class="form-control"
                                        required />
                                    @foreach ($categories as $data_kategori)
                                        <option value="{{ $data_kategori->id }}">{{ $data_kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="process" id="button-submit" class="btn btn-primary"
                                onclick="updateData()">
                                Simpan
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalStok" tabindex="-1" aria-labelledby="stokModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="stokModalLabel">Tambah Stok</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="g-3 needs-validation" novalidate enctype="multipart/for-data">
                                <input type="text" name="get_id_produk" id="get_id_produk" class="form-control"
                                    hidden required />
                                <div class="form-group">
                                    <label class="text-white" for="tambah_stok">Stok</label>
                                    <input type="text" name="tambah_stok" id="tambah_stok"
                                        class="form-control" placeholder="Masukan stok" required />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="process" id="button-submit" class="btn btn-primary"
                                onclick="addStock()">
                                Tambah
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Div untuk menampung barcode -->
            <div style="display: none">
                <div id="barcodeContainer"></div>
            </div>
        </div>
    </div>
    <script>
        let id_koperasi;
        let baseStringProduk;
        let baseStringEditProduk;
        let produkImage = document.getElementById("gambar_produk");
        let produkEditImage = document.getElementById("edit_gambar_produk");
        let previewProduk = document.getElementById("preview-gambar")
        let previewEditProduk = document.getElementById("preview-edit-gambar")
        let type;
        let selectedProductId;

        window.addEventListener("load", () => {
            const url = new URL(window.location.href);
            const path = url.pathname.split("/");
            id_koperasi = {{ $id }};
        });
        produkImage.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewProduk.src = e.target.result;
                    type = file.type.split('/')[1];
                }
                reader.readAsDataURL(file);
            }
        });

        function setBarcodeId(id) {
            selectedProductId = id;
        }

        function printBarcode() {
            const qty = document.getElementById('barcode_qty').value;

            if (!qty || qty <= 0) {
                alert('Masukkan jumlah barcode yang valid');
                return;
            }

            fetch(`/api/products/detail-products/${id_koperasi}/${selectedProductId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.response_code === '00') {
                        const barcodeValue = data.response_message[0].barcode;
                        console.log(barcodeValue)
                        generateBarcodePage(barcodeValue, qty);
                        printElement(document.getElementById('barcodeContainer'));
                    } else {
                        alert('Gagal mendapatkan data barcode');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan');
                });
        }

        function generateBarcodePage(barcodeValue, qty) {
            const barcodesPerPage = 30;
            const rowsPerPage = 10;
            const colsPerPage = 3;
            const totalPages = Math.ceil(qty / barcodesPerPage);
            const barcodeContainer = document.getElementById('barcodeContainer');
            barcodeContainer.innerHTML = '';
            let html = '<link href="https://fonts.googleapis.com/css?family=Libre Barcode 128" rel="stylesheet">'
            html +=
                '<style> td h2 {font-family: "Libre Barcode 128";font-size: 10em;text-align: center; margin: 10px;} table { width: 100%; margin-top:2em;} td { padding: 10px;border:2px solid; } td p { text-align: center; margin: 0; }</style>'
            for (let page = 0; page < totalPages; page++) {
                html += '<div style="page-break-after: always;">';
                html += '<table>';

                for (let row = 0; row < rowsPerPage; row++) {
                    html += '<tr>';

                    for (let col = 0; col < colsPerPage; col++) {
                        const index = page * barcodesPerPage + row * colsPerPage + col;
                        if (index >= qty) break;
                        html += '<td class="barcode"><h2>' + barcodeValue + '</h2><p class="text-center">' + barcodeValue +
                            '</p></td>';
                    }

                    html += '</tr>';
                }

                html += '</table>';
                html += '</div>';
            }

            barcodeContainer.innerHTML = html;
            // barcodeContainer.style.display = 'block';
        }

        function printElement(elem) {
            const domClone = elem.cloneNode(true);
            const printSection = document.createElement('div');
            printSection.id = 'printSection';
            printSection.appendChild(domClone);
            document.body.appendChild(printSection);
            const style = document.createElement('style');
            style.innerHTML =
                '@media print { body * { visibility: hidden; } #printSection, #printSection * { visibility: visible; } #printSection { position: absolute; left: 0; top: 0; } }';
            document.head.appendChild(style);
            window.print();
            document.body.removeChild(printSection);
            document.head.removeChild(style);
        }


        function deleteBtn(id) {
            swal({
                    title: "Hapus Data!",
                    text: "Apakah anda yakin ingin menghapus produk ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        fetch(`/api/products/delete-produk/${id}`, {
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
                                            window.location = "/list_produk";
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

        produkImage.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewProduk.src = e.target.result;
                    baseStringProduk = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        produkEditImage.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewEditProduk.src = e.target.result;
                    baseStringEditProduk = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        function editModal(id) {
            fetch(`/api/products/detail-products/${id_koperasi}/${id}`, {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                    },
                    method: "GET",
                })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    let dataProduct = data.response_message;
                    console.log(dataProduct)
                    if (data.response_code == "00") {
                        document.getElementById('edit_nama_produk').value = dataProduct[0].nama_produk
                        document.getElementById('edit_harga').value = dataProduct[0].harga
                        document.getElementById('edit_stok').value = dataProduct[0].stok
                        document.getElementById('edit_uom').value = dataProduct[0].uom
                        document.getElementById("edit_id_produk").value = dataProduct[0].id
                        previewEditProduk.src = 'http://127.0.0.1:8000' + dataProduct[0].image_produk;
                        document.getElementById("edit_barcode").value = dataProduct[0].barcode;
                        let kategoriSelect = document.getElementById('edit_kategori');
                        let kategoriId = dataProduct[0].id_kategori;

                        for (let i = 0; i < kategoriSelect.options.length; i++) {
                            if (kategoriSelect.options[i].value == kategoriId) {
                                kategoriSelect.options[i].selected = true;
                                break;
                            }
                        }

                    } else {
                        console.error('Failed to update product');
                    }
                }).catch((error) => {
                    console.error('Error:', error);
                });
        }

        function getProduct(id) {
            fetch(`/api/products/detail-products/${id_koperasi}/${id}`, {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                    },
                    method: "GET",
                })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    let dataProduct = data.response_message;
                    console.log(dataProduct)
                    if (data.response_code == "00") {
                        document.getElementById("get_id_produk").value = dataProduct[0].id
                    } else {
                        console.error('Failed to update product');
                    }
                }).catch((error) => {
                    console.error('Error:', error);
                });
        }

        function saveData() {
            const nama_produk = document.getElementById("nama_produk").value;
            const harga = document.getElementById("harga").value;
            const stok = document.getElementById("stok").value;
            const uom = document.getElementById("uom").value;
            const kategori = document.getElementById("kategori").value;
            const image_produk = baseStringProduk;
            const barcode = document.getElementById("barcode").value;

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
                nama_produk,
                harga,
                stok,
                uom,
                kategori,
                barcode,
                type,
                image_produk: image_produk?.split(",")[1]
            };

            // console.log(jsondata)

            fetch(`/api/products/insert-product/${id_koperasi}`, {
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
                                window.location = "/list_produk";
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

        function updateData() {
            const nama_produk = document.getElementById("edit_nama_produk").value;
            const id_produk = document.getElementById("edit_id_produk").value;
            const harga = document.getElementById("edit_harga").value;
            // const stok = document.getElementById("edit_stok").value;
            const uom = document.getElementById("edit_uom").value;
            const barcode = document.getElementById("edit_barcode").value;
            const kategori = document.getElementById("edit_kategori").value;
            const image_produk = baseStringEditProduk;

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
                nama_produk,
                harga,
                // stok,
                barcode,
                uom,
                kategori,
                type,
                image_produk: image_produk?.split(",")[1]
            };
            console.log(jsondata)

            // console.log(jsondata)

            fetch(`/api/products/update-produk/${id_produk}`, {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                    },
                    method: "PATCH",
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
                                window.location = "/list_produk";
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

        function addStock() {
            const stok = parseInt(document.getElementById("tambah_stok").value);
            const id_produk = document.getElementById('get_id_produk').value
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
                stok,
            };

            fetch(`/api/products/add-stock/${id_produk}`, {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                    },
                    method: "PATCH",
                    body: JSON.stringify(jsondata),
                })
                .then((response) => response.json())
                .then((data) => {
                    swal.close();
                    console.log(data)
                    if (data.response_code == "00") {
                        swal({
                            title: "Status",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                window.location = "/list_produk";
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
