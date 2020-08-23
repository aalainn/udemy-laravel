@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Project</div>

                    <div class="card-body">
                        <form action="/projects/{{ $project->id }}" method="post">

                            {{--@csrf = Cross-Site-Request-Forgery, dieses erzeugt ein hidden input field mit einem token--}}
                            {{--Wenn das nicht eingebaut ist erscheint einen 419 Page expried Error--}}
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Projectname</label>
                                <input type="text" class="form-control {{ $errors->has('projectname') ? 'border-danger' : '' }}" id="name" name="projectname" value="{{ old('projectname') ?? $project->projectname }}">
                                <small class="form-text text-danger">{!! $errors->first('projectname') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="beschreibung">Description</label>
                                <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" id="beschreibung" name="description" rows="5">{{ old('description') ?? $project->description }}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                            </div>
                            <button class="btn btn-primary mt-4" type="submit"><i class="fas fa-save pr-3"></i>Anpassungen speichern</button>
                        </form>
                        <a href="/projects" class="btn btn-outline-primary mt-3"><i class="fas fa-arrow-alt-circle-left pr-3"></i>Back to projects overview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
