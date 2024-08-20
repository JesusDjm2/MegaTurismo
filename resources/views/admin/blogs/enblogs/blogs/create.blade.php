@extends('admin.admin')
@section('titulo', 'Crear nuevo blog en inglés')
@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Blog en inglés</span>
                        <a href="{{ route('enblogs.index') }}" class="btn btn-primary btn-sm" style="float: right">Volver</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('enblogs.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @include('admin.blogs.enblogs.blogs.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
