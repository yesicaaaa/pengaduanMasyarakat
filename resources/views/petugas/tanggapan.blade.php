@extends('template')
@extends('side-navbar')
@section('css', '/css/content.css')
@section('sidenavcss', '/css/side-navbar.css')
@section('title', 'Beri Tanggapan | Pengaduan Masyarakat')
@section('content')
<div class="content">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Petugas</li>
      <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-fw fa-edit mr-2"></i> Beri Tanggapan</li>
    </ol>
  </nav>
  @if(session('status'))
  <div class="alert alert-success" role="alert">
    {{session('status')}}
  </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal Pengaduan</th>
        <th scope="col">Nama Pengadu</th>
        <th scope="col">Status</th>
        <th scope="col">Tanggal Tanggapan</th>
        <th scope="col">Detail</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pengaduan as $p)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$p->tgl_pengaduan}}</td>
        <td>{{$p->name}}</td>
        <td>{{$p->status}}</td>
        @if($p->status != 'selesai')
        <td>-</td>
        @endif
        @foreach($tanggapan as $t)
        @if($p->status == 'selesai')
        <td>{{$t->tgl_tanggapan}}</td>
        @endif
        @endforeach
        <td><a href="/beri_tanggapan_petugas/{{$p->id_pengaduan}}" class="badge bg-success">Detail</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection