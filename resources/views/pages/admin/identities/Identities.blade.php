@extends('layouts.admin')
@section('title', 'Admin Identities')
@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="col-12 mb-3 d-flex">
                    <div>
                        <a href="{{ route('Identities.create') }}" class="btn btn-info">Tambah Data Diri</a>
                    </div>

                    <div style="margin-left: 520px">
                        <form action="" class="d-inline-block form-inline">
                            <input class="form-control mr-sm-2" name="search" type="text" placeholder="Nomor Resi" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 d-inline-block" type="submit">Search</button>
                        </form>
                    </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Resi</th>
                            <th>Nama</th>
                            <th>Tambah Pemesanan</th>
                            <th>Total Pemesanan</th>
                            <th>Pemesanan Selesai</th>
                            <th>Detail</th>
                            <th>Ubah Data</th>
                        </tr>
                    </thead>
            
                    <tbody>

                        @foreach ($identities as $data => $item)
                        <tr>
                            <td>{{ $identities->firstItem() + $data }}</td>
                            <td>{{ $item->receipt_number }}</td>
                            <td>{{ $item->name }}</td>
                            <td >
                                <a href="" class="btn btn-info d-flex justify-content-center">Tambah</a>
                            </td>
                            <td>{{ $item->transaction->count() }}</td>
                            <td>{{ $item->transaction->where('status', 'selesai')->count() }}</td>
                            <th>Detail</th>
                            <th>
                                <a href="{{ route('Identities.edit', $item->receipt_number) }}" class="btn btn-primary d-flex justify-content-center">Ubah</a>
                            </th>
                        </tr>
                        @endforeach           
                    
                    </tbody>
                </table>
               <div class="d-flex justify-content-center mt-4">
                {{ $identities->links() }}
               </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 
@endsection