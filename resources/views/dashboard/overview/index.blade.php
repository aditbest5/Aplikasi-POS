@extends('dashboard.layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        @if ($tingkatan == 'rki')
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">INKOP</h6>
                            </div>
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                {{ $inkop_count }}
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">

                            </div>

                            <div class="">
                                <div class="w-icon">

                                </div>
                            </div>

                        </div>
                        <div class="75 mt-2"><input type="hidden" id="linkInkop"
                            value="https://registrasi.rkicoop.co.id/koperasi/rki/inkop"><button onclick="copyLink('inkop')"
                            class="btn btn-info">Link Daftar
                            Inkop</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">PUSKOP</h6>
                            </div>
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                {{ $puskop_count }}
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">

                            </div>

                            <div class="">
                                <div class="w-icon">

                                </div>
                            </div>

                        </div>
                        <div class="75 mt-2"><input type="hidden" id="linkPuskop"
                                value="https://registrasi.rkicoop.co.id/koperasi/rki/puskop"><button
                                onclick="copyLink('puskop')" class="btn btn-info">Link Daftar
                                Puskop</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">PRIMKOP</h6>
                            </div>
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                {{ $primkop_count }}
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">

                            </div>

                            <div class="">
                                <div class="w-icon">

                                </div>
                            </div>

                        </div>
                        <div class="75 mt-2"><input type="hidden" id="linkPrimkop"
                                value="https://registrasi.rkicoop.co.id/koperasi/rki/primkop"><button
                                onclick="copyLink('primkop')" class="btn btn-info">Link Daftar
                                Primkop</button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($tingkatan == 'inkop')
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">PUSKOP</h6>
                            </div>
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                {{ $puskop_count }}
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">

                            </div>

                            <div class="">
                                <div class="w-icon">

                                </div>
                            </div>
                        </div>
                        <div class="50 mt-2"><input type="hidden" id="linkInkop2"
                            value="https://registrasi.rkicoop.co.id/koperasi/"><button onclick="copyLink2('inkop')"
                            class="btn btn-info">Link Daftar
                            Puskop</button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">PRIMKOP</h6>
                            </div>
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                {{ $primkop_count }}
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">

                            </div>

                            <div class="">
                                <div class="w-icon">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($tingkatan == 'puskop')
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">PRIMKOP</h6>
                            </div>
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                {{ $primkop_count }}
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">

                            </div>

                            <div class="">
                                <div class="w-icon">

                                </div>
                            </div>
                        </div>
                        <div class="50 mt-2"><input type="hidden" id="linkPuskop2"
                                value="https://registrasi.rkicoop.co.id/koperasi/"><button onclick="copyLink2('puskop')"
                                class="btn btn-info">Link Daftar
                                Primkop</button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($tingkatan == 'primkop')
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">ANGGOTA</h6>
                            </div>
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="expenses"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="expenses"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                {{ $anggota_count }}
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">

                            </div>

                            <div class="">
                                <div class="w-icon">

                                </div>
                            </div>
                        </div>
                        <div class="50 mt-2"><input type="hidden" id="linkAnggota"
                                value="https://registrasi.rkicoop.co.id/anggota/"><button onclick="copyLink2('anggota')"
                                class="btn btn-info">Link Daftar
                                Anggota</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        function copyLink(tingkatan) {
            console.log(tingkatan)
            let copyText;
            if (tingkatan == 'inkop') {
                copyText = document.getElementById("linkInkop").value;
                let tempInput = document.createElement("input");
                tempInput.type = "text";
                tempInput.value = copyText;
                document.body.appendChild(tempInput);
                // Select the text field
                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(tempInput.value).then(() => {
                    // Alert the copied text
                    swal("Good!", "Sukses Copy Link!", "success");

                    // alert("Copied the text: " + tempInput.value);
                });
                // Remove the temporary input element
                document.body.removeChild(tempInput);


            } else if (tingkatan == 'puskop') {
                copyText = document.getElementById("linkPuskop").value;
                let tempInput = document.createElement("input");
                tempInput.type = "text";
                tempInput.value = copyText;
                document.body.appendChild(tempInput);
                // Select the text field
                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(tempInput.value).then(() => {
                    // Alert the copied text
                    swal("Good!", "Sukses Copy Link!", "success");

                    // alert("Copied the text: " + tempInput.value);
                });
                // Remove the temporary input element
                document.body.removeChild(tempInput);
            } else if (tingkatan == 'primkop') {
                copyText = document.getElementById("linkPrimkop").value;
                let tempInput = document.createElement("input");
                tempInput.type = "text";
                tempInput.value = copyText;
                document.body.appendChild(tempInput);
                // Select the text field
                tempInput.select();
                tempInput.setSelectionRange(0, 99999);

                // Copy the text inside the text field
                navigator.clipboard.writeText(tempInput.value).then(() => {
                    // Alert the copied text
                    swal("Good!", "Sukses Copy Link!", "success");
                    // alert("Copied the text: " + tempInput.value);
                });
                // Remove the temporary input element
                document.body.removeChild(tempInput);
            }
        }

        function copyLink2(tingkatan) {
            console.log(tingkatan)
            let copyText;
            if (tingkatan == 'anggota') {
                let object = @json($koperasi);
                let slug_url = object['slug'];
                copyText = document.getElementById("linkAnggota").value;
                let tempInput = document.createElement("input");
                tempInput.type = "text";
                tempInput.value = copyText + 'primkop/' + slug_url;
                document.body.appendChild(tempInput);
                // Select the text field
                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(tempInput.value).then(() => {
                    // Alert the copied text
                    swal("Good!", "Sukses Copy Link!", "success");
                    // alert("Copied the text: " + tempInput.value);
                });
                // Remove the temporary input element
                document.body.removeChild(tempInput);
            } else if (tingkatan == 'puskop') {
                let object = @json($koperasi);
                let slug_url = object['slug'];
                copyText = document.getElementById("linkPuskop2").value;
                let tempInput = document.createElement("input");
                tempInput.type = "text";
                tempInput.value = copyText + tingkatan + '/' + slug_url;
                document.body.appendChild(tempInput);
                // Select the text field
                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(tempInput.value).then(() => {
                    // Alert the copied text
                    swal("Good!", "Sukses Copy Link!", "success");
                    // alert("Copied the text: " + tempInput.value);
                });
                // Remove the temporary input element
                document.body.removeChild(tempInput);
            } else if (tingkatan == 'inkop') {
                let object = @json($koperasi);
                let slug_url = object['slug'];
                copyText = document.getElementById("linkInkop2").value;
                let tempInput = document.createElement("input");
                tempInput.type = "text";
                tempInput.value = copyText + tingkatan + '/' + slug_url;
                document.body.appendChild(tempInput);
                // Select the text field
                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(tempInput.value).then(() => {
                    // Alert the copied text
                    swal("Good!", "Sukses Copy Link!", "success");
                    // alert("Copied the text: " + tempInput.value);
                });
                // Remove the temporary input element
                document.body.removeChild(tempInput);
            }
        }
    </script>
@endsection
