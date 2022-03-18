@extends('layouts.app')

@section('title')
Productos
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3>Crear Productos</h3>
    <a class="btn boton" href="{{ route("products.create") }}" >Guardar</a>
  </div>
  <div class="card-body row justify-content-center">

      <form method="POST" action="{{ route("products.store") }}">
        @csrf
        <div class="form-group">
          <label for="title">Nombre</label>
          <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
          <small id="title" class="form-text text-muted">Nombre del producto</small>
        </div>
        <div class="form-group">
          <label for="description">Descripción</label>
          <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="form-group">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>


@endsection