@extends('layouts.conquer')
<<<<<<< HEAD
@section('title')
Transaksi
@endsection
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
                <th>Tanggal Transaksi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $ts)
            <tr>
                <td>{{$ts->id}}</td>
                <td>{{$ts->user->name}}</td>
                <td>{{$ts->tanggal_transaksi}}</td>
                <td>
                <a class="btn btn-default" data-toggle="modal" href="#basic" 
                    onclick="getDetailData({{$ts->id}});">Lihat Rincian Pembelian</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="Modal Title">Rincian</h4>
            </div>
            <div class="modal-body" id="msg">
                
            </div>
            <div class="modal-footer">
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
@section('javascript')
<script>
    function getDetailData(id){
        $.ajax({
            type:'POST',
            url:'{{route("transaksi.showAjax")}}',
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
=======
@section('judul_halaman')
    Master Medicine
@endsection
@section('content')
    <!-- BEGIN Portlet PORTLET-->
    <div class="page-container">
          @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            <div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            <div>
            @endif
      </div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i>Master Membership
			</div>
		    <div class="actions">
		    </div>
	    </div>
		<div class="portlet-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Poin</th>
                        <th>Member</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->nama}}</td>
                        <td>{{$d->alamat}}</td>
                        <td>{{$d->poin}}</td>
                        <td>{{$d->membership->jenis_membership}}</td>
                        <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                70%
                            </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>         
          </div>                          
        </div> 
	</div>
@endsection
>>>>>>> f8584fed4d4828c83c41d3370108fd5b2501f369
