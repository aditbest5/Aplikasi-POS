@extends('dashboard.layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="w-50 mb-5" id="scan-form">
            <input id="barcode-input" type="text" name="txt" placeholder="Scan Barcode" class="form-control">
        </div>

        <div class="simple-pill col-lg-7">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn btn-light" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true" style="width:10em; height: 3em;">Produk</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-light" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false" style="width:10em; height: 3em;">Pulsa</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-light" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false" style="width:10em; height: 3em;">PDAM</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-light" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
                        aria-selected="false" style="width:10em; height: 3em;">PLN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-light" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
                        aria-selected="false" style="width:10em; height: 3em;">Tagihan</button>
                </li>
            </ul>
            {{-- <div class="mx-2 row g-2">
                <div class="col-lg-2 col-6">
                    <button onclick="produkFisik()" class="btn btn-info" style="width:8em; height: 5em;">Produk</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">Pulsa</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">PDAM</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">PLN</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">Tagihan</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">Pulsa</button>
                </div>
            </div> --}}
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="row layout-spacing mt-4">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                                <input id="search-input" type="text" name="txt" placeholder="Search"
                                    class="form-control" required="" onkeyup="searchBtn(this.value)">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                                <select class="form-select form-select" aria-label="Default select example"
                                    onchange="filterCategoryBtn(this.value)">
                                    <option value="00" selected="">All Category</option>
                                    @foreach ($categories as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Most Upvoted</option>
                                    <option value="3">Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="row container-product">


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="row layout-spacing mt-4">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                                <input id="t-text" type="text" name="txt" placeholder="Search"
                                    class="form-control" required="">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">All Category</option>
                                    <option value="3">Wordpress</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Themeforest</option>
                                    <option value="3">Travel</option>
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Most Upvoted</option>
                                    <option value="3">Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-2.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">14 Tips to improve your photography</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/list-blog-style-3.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">29 Most Beautiful Places in the World</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-4.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">7 Effective ways to instantly look more faishonable
                                        </h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/masonry-blog-style-4.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">How to plan a trip in 7 easy steps</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="row layout-spacing mt-4">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                                <input id="search-input" type="text" name="txt" placeholder="Search"
                                    class="form-control" required="" onkeyup="searchBtn(this.value)">
                            </div>
                            <div
                                class="col-xl-3
                                    col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">All Category</option>
                                    <option value="3">Wordpress</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Themeforest</option>
                                    <option value="3">Travel</option>
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Most Upvoted</option>
                                    <option value="3">Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-2.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">14 Tips to improve your photography</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-1.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">The ideal work from home office setup</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-3.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">Top haunted houses in Great Britain</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/list-blog-style-3.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">29 Most Beautiful Places in the World</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-4.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">7 Effective ways to instantly look more faishonable
                                        </h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                    tabindex="0">
                    <div class="row layout-spacing mt-4">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                                <input id="t-text" type="text" name="txt" placeholder="Search"
                                    class="form-control" required="">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">All Category</option>
                                    <option value="3">Wordpress</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Themeforest</option>
                                    <option value="3">Travel</option>
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Most Upvoted</option>
                                    <option value="3">Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-3.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">Top haunted houses in Great Britain</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/masonry-blog-style-3.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">9 Reasons why sugar is bad for your health</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/masonry-blog-style-4.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">How to plan a trip in 7 easy steps</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-lg-5">
            <div class="invoice-container" style="background-color: white; padding: 20px; border-radius: 8px;">
                <div class="invoice-inbox">
                    <div id="ct" class="">
                        <div class="invoice-00001">
                            <div class="content-section">
                                <div class="inv--head-section inv--detail-section">
                                    <div class="row">
                                        <div class="col-sm-6 col-12 mr-auto">
                                            <div class="d-flex">
                                                <img class="company-logo" src="/assets/img/rki_icon.png"
                                                    style="width:6em;background-color: #233668" alt="company">
                                                <h3 class="in-heading align-self-center">{{ $username }}</h3>
                                            </div>
                                            <p class="inv-street-addr mt-3">{{ $koperasi->nama_koperasi }}</p>
                                            <p class="inv-email-address">{{ $koperasi->email_koperasi }}</p>
                                            <p class="inv-email-address">{{ $koperasi->no_phone }}</p>
                                            <p class="inv-email-address">Masukan No Anggota:</p>
                                            <p class="inv-email-address"><input type="text" id="no_anggota"
                                                    name="no_anggota" class="form-control w-100" style="height: 2em;"
                                                    placeholder="Masukan No Anggota"><input type="text"
                                                    id="id_anggota" name="id_anggota" class="form-control w-100"
                                                    style="height: 2em;" placeholder="" hidden></p>

                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4">
                                                <span class="inv-title">Invoice : </span>
                                                <span id="invoice-number" class="inv-number"></span>
                                            </p>
                                            <p class="inv-created-date mt-sm-5 mt-3">
                                                <span class="inv-title">Invoice Date : </span>
                                                <span id="invoice-date" class="inv-date"></span>
                                            </p>
                                            <p class="inv-due-date">
                                                <span class="inv-title">Due Date : </span>
                                                <span id="due-date" class="inv-date"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="inv--detail-section inv--customer-detail-section">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                            <p class="inv-to">Invoice To</p>
                                        </div>
                                        <div
                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                            <h6 class="inv-title">Invoice From</h6>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                            <p class="inv-customer-name"><input type="text" id="nama_customer"
                                                    name="nama_customer" class="form-control w-75" style="height: 1.5em;"
                                                    placeholder="nama customer" required></p>
                                            <p class="inv-street-addr"><input type="text" id="alamat_customer"
                                                    name="alamat_customer" class="form-control w-75"
                                                    style="height: 1.5em;" placeholder="alamat customer"></p>
                                            <p class="inv-email-address" required><input type="text" id="email_customer"
                                                    name="email_customer" class="form-control w-75"
                                                    style="height: 1.5em;" placeholder="email customer" required></p>
                                            <p class="inv-email-address"><input type="text" id="no_telp_customer"
                                                    name="no_telp_customer" class="form-control w-75"
                                                    style="height: 1.5em;" placeholder="telp customer" required></p>
                                        </div>
                                        <div
                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                            <p class="inv-customer-name">{{ $koperasi->nama_koperasi }}</p>
                                            <p class="inv-street-addr">{{ $koperasi->alamat }} </p>
                                            <p class="inv-email-address">{{ $koperasi->email_koperasi }}</p>
                                            <p class="inv-email-address">{{ $koperasi->no_phone }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="inv--product-table-section">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.No</th>
                                                    <th scope="col">Items</th>
                                                    <th class="text-end" scope="col">Qty</th>
                                                    <th class="text-end" scope="col">Price</th>
                                                    <th class="text-end" scope="col">Amount</th>
                                                    <th class="text-end" scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice-table">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="inv--total-amounts">
                                    <div class="row mt-4">
                                        <div class="col-sm-2 col-12 order-sm-0 order-1"></div>
                                        <div class="col-sm-10 col-12 order-sm-1 order-0">
                                            <div class="text-sm-end">
                                                <div class="row">
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Sub Total :</p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p id="sub-total">Rp. 0</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Total Qty:</p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p id="total-qty">0</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Tax 11% :</p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p id="tax">Rp. 0</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class="discount-rate">Discount :</p>
                                                    </div>
                                                    <div class="col-sm-4 col-5 d-flex flex-row">
                                                    <span>Rp.  </span> <input id="discount" name="discount" class="form-control" style="max-height: 1em;" oninput="calculateGrandTotal()">
                                                    </div>
                                                    <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                        <h4 class="">Grand Total : </h4>
                                                    </div>
                                                    <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                        <h4 id="grand-total">Rp. 0</h4>
                                                    </div>
                                                    <div class="col-sm-4 col-5 mt-3">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary"
                                                    onclick="checkoutItems()">Checkout</button>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="inv--note">
                                        <div class="row mt-4">
                                            <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                <p>Note: Thank you for doing Business with us.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            let listProduk = @json($products);
            let id_koperasi;
            let invoiceItems = [];
            let invoiceDate;
            let invoiceDue;
            let invoice_id = {{$orderCount + 1}}; // Initial invoice_id
            let invoiceNumber;
            let tax;
            let discount;
            let grandTotal;
            let subTotal;
            let totalQty;

            window.addEventListener("load", () => {
                const url = new URL(window.location.href);
                const path = url.pathname.split("/");
                id_koperasi = {{ $id }};
                displayProducts(listProduk); // Display all products on load
                setInvoiceDetails()

            });

            function searchBtn(value) {
                const filteredProducts = listProduk.filter(product => product.nama_produk.toLowerCase().includes(value
                    .toLowerCase()));
                displayProducts(filteredProducts);
            }

            function filterCategoryBtn(value) {
                if (value === "00") {
                    displayProducts(listProduk); // Display all products if "All Category" is selected
                } else {
                    const filteredProducts = listProduk.filter(product => product.id_kategori == value);
                    displayProducts(filteredProducts);
                }
            }

            document.getElementById('no_anggota').addEventListener('change', function(event) {
                const no_anggota = event.target.value;
                fetch(`/api/anggota/list/${no_anggota}/${id_koperasi}`, {
                        headers: {
                            "Access-Control-Allow-Origin": "*",
                            "Content-Type": "application/json",
                        },
                        method: 'GET',
                    }).then(response => response.json())
                    .then(data => {
                        let {
                            response_code,
                            response_message
                        } = data
                        if (response_code == '00') {
                            document.getElementById('id_anggota').value = response_message.id;
                            document.getElementById('nama_customer').value = response_message.nama_lengkap ? response_message.nama_lengkap : '-';
                            document.getElementById('alamat_customer').value = response_message.alamat ? response_message.alamat : '-' ;
                            document.getElementById('email_customer').value = response_message.email ? response_message.email : '-';
                            document.getElementById('no_telp_customer').value = response_message.nomor_hp ? response_message.nomor_hp : '-';
                            document.getElementById('nama_customer').disabled = true
                            document.getElementById('alamat_customer').disabled = true;
                            document.getElementById('email_customer').disabled = true
                            document.getElementById('no_telp_customer').disabled = true;

                        } else {
                            alert(response_message);
                        }
                    })

                event.target.value = no_anggota; // Clear the input field for the next scan
            });

            function setInvoiceDetails() {
                invoiceNumber= String(invoice_id).padStart(5, '0'); // Pad the invoice_id with leading zeros to 5 digits
                document.getElementById('invoice-number').textContent = `#${invoiceNumber}`;
                const invoiceDate = new Date(); // 17 June 2024 (Month is 0-indexed, so 5 means June)
                const dueDate = new Date(invoiceDate);
                dueDate.setDate(invoiceDate.getDate() + 7); // Set due date 7 days from invoice date

                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                document.getElementById('invoice-date').textContent = invoiceDate.toLocaleDateString('id-ID', options);
                document.getElementById('due-date').textContent = dueDate.toLocaleDateString('id-ID', options);
            }
            document.getElementById('barcode-input').addEventListener('change', function(event) {
                const barcodeValue = event.target.value;
                searchByBarcode(barcodeValue);
                event.target.value = ''; // Clear the input field for the next scan
            });

            function searchByBarcode(value) {
                const product = listProduk.find(product => product.barcode === value);
                if (product) {
                    addToInvoice(product);
                } else {
                    alert('Produk tidak ditemukan');
                }
            }

            function addProduct(value) {
                const product = listProduk.find(product => product.id_produk === value);
                addToInvoice(product);

            }

            function deleteFromInvoice(productId) {
                invoiceItems = invoiceItems.filter(item => item.id !== productId);
                displayInvoice();
            }

            function addToInvoice(product) {
                const existingItem = invoiceItems.find(item => item.id === product.id_produk);
                if (existingItem) {
                    existingItem.qty += 1;
                    existingItem.amount += product.harga;
                } else {
                    invoiceItems.push({
                        id: product.id_produk,
                        name: product.nama_produk,
                        qty: 1,
                        price: product.harga,
                        amount: product.harga
                    });
                }
                displayInvoice();
            }

            function updateQuantity(productId, change) {
                const item = invoiceItems.find(item => item.id === productId);
                if (item) {
                    item.qty += change;
                    if (item.qty <= 0) {
                        deleteFromInvoice(productId);
                    } else {
                        item.amount = item.qty * item.price;
                        displayInvoice();
                    }
                }
            }

            function displayInvoice() {
                let invoiceTableBody = document.querySelector('#invoice-table');
                invoiceTableBody.innerHTML = '';
                subTotal = 0;
                totalQty = 0;
                invoiceItems.forEach((item, index) => {
                    subTotal += item.amount;
                    totalQty += item.qty;
                    let row = `
            <tr>
                <td>${index + 1}</td>
                <td class="text-wrap">${item.name}</td>
                <td class="text-end"><button onclick="updateQuantity(${item.id}, -1)" class="btn btn-outline-secondary btn-sm">-</button> ${item.qty} <button onclick="updateQuantity(${item.id}, 1)" class="btn btn-outline-secondary btn-sm">+</button></td>
                <td class="text-end">${item.price}</td>
                <td class="text-end">${item.amount}</td>
                <td class="text-end"><button class="btn btn-danger btn-sm" onclick="deleteFromInvoice(${item.id})">Delete</button></td>

            </tr>`;
                    invoiceTableBody.insertAdjacentHTML('beforeend', row);
                });

                tax = subTotal * 0.11;
                discount = document.getElementById('discount').value || 0;
                grandTotal = subTotal + tax - discount;

                document.getElementById('sub-total').textContent = `Rp. ${subTotal.toFixed(2)}`;
                document.getElementById('total-qty').textContent = totalQty;
                document.getElementById('tax').textContent = `Rp. ${tax.toFixed(2)}`;
                // document.getElementById('discount').textContent = `Rp. ${discount.toFixed(2)}`;
                document.getElementById('grand-total').textContent = `Rp. ${grandTotal.toFixed(2)}`;
            }

            function displayProducts(products) {
                let container = document.querySelector('.container-product');
                container.innerHTML = '';
                products.forEach(product => {
                    let productCard = `
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card product-card p-3">
                        <img width="100px" height="100px" src="${product.image_produk}" class="card-img-top" alt="${product.nama_produk}">
                        <div class="card-body px-0 pb-0">
                            <h6 class="card-title mb-3 text-truncate">${product.nama_produk}</h6>
                            <p>Rp. ${product.harga}</p>
                            <p>Stok: ${product.stok}</p>
                            <div class="media mt-4 mb-0 pt-1">
                                <button onclick="addProduct(${product.id_produk})" class="btn btn-primary" type="button"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="Shopping-Cart-Add--Streamline-Ultimate"><desc>Shopping Cart Add Streamline Icon: https://streamlinehq.com</desc><path d="M4.5 20.968a1.875 1.875 0 1 0 3.75 0 1.875 1.875 0 1 0 -3.75 0Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M12 20.968a1.875 1.875 0 1 0 3.75 0 1.875 1.875 0 1 0 -3.75 0Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="m0.75 7.093 2.329 7.887a1.5 1.5 0 0 0 1.45 1.113h10.818A1.5 1.5 0 0 0 16.8 14.98l3.238 -12.154a2.249 2.249 0 0 1 2.174 -1.67h1.038" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="m9.75 6.343 0 6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="m6.75 9.343 6 0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg><span class="ml-2">Beli</span></button>
                            </div>
                        </div>
                    </div>
                </div>`;
                    container.insertAdjacentHTML('beforeend', productCard);
                });
            }
            function calculateGrandTotal() {
                displayInvoice();
            }

            function checkoutItems() {
                let items = invoiceItems.map(item => ({
                    id_product: item.id,
                    quantity: item.qty,
                    price: item.price,
                    total: item.amount,
                    id_koperasi: id_koperasi,
                })); // Extract item names into a new array of objects
                let id_anggota = document.getElementById('id_anggota').value;
                let data_customer;
                let jsonData = {}
                let nama_customer = document.getElementById('nama_customer').value
                let email_customer = document.getElementById('email_customer').value
                let alamat_customer = document.getElementById('alamat_customer').value
                let no_telp_customer = document.getElementById('no_telp_customer').value

                if(!nama_customer || !email_customer || !alamat_customer || !no_telp_customer){
                    swal('Perhatian!', 'Harap Isi Data Customer', 'info');
                    return false;
                }
                data_customer = {
                    nama_customer,
                    email: email_customer,
                    alamat: alamat_customer,
                    no_telp: no_telp_customer,
                    id_koperasi,
                }
                jsonData = {
                    items,
                    id_anggota,
                    id_koperasi,
                    data_customer,
                    subTotal,
                    grandTotal,
                    totalQty,
                    tax,
                    discount,
                    invoiceNumber,
                }
                console.log(jsonData)
                swal({
                    title: "Please wait",
                    text: "Submitting data...",
                    // icon: "/assets/images/loading.gif",
                    button: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    className: "swal-loading",
                });


                fetch(`/api/pos/checkout`, {
                        headers: {
                            "Access-Control-Allow-Origin": "*",
                            "Content-Type": "application/json",
                        },
                        method: "POST",
                        body: JSON.stringify(jsonData),
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
                                    window.location = `/checkout/${data.order_id}`;
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
