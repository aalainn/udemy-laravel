@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Project Details</div>
                    <div class="card-body">
                        <h5>{{ $project->projectname }}</h5>
                        <p>{{ $project->description }}</p>
                        <a href="/projects" class="btn btn-primary"><i class="fas fa-arrow-circle-left pr-3"></i>Zurück</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
