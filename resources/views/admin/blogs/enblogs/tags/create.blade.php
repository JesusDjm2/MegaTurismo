@extends('admin.admin')
@section('titulo', 'Crear nueva Categoria de blog en inglés')
@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Buscadore</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('entags.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @include('admin.blogs.enblogs.tags.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
