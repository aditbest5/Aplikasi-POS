@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Ubah  Password</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">    
            <div class="widget-content widget-content-area br-8 p-3">
           
                <form class="row g-3 needs-validation" novalidate enctype="multipart/for-data">
                   
                    <div class="col-md-12 position-relative">
                        <label for="password_lama">Password Lama</label>
                        <input type="text" name="password_lama" id="password_lama" class="form-control" placeholder="Masukan Password Lama" required /> 
                    </div>

                    <div class="col-md-12 position-relative">
                        <label for="password_baru">Password Baru</label>
                        <input type="text" name="password_baru" id="password_baru" class="form-control" placeholder="Masukan Password Baru" required /> 
                    </div>

                    <div class="col-md-12 position-relative">
                        <label for="konfirmasi">Konfirmasi</label>
                        <input type="text" name="konfirmasi" id="konfirmasi" class="form-control" placeholder="Masukan Konfirmasi" required /> 
                    </div>

                    <div class="col-12">
                        <button type="button" name="process" id="button-submit" class="btn btn-primary">
                            Simpan Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('js')
   
@endpush
