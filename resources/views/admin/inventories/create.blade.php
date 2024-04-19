@extends('layout.appadmin')

@section('content')
    <div class="wrapper">

        <div class="content-wrapper">

            <section class="content-header">

                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1>Add Inventory</h1>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>

                                <li class="breadcrumb-item active">Add Inventory</li>

                            </ol>

                        </div>

                    </div>

                </div>

            </section>

            <section class="content">

                <form action="/admin/inventories" method="post" enctype="multipart/form-data">

                    @csrf

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
                                    <label for="selectProduct">Select products</label>
                                    <div class="form-group">
                                        <select id="mySelect" name="pro" size="4" required>
                                            @foreach ($products as $pro)
                                                <option value="{{ $pro['id'] }}">
                                                    {{ $pro['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div id="selText" style="margin-top:6px"><span>&nbsp;</span></div>
                                        <script>
                                            $(document).ready(function() {
                                                $("select#mySelect").change(function() {
                                                    $("#selText").html($($(this).children("option:selected")[0]).text());
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="import-quantity">Import Quantity</label>
                                        <input type="text" id="import-quantity" class="form-control"
                                            name="import-quantity" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Import" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
