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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Transaction</h6>
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
                    <form action="{{ route('transaction-proses',$costumer->receipt_number) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name_shoe">Nama Sepatu</label>
                            <input type="text" name="name_shoe" value="{{ old('name_shoe') }}" class="form-control" id="name_shoe">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Paket</label>
                            <select class="form-control" name="package_types_id" id="exampleFormControlSelect1">
                              <option selected>Choose Package</option>
                               @foreach ($package as $item)
                               <option value="{{ $item->id }}">{{ $item->package_name }}</option>   
                               @endforeach
                            </select>
                        </div>



            


                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
 
@endsection