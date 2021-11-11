@extends('layouts.admin')
@section('title', 'Admin Identities')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
           <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Diri</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger mt-2 mb-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('Identities.update',$item->receipt_number ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $item->name }}" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" value="{{ $item->phone_number }}" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ $item->address }}" class="form-control" id="address">
                        </div>

                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Sepatu</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>status</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Action</th>
            
                                    </tr>
                                </thead>
                        
                                <tbody>
            
                                    @foreach ($item->transaction as $data => $item)
                                    <tr>
                                        <td>{{ $item->name_shoe }}</td>
                                        <td>{{ $item->package->package_name}}</td>
                                        <td>{{ $item->package->price}}</td>
                                        <td>
                                           <a href="{{ route('transaction-status', $item->id) }}" onclick="return confirm('Yakin untuk mengubah status selesai??')" class="btn {{ $item->status == 'proses' ? 'btn-danger' : 'btn-info' }}">{{ $item->status == 'proses' ? 'Proses' : 'Selesai' }}</a>   
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <form action="{{ route('transaction-delete',$item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Yakin untuk menghapus?')" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                    @endforeach           
                                </tbody>
                            </table>
                            <h3>Total Harga : Rp  {{ number_format($total, 3, ',', '.') }}</h3>
                          
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
 
@endsection