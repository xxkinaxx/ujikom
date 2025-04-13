@extends('layouts.app')

@section('title', 'User')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet"
    href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('library/owl.carousel/dist/assets/owl.carousel.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Products</a></div>
                <div class="breadcrumb-item">Details</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-62">
                                <div class="clearfix"></div>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">{{ $product->name }}</a>
                                </div>
                                <div class="author-box-job">{{ $product->category }}</div>
                                <div class="author-box-job">{{ $product->price }}</div>
                                <div class="author-box-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="justify-content: space-between;">
                            <h4>Comments</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#input-modal">Launch Modal</button>
                        </div>
                        <div class="card-body">
                            @forelse($product->comments as $comment)
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                <li class="media">
                                    <img alt="image"
                                        class="rounded-circle mr-3"
                                        width="70"
                                        src="{{ asset('img/avatar/avatar-1.png') }}">
                                    <div class="media-body">
                                        <div class="media-title mb-1">{{ $comment->user->name }}</div>
                                        <div class="text-time">{{ $comment->created_at->diffForHumans() }}</div>
                                        <div class="media-description text-muted">{{ $comment->comment }}</div>
                                    </div>
                                </li>
                            </ul>
                            @empty
                            <p>Belum ada komentar</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="modal fade"
        tabindex="-1"
        role="dialog"
        id="input-modal">
        <div class="modal-dialog"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Write Your Comment</h5>
                    <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if(Auth::check())
                <form action="{{ route('comment.store') }}" method="POST"> @csrf
                    <div class="modal-body">
                     
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rating</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="rating">
                                    <option value="1">1⭐ - Buruk</option>
                                    <option value="2">2⭐ - Biasa</option>
                                    <option value="3">3⭐ - Bagus</option>
                                    <option value="4">4⭐ - Sangat Bagus</option>
                                    <option value="5">5⭐ - Luar Biasa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Comment</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="comment"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-primary">Kirim</button>
                    </div>
                </form>
                @else
                <p>Silakan <a href="{{ route('login') }}">login</a> untuk memberikan komentar.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/owl.carousel/dist/owl.carousel.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/components-user.js') }}"></script>
<script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
@endpush