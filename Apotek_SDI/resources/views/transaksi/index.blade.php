@extends('layouts.conquer')
@section('content')

<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif
    <h2>Transaksi Pembelian</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pembeli</th>
                <th>Kasir</th>
                <th>Tanggal Transaksi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr id='tr_{{$d->id}}'>
                <td>{{$d->id}}</td>
                <td class='editable' id='td_name_{{$d->id}}'>{{$d->name}}</td>
                <td>
                    <a href="#modalEdit" data-toggle='modal' class='btn btn-warning btn-xs' onclick="getEditForm({{$d->id}})">EDIT</a>
                    <a class='btn btn-danger btn-xs' onclick="if(confirm('Apakah yakin ingin menghapus data?')) deleteDataRemoveTR({{$d->id}})">DELETE</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
@endsection
@section('javascript')
<script>
    function getDetailData(id){
        $.ajax({
            type:'POST',
            url:'{{route("transaction.showAjax")}}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'id':id
                },
            success: function(data){
            $('#msg').html(data.msg)
            }
        });
    }
</script>
@endsection