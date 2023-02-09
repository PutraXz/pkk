@extends('layouts.navbar')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('/product')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/product')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $nani->name_theme}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{url('themes')}}/{{ $nani->preview}}" class="rounded mx-auto d-block " width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $nani->name_theme}}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td> :</td>
                                        <td>Rp. {{number_format($nani->price)}}</td>
                                    </tr>
                                <form action="" method="post">
                                @csrf
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                        </td>
                                    </tr>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
