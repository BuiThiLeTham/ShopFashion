@extends('main')
<div class="container-oder">
@section('content')
@if (empty($customers))
<p style="margin-top: 200px">Bạn chưa đặt đơn nào!</p>
    
@else
<div class="box-form">
<h1 class="title" >Đơn hàng đã đặt</h1>
    <table class="table" style="margin-top: 35px">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Ngày Đặt hàng</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->customer->name }}</td>
                <td>{{ $customer->customer->phone }}</td>
                <td>{{ $customer->customer->email }}</td>
                <td>{{ $customer->created_at }}</td>
                <td style="text-align: center;">
                    <a class="btn btn-primary btn-sm" href="{{ route('view_more', ['customer' => $customer->customer_id]) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <!-- <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $customer->id }}, '/admin/customers/destroy')">
                        <i class="fa fa-trash"></i>
                    </a> -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
    <div class="card-footer clearfix">
        {!! $customers->links() !!}
    </div>
    @endif
@endsection

<link rel="stylesheet" href="{{ asset('css/oder.css') }}">
