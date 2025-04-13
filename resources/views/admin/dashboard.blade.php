@extends('layouts.app')

@section('title', 'Ecommerce Dashboard')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet"
    href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/flag-icon-css/css/flag-icon.min.css') }}">
@endpush

@section('main')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Order Statistics -
                            <div class="dropdown d-inline">
                                <a class="font-weight-600 dropdown-toggle"
                                    data-toggle="dropdown"
                                    href="#"
                                    id="orders-month">August</a>
                                <ul class="dropdown-menu dropdown-menu-sm">
                                    <li class="dropdown-title">Select Month</li>
                                    <li><a href="#"
                                            class="dropdown-item">January</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">February</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">March</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">April</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">May</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">June</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">July</a></li>
                                    <li><a href="#"
                                            class="dropdown-item active">August</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">September</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">October</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">November</a></li>
                                    <li><a href="#"
                                            class="dropdown-item">December</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">24</div>
                                <div class="card-stats-item-label">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">12</div>
                                <div class="card-stats-item-label">Shipping</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">23</div>
                                <div class="card-stats-item-label">Completed</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Orders</h4>
                        </div>
                        <div class="card-body">
                            59
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="balance-chart"
                            height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Balance</h4>
                        </div>
                        <div class="card-body">
                            $187,13
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="sales-chart"
                            height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sales</h4>
                        </div>
                        <div class="card-body">
                            4,732
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header w-full" style="justify-content: space-between;">
                        <h4>All Products</h4>
                        <a href="{{ route('product.create') }}"
                            class="btn btn-primary">Add New Product</a>
                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <form>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table-striped table">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($product as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>
                                        {{ $row->name }}
                                    </td>
                                    <td>
                                        {{  $row->category }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $row->image) }}" alt="{{ $row->name }}" class="w-50">
                                    </td>
                                    <td>{{ $row->price }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('product.show', $row->id ) }}">View</a>
                                            <div class="bullet"></div>
                                            <a href="{{ route('product.edit', $row->id ) }}">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $row->id }}').submit();"
                                                class="text-danger">Trash</a>
                                                <form action="{{ route('product.destroy', $row->id) }}" method="POST" id="delete-form-{{ $row->id }}">@csrf @method('DELETE')</form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link"
                                            href="#"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link"
                                            href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Budget vs Sales</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"
                            height="158"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Best Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme"
                            id="products-carousel">
                            <div>
                                <div class="product-item pb-3">
                                    <div class="product-image">
                                        <img alt="image"
                                            src="{{ asset('img/products/product-4-50.png') }}"
                                            class="img-fluid">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">iBook Pro 2018</div>
                                        <div class="product-review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="text-muted text-small">67 Sales</div>
                                        <div class="product-cta">
                                            <a href="#"
                                                class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-item">
                                    <div class="product-image">
                                        <img alt="image"
                                            src="{{ asset('img/products/product-3-50.png') }}"
                                            class="img-fluid">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">oPhone S9 Limited</div>
                                        <div class="product-review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half"></i>
                                        </div>
                                        <div class="text-muted text-small">86 Sales</div>
                                        <div class="product-cta">
                                            <a href="#"
                                                class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-item">
                                    <div class="product-image">
                                        <img alt="image"
                                            src="{{ asset('img/products/product-1-50.png') }}"
                                            class="img-fluid">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">Headphone Blitz</div>
                                        <div class="product-review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="text-muted text-small">63 Sales</div>
                                        <div class="product-cta">
                                            <a href="#"
                                                class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Top Countries</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-title mb-2">July</div>
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                    <li class="media">
                                        <span class='flag-icon flag-icon-id'></span>
                                        <div class="media-body ml-3">
                                            <div class="media-title">Indonesia</div>
                                            <div class="text-small text-muted">3,282 <i
                                                    class="fas fa-caret-down text-danger"></i></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <span class='flag-icon flag-icon-my'></span>
                                        <div class="media-body ml-3">
                                            <div class="media-title">Malaysia</div>
                                            <div class="text-small text-muted">2,976 <i
                                                    class="fas fa-caret-down text-danger"></i></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <span class='flag-icon flag-icon-us'></span>

                                        <div class="media-body ml-3">
                                            <div class="media-title">United States</div>
                                            <div class="text-small text-muted">1,576 <i
                                                    class="fas fa-caret-up text-success"></i></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 mt-sm-0 mt-4">
                                <div class="text-title mb-2">August</div>
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                    <li class="media">
                                        <span class='flag-icon flag-icon-id'></span>
                                        <div class="media-body ml-3">
                                            <div class="media-title">Indonesia</div>
                                            <div class="text-small text-muted">3,486 <i
                                                    class="fas fa-caret-up text-success"></i></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <span class='flag-icon flag-icon-ps'></span>

                                        <div class="media-body ml-3">
                                            <div class="media-title">Palestine</div>
                                            <div class="text-small text-muted">3,182 <i
                                                    class="fas fa-caret-up text-success"></i></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <span class='flag-icon flag-icon-de'></span>

                                        <div class="media-body ml-3">
                                            <div class="media-title">Germany</div>
                                            <div class="text-small text-muted">2,317 <i
                                                    class="fas fa-caret-down text-danger"></i></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Invoices</h4>
                        <div class="card-header-action">
                            <a href="#"
                                class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table-striped table">
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-87239</a></td>
                                    <td class="font-weight-600">Kusnadi</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 19, 2018</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-48574</a></td>
                                    <td class="font-weight-600">Hasan Basri</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 21, 2018</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-76824</a></td>
                                    <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-84990</a></td>
                                    <td class="font-weight-600">Agung Ardiansyah</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-87320</a></td>
                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 28, 2018</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="far fa-question-circle"></i>
                        </div>
                        <h4>14</h4>
                        <div class="card-description">Customers need help</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            <a href="#"
                                class="ticket-item">
                                <div class="ticket-title">
                                    <h4>My order hasn't arrived yet</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Laila Tazkiah</div>
                                    <div class="bullet"></div>
                                    <div class="text-primary">1 min ago</div>
                                </div>
                            </a>
                            <a href="#"
                                class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Please cancel my order</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Rizal Fakhri</div>
                                    <div class="bullet"></div>
                                    <div>2 hours ago</div>
                                </div>
                            </a>
                            <a href="#"
                                class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Do you see my mother?</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Syahdan Ubaidillah</div>
                                    <div class="bullet"></div>
                                    <div>6 hours ago</div>
                                </div>
                            </a>
                            <a href="features-tickets.html"
                                class="ticket-item ticket-more">
                                View All <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.js') }}"></script>
<script src="{{ asset('library/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index.js') }}"></script>
@endpush