@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <ul class="list-group mb-3">
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    <li class="list-group-item text-{{ $category->category_style }}">{{ $category->category_name }}
                                        <a href="categories/{{ $category->id }}"><i class="fa fa-eye pl-2"></i></a>
                                        <a href="categories/{{ $category->id }}/edit"><i class="fa fa-edit pl-2"></i></a>
                                        <form id="delete-form" style="display: inline;" action="/categories/{{ $category->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link text-danger" type="submit"><i class="fa fa-trash text-danger" ></i></button>
                                        </form>
                                    </li>
                                @endforeach
                            @else
                                <p>No categories available</p>
                            @endif
                        </ul>
                        <a href="categories/create" class="btn btn-primary"><i class="fas fa-plus-circle pr-3"></i>Add category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
