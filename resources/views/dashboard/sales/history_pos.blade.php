@php
    use Carbon\Carbon;
@endphp
@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Sales</a></li>
    <li class="breadcrumb-item active" aria-current="page">History POS</li>
@endsection

@section('content')
    <div class="row">
        <p class="mt-2 text-white">
            <h2 class="text-white fs-2 fw-bold">History Transaksi POS</h2>
        </p>
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Invoice Number</th>
                            <th>Tanggal Order</th>
                            <th>Sub Total</th>
                            <th>Tax</th>
                            <th>Discount</th>
                            <th>Grand Total</th>
                            <th>Status</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $list_order)
                        <tr>
                            <td>{{$list_order->id}}</td>
                            <td>#{{$list_order->invoice_number}}</td>
                            <td class="text-wrap">Rp. {{ Carbon::parse($list_order->order_date)->translatedFormat('d F Y')}}</td>
                            <td class="text-center">Rp. {{$list_order->sub_total}}</td>
                            <td class="text-center">Rp. {{$list_order->tax}}</td>
                            <td class="text-center">Rp. {{$list_order->discount}}</td>
                            <td class="text-center">Rp. {{$list_order->total_amount}}</td>
                            <td class="text-center"><span class="badge  {{ $list_order->status == 'pending' ? 'badge-light-secondary' : ($list_order->status == 'rejected' ? 'badge-light-danger' : 'badge-light-success') }} ">{{strtoupper($list_order->status)}}</span></td>
                            <td class="text-center"><a href='{{ $list_order->status == 'pending' ? '/checkout/' . $list_order->id : '/detail-order/'. $list_order->id }}' class="btn {{$list_order->status == 'pending' ? 'btn-danger' : 'btn-info'}}">{{$list_order->status == 'pending' ? 'Bayar' : 'View Detail'}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    </script>
@endsection
