@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet"
    href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Create Product</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Product</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Input Data</h4>
                        </div>
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text"
                                        class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                        name="name"
                                        placeholder="Name">
                                    @error('name')
                                    <div class="ivalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option selected>Choose Category</option>
                                        <option value="makanan berat">Makanan berat</option>
                                        <option value="minuman">Minuman</option>
                                        <option value="makanan ringan">Makanan ringan</option>
                                        <option value="bahan pokok">Bahan pokok</option>
                                        <option value="peralatan">Peralatan</option>
                                    </select>
                                    @error('category')
                                    <div class="ivalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number"
                                        class="form-control @error('price')
                                            is-invalid
                                        @enderror"
                                        name="price"
                                        placeholder="Harga">
                                    @error('price')
                                    <div class="ivalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!-- button submit -->
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush