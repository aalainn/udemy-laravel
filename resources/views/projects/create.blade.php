@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Projectname</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="beschreibung">Description</label>
                                <textarea class="form-control" id="beschreibung" name="beschreibung" rows="5"></textarea>
                            </div>
                            <button class="btn btn-primary mt-4" type="submit"><i class="fas fa-save pr-3"></i>Projekt speichern</button>
                        </form>
                        <a href="/projects" class="btn btn-outline-primary mt-3"><i class="fas fa-arrow-alt-circle-left pr-3"></i>Back to projects overview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
