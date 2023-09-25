@extends('products.layout')

@section('styles')
    {{-- page specific style --}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('products.update',['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('products.partials.form');
    </form>
@endsection
@section('script')
    @include('products.partials._script')
@endsection
