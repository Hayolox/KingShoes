@extends('layouts.app')
@section('content')
<section id="cek-resi">
    <div class="container mb-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-8 ">
                <div class="card ">
                    <form autocomplete="off " action="#">
                        <div class="card-body ">
                            <h1 class="mx-lg-5 my-lg-4 px-lg-3 text-center">Cek <span>Kondisi Sepatumu </span>, Biar Hati-Mu <span>Tenang</span></h1>
                            <h3 class="text-center my-3">Cek Masukkan <i>NOMOR RESI</i></h3>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="search" id="check-resi" placeholder="Masukkan Resi Yg Kamu Cari . . . . .">
                            </div>
                            <p class="text-center">Masukan 4 digit nomor resimu dan klik tombol lacak untuk melihat posisinya.</p>
                            <div class="d-grid gap-2 col-10 mx-auto mb-3">
                                <button id="lacak" type="submit " class="btn btn-primary bg-gradient">Lacak</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @isset($transaction)
                @foreach ($identities as $item)
                    <div class="row align-items-center justify-content-center mt-2">
                        <div class="d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <h5 class="card-title">Nama : {{ $item->name }}</h5>
                                <h5 class="card-title">Alamat : {{ $item->address }}</h5>
                                <h5 class="card-title">Jumlah Sepatu : {{ $item->tran->where('receipt_number', $item->receipt_number)->count() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
    </div>
</section>
@isset($transaction)

    @if ($count > 0)
    <section id="tabel-informasi">
        <div class="container mb-5 mx-auto">
            <div class="table-responsive">
                <table border="1" id="tab" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Sepatu</th>
                            <th scope="col">Pilihan Paket</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $data => $item)
                        <tr>
                            <td>{{ $transaction->firstItem() + $data }}</td>
                            <td>{{ $item->name_shoe }}</td>
                            <td>{{ $item->package->package_name}}</td>
                            <td>{{ $item->package->price }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @else
    <div class="col-3 mb-5 mx-auto">
        <p class="bg bg-danger text-center">Nomor Resi Tidak Ada</p>
    </div>
    @endif
@endisset

@endsection