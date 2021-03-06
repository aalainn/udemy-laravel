@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Category</div>

                    <div class="card-body">
                        <form action="/categories/{{ $category->id }}" method="post">

                            {{--@csrf = Cross-Site-Request-Forgery, dieses erzeugt ein hidden input field mit einem token--}}
                            {{--Wenn das nicht eingebaut ist erscheint einen 419 Page expried Error--}}
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="category_name">Categoryname</label>
                                <input type="text" class="form-control {{ $errors->has('category_name') ? 'border-danger' : '' }}" id="category_name" name="category_name" value="{{ old('category_name') ?? $category->category_name }}">
                                <small class="form-text text-danger">{!! $errors->first('category_name') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="category_style">Description</label>
                                <input type="text" class="form-control {{ $errors->has('category_style') ? 'border-danger' : '' }}" id="category_style" name="category_style" value="{{ old('category_style') ?? $category->category_style }}">
                                <small class="form-text text-danger">{!! $errors->first('category_style') !!}</small>
                            </div>
                            <button class="btn btn-primary mt-4" type="submit"><i class="fas fa-save pr-3"></i>Save changes</button>
                        </form>
                        <a href="/categories" class="btn btn-outline-primary mt-3"><i class="fas fa-arrow-alt-circle-left pr-3"></i>Back to categories overview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
