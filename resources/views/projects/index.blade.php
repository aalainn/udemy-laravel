@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <ul class="list-group mb-3">
                            @foreach($projects as $project)
                                <li class="list-group-item">{{ $project->projectname }}</li>
                            @endforeach
                        </ul>
                        <a href="projects/create" class="btn btn-primary"><i class="fas fa-plus-circle pr-3"></i>Add Porject</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
