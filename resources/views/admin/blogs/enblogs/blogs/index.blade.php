@extends('admin.admin')
@section('titulo', 'Crear nueva Categoria de blog en inglés')
@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Lista de blogs en inglés') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('enblogs.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear nuevo Blogs en Ingles') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Resumen</th>
                                        <th>Descripcion</th>
                                        <th>Img Thumb</th>
                                        <th>Img Fondo</th>
                                        <th>Keywords</th>
                                        <th>Slug</th>
                                        <th>Tags</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td>{{ $blog->nombre }}</td>
                                            <td>{{ $blog->resumen }}</td>
                                            <td></td>
                                            <td><img src="{{ asset('img/blogs/thumbs/'.$blog->imgThumb) }}" width="100px"></td>
                                            <td><img src="{{ asset('img/blogs/'.$blog->imgBig) }}" width="100px"></td>
                                            <td>{{ $blog->keyword }}</td>
                                            <td>{{ $blog->slug }}</td>
                                            <td>
                                                @foreach ($blog->tags as $tag)
                                                ⮞{{ $tag->nombre }}<br>
                                                @endforeach
                                            </td>

                                            <td>
                                                <form action="{{ route('enblogs.destroy', $blog->id) }}" method="POST">
                                                    @csrf
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('enblogs.show', $blog->slug) }}" target="_blank"><i
                                                            class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('enblogs.edit', $blog->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> </a>

                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
