<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <a href="{{ route('registrasi')}}">
                <img src="{{ asset('assets/img/rki_icon.png') }}" alt="" width="130" />
            </a>
            {{-- @if (Route::currentRouteName() == 'anggota.primkop')
                <a href="{{ route('anggota.primkop', ['name' => request()->route('name')]) }}">
                    <img src="{{ asset('assets/img/rki_icon.png') }}" alt="" width="130" />
                </a>
            @elseif (Route::currentRouteName() == 'koperasi.rki')
                <a href="{{ route('koperasi.rki', ['tingkat' => request()->route('tingkat')]) }}">
                    <img src="{{ asset('assets/img/rki_icon.png') }}" alt="" width="130" />
                </a>
            @elseif (Route::currentRouteName() == 'koperasi')
                <a href="{{ route('koperasi', ['tingkat' => request()->route('tingkat'), 'name'=>request()->route('name')]) }}">
                    <img src="{{ asset('assets/img/rki_icon.png') }}" alt="" width="130" />
                </a>
            @endif --}}
        </div>

        <div class="col-7">
            <!-- <div id="social">
                <ul>
                    <li><a href="#0"><i class="social_facebook"></i></a></li>
                    <li><a href="#0"><i class="social_twitter"></i></a></li>
                    <li><a href="#0"><i class="social_instagram"></i></a></li>
                    <li><a href="#0"><i class="social_linkedin"></i></a></li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
