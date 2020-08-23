@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Projectdetails</div>
                    <div class="card-body">
                        <h5>{{ $project->projectname }}</h5>
                        <p>{{ $project->description }}</p>
                        <a href="/projects" class="btn btn-primary"><i class="fas fa-arrow-circle-left pr-3"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
