@php
    use Carbon\Carbon;
    $orderDate = Carbon::parse($order->order_date);
    $dueDate = Carbon::parse($order->order_date)->addDays(7);
@endphp
@extends('dashboard.layouts.app')

@section('content')
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="doc-container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="invoice-container" style="background-color: white; padding: 20px; border-radius: 8px;">
                            <div class="invoice-inbox">
                                <div id="ct" class="">
                                    <div class="invoice-00001">
                                        <div class="content-section">
                                            <div class="inv--head-section inv--detail-section">
                                                <div class="row">
                                                    <div class="col-sm-6 col-12 mr-auto">
                                                        <div class="d-flex">
                                                            <img class="company-logo mx-3" src="/assets/img/rki_icon.png"
                                                                style="width:8em;background-color: #233668" alt="company">
                                                            <h3 class="in-heading align-self-center">
                                                                {{ $koperasi->nama_koperasi }}</h3>
                                                        </div>
                                                        <p class="inv-street-addr mt-3">{{ $koperasi->alamat }}</p>
                                                        <p class="inv-email-address">{{ $koperasi->email_koperasi }}</p>
                                                        <p class="inv-email-address">{{ $koperasi->no_phone }}</p>
                                                    </div>

                                                    <div class="col-sm-6 text-sm-end">
                                                        <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span
                                                                class="inv-title">Invoice : </span> <span
                                                                class="inv-number">#{{ $order->invoice_number }}</span></p>
                                                        <p class="inv-created-date mt-sm-5 mt-3"><span
                                                                class="inv-title">Invoice Date : </span> <span
                                                                class="inv-date">{{ $orderDate->translatedFormat('d F Y') }}</span>
                                                        </p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span>
                                                            <span
                                                                class="inv-date">{{ $dueDate->translatedFormat('d F Y') }}</span>
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
                                                        <p class="inv-customer-name">
                                                            {{ $order->nama_lengkap ?? $order->nama_customer }}
                                                        </p>
                                                        <p class="inv-street-addr">
                                                            {{ $order->alamat ?? '-' }}</p>
                                                        <p class="inv-email-address">
                                                            {{ $order->email ?? '-' }}</p>
                                                        <p class="inv-email-address">
                                                            {{ $order->nomor_hp ?? $order->no_telp }}</p>
                                                    </div>
                                                    <div
                                                        class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                        <p class="inv-customer-name">{{ $koperasi->nama_koperasi }}</p>
                                                        <p class="inv-street-addr">{{ $koperasi->alamat }}</p>
                                                        <p class="inv-email-address">{{ $koperasi->email_koperasi }}</p>
                                                        <p class="inv-email-address">{{ $koperasi->no_phone }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="inv--product-table-section">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                            <tr>
                                                                <th scope="col">S.No</th>
                                                                <th scope="col">Nama Produk</th>
                                                                <th class="text-end" scope="col">Harga</th>
                                                                <th class="text-end" scope="col">Qty</th>
                                                                <th class="text-end" scope="col">Total Harga</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order_detail as $item)
                                                                <tr>
                                                                    <td>{{ $item->id_produk }}</td>
                                                                    <td>{{ $item->nama_produk }}</td>
                                                                    <td class="text-end">Rp. {{ $item->price }}</td>
                                                                    <td class="text-end">{{ $item->quantity }}</td>
                                                                    <td class="text-end">Rp. {{ $item->total }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="inv--total-amounts">
                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1"></div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="text-sm-end">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">Rp. {{ $order->sub_total }}</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax 10% :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">Rp. {{ $order->tax }}</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="discount-rate">Discount:</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">Rp. {{ $order->discount }}</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                                    <h4 class="">Rp. {{ $order->total_amount }}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
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

                    <div class="col-xl-4">
                        <div class="invoice-actions-btn"
                            style="background-color: white; padding: 20px; border-radius: 8px;">
                            <div class="invoice-action-btn">
                                <div class="row g-3">
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <div class="d-flex flex-row justify-content-center">
                                            <label for="">Metode Pembayaran</label>
                                        </div>
                                        <div class="d-flex flex-row justify-content-center">
                                            <select style="width:19em;height:2.5em;" name="metode_pembayaran"
                                                id="metode_pembayaran" class="form-stock" disabled>
                                                @foreach ($payment_method as $method)
                                                    <option style="font-size: 1em;" value="{{ $method->id }}"
                                                        {{ isset($order->id_payment_method) && $order->id_payment_method == $method->id ? 'selected' : '' }}>
                                                        {{ $method->payment_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <div class="d-flex flex-row justify-content-center">
                                            <label for="">Harga Bayar</label>
                                        </div>
                                        <div class="d-flex flex-row justify-content-center">
                                            <input type="text" id="harga_bayar" style="width: 19em;height:2.5em;"
                                                class="form-stock" placeholder="Rp. ...."
                                                value="{{ $order->paid_value ?? '' }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <div class="d-flex flex-row justify-content-center">
                                            <label for="">Kembalian</label>
                                        </div>
                                        <div class="d-flex flex-row justify-content-center">
                                            <input type="text" id="kembalian" style="width: 19em;height:2.5em;"
                                                class="form-stock" placeholder="Rp. ...."
                                                value="{{ $order->change_value ?? '' }}" disabled>
                                        </div>
                                    </div>
                                    @if ($order->status == 'completed')
                                        <div class="col-xl-12 col-md-3 col-sm-6 d-flex flex-row justify-content-center">
                                            <button onclick="printReceipt()" class="btn btn-dark">Print Receipt</button>
                                        </div>
                                    @endif
                                    <div class="col-xl-12 col-md-3 col-sm-6 d-flex flex-row justify-content-center">
                                        <a style="width:19em;" class="btn btn-dark btn-edit" href="/history-pos"><-
                                                Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden receipt section for printing -->
                    <div id="receipt" style="display: none; width: 80mm; font-size: x-small; padding: 10px;">
                        <div class="header" style="text-align: center;margin-top:15px;">
                            {{-- <img class="w-25" src="{{ asset('assets/img/logo-fav-icon.png') }}" alt="company"> --}}
                            <h3 style="margin: 0; font-weight: bold;">{{ $koperasi->nama_koperasi }}</h3>
                            <p style="margin: 0; font-weight: bold;">{{ $koperasi->alamat }}</p>
                            <p style="margin: 0; font-weight: bold;">{{ $koperasi->email_koperasi }}</p>
                            <p style="margin: 0; font-weight: bold;">{{ $koperasi->no_phone }}</p>
                        </div>
                        <hr style="border: 1px solid #000;">
                        <div class="section" style="margin-bottom: 5px;">
                            <p style="margin: 0;"><strong>Invoice:
                                    #{{ $order->invoice_number }}</strong></p>
                            <p style="margin: 0;">Tanggal: {{ $orderDate->translatedFormat('d F Y') }}
                            </p>
                            <p style="margin: 0;">Due Date: {{ $dueDate->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <hr style="border: 1px solid #000;">
                        <div class="section" style="margin-bottom: 5px;">
                            <p style="margin: 0;"><strong>Invoice To:</strong></p>
                            <p style="margin: 0;"> {{ $order->nama_lengkap ?? $order->nama_customer }}</p>
                            <p style="margin: 0;">{{ $order->alamat ?? '-' }}</p>
                            <p style="margin: 0;">{{ $order->email ?? '-' }}</p>
                            <p style="margin: 0;">{{ $order->nomor_hp ?? $order->no_telp }}</p>
                        </div>
                        <hr style="border: 1px solid #000;">
                        <div class="section" style="margin-bottom: 5px;">
                            <p style="margin: 0;"><strong>Items</strong></p>
                            <table style="width: 100%; border-collapse: collapse;">
                                @foreach ($order_detail as $item)
                                    <tr>
                                        <td style="padding: 2px 0;font-size:small;">{{ $item->nama_produk }}</td>
                                        <td style="padding: 2px 0;font-size:small;">{{ $item->quantity }} x Rp.
                                            {{ $item->price }}</td>
                                        <td style="padding: 2px 0; text-align:right;font-size:small;">Rp.
                                            {{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <hr style="border: 1px solid #000;">
                        <div class="section" style="margin-bottom: 5px;">
                            <p style="margin: 0;">Sub Total: Rp. {{ $order->sub_total }}</p>
                            <p style="margin: 0;">Tax: Rp. {{ $order->tax }}</p>
                            <p style="margin: 0;">Discount: Rp. {{ $order->discount }}</p>
                            <p style="margin: 0;"><strong>Total: Rp.
                                    {{ $order->total_amount }}</strong></p>
                            <p style="margin: 0;">Harga Bayar: Rp. {{ $order->paid_value ?? '' }}</p>
                            <p style="margin: 0;">Kembalian: Rp. {{ $order->change_value ?? '' }}</p>
                        </div>
                        <hr style="border: 1px solid #000;">
                        <div class="footer" style="text-align: center;">
                            <p style="margin: 0;">Thank you for your business!</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        function printReceipt() {
            const receiptContent = document.getElementById('receipt').innerHTML;
            const printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write('<html><head><title>Print Receipt</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('body { font-family: Arial, sans-serif; font-size: small; }');
            printWindow.document.write('.header, .section, .footer { text-align: center; margin: 5px 0; }');
            printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
            printWindow.document.write('td { padding: 5px 0;font-weight:small; }');
            printWindow.document.write('hr { border: 1px solid #000; }');
            printWindow.document.write('</style></head><body>');
            printWindow.document.write(receiptContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
@endsection
