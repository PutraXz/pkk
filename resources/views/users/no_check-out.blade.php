@extends('layouts.navbar')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/product') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/product') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                    @if(!empty($shop))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($shop as $product)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('products') }}/{{ $product->product->file }}" width="100" alt="...">
                                </td>
                                <td>{{ $product->product->title }}</td>
                                <td>{{ $product->jumlah }} pcs</td>
                                <td align="right">Rp. {{ number_format($product->product->price) }}</td>
                                <td align="right">Rp. {{ number_format($product->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('check-out') }}/{{ $product->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($db) }}</strong></td>
                                <td>
                                    <button id="pay-button" class="btn btn-success">Check Out</button>
                                    
                                </td>
                            </tr>   
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
