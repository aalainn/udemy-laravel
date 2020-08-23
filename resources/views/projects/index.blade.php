@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <ul class="list-group mb-3">
                            @if(count($projects) > 0)
                                @foreach($projects as $project)
                                    <li class="list-group-item">{{ $project->projectname }}
                                        <a href="projects/{{ $project->id }}"><i class="fa fa-eye pl-2"></i></a>
                                        <a href="projects/{{ $project->id }}/edit"><i class="fa fa-edit pl-2"></i></a>
                                        <form id="delete-form" style="display: inline;" action="/projects/{{ $project->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link text-danger" type="submit"><i class="fa fa-trash text-danger" ></i></button>
                                        </form>
                                    </li>
                                @endforeach
                            @else
                                <p>No projects available</p>
                            @endif
                        </ul>
                        <a href="projects/create" class="btn btn-primary"><i class="fas fa-plus-circle pr-3"></i>Add project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
