@extends('layout.appadmin')

@section('content')
    <div class="wrapper">

        <div class="content-wrapper">

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Update Products</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>

                                <li class="breadcrumb-item active">Flash Sales</li>

                            </ol>

                        </div>

                    </div>

                </div>

            </section>

            <section class="content">

                <form action="/admin/flashsales/{{ $flashsalesbyid->id }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @method('PUT')
                    <div class="row">

                        <div class="col-md-12">

                            <div class="card card-primary">

                                <div class="card-header">

                                    <h3 class="card-title">General</h3>

                                    <div class="card-tools">

                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">

                                            <i class="fas fa-minus"></i>

                                        </button>

                                    </div>

                                </div>
                                <div class="card-body">
                                    <label for="inputName">ID</label>

                                    <input value="{{ $flashsalesbyid->id }}" type="text" id="inputName"
                                        class="form-control" name="name">

                                </div>
                                <div class="card-body">
                                    <label for="inputName">Name</label>

                                    <input value="{{ $product->name }}" type="text" id="inputName" class="form-control"
                                        name="name">

                                </div>
                                <div class="card-body">
                                    <label for="show-price">Original price</label>
                                    <input type="text" id="show-price" value="{{ $product->price }}" class="form-control"
                                        name="show-price" readonly required>
                                </div>

                                <div class="card-body">
                                    <label for="import-salesrate">Import sales rate (%)</label>
                                    <input style="color:gray" type="text" id="import-salesrate" class="form-control"
                                        name="import-salesrate" placeholder="40% - 50% for Flashsales"
                                        value="{{ $saleRate }}" required>
                                </div>
                                <div class="card-body">
                                    <label for="flash-sales-end-time">Flash Sales End Time</label>
                                    <input type="datetime-local" id="flash-sales-end-time" class="form-control"
                                        name="flash-sales-end-time" value="{{ $flashsalesbyid->end_date }}" required>
                                </div>

                            </div>
                        </div>
                    </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="submit" value="Save" class="btn btn-success float-right">
            </div>
        </div>
        </form>
        </section>
    </div>
    </div>
@endsection
