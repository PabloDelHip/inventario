@extends('layout')

@section('content')
<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Alta Cliente Proveedor</h3>
          </div>
          <div class="col-12">
            @if(Session::get('message'))
              <div class="alert alert-danger">
                {{ Session::get('message')  }}
              </div>
            @endif
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{route("save-cliente-proveedor")}}" method="POST">
            {{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre" name="nombre" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Razon Social</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Razon social" name="razon_social" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="correo">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Telefono</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefono" name="telefono">
              </div>
              <div class="form-group">
                <label>Contacto</label>
                <textarea class="form-control" rows="3" placeholder="Contacto" name="contacto"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">RFC</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="RFC" name="rfc" required>
              </div>
              <div class="form-group">
                <label>Domicilio</label>
                <textarea class="form-control" rows="3" placeholder="Domicilio" name="domicilio"></textarea>
              </div>
              <div class="form-group">
                <label>Tipo</label>
                <select class="form-control" name="tipo" required>
                  <option></option>
                  <option value="1">Cliente</option>
                  <option value="2">Proveedor</option>
                  <option value="3">Cliente / Proveedor</option>
                </select>
              </div>
              <div class="form-group">
                <label>Ciudades</label>
                <select class="form-control select2" style="width: 100%;" name="ciudad_id" required>
                  <option></option>
                  @foreach ($ciudades as $ciudad)
                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- /.row -->
  </section>
@stop