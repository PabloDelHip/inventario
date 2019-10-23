@extends('layout')

@section('content')
<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Datos Unidades</h3>
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
          <form role="form" action="{{route("update-unidades")}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" value="{{$unidades->id}}" name="id">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Modelo</label>
                <input type="text" value="{{$unidades->modelo}}" class="form-control" id="exampleInputEmail1" placeholder="Modelo" name="modelo" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Marca</label>
                <input type="text" class="form-control" value="{{$unidades->marca}}" id="exampleInputPassword1" placeholder="Marca" name="marca" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Capacidad en kg</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{$unidades->capacidad_kg}}" placeholder="Capacidad en kg" name="capacidad_kg">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Capacidad Lt</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$unidades->capacidad_lt}}" placeholder="Capacidad Lt" name="capacidad_lt">
              </div>
              <div class="form-group">
                <label>Capacidad Pasajeros</label>
                <input type="text" class="form-control" value="{{$unidades->capacidad_pasajeros}}" id="exampleInputPassword1" placeholder="Capacidad pasajeros" name="capacidad_pasajeros" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Num. Ejes</label>
                <input type="text" class="form-control" value="{{$unidades->num_ejes}}"  id="exampleInputPassword1" placeholder="Num. Ejes" name="num_ejes" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Placas</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$unidades->placas}}" placeholder="Placas" name="placas" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Folio de tarjeta de circulación</label>
                <input type="text" class="form-control" value="{{$unidades->folio_tarjeta_circulacion}}" id="exampleInputPassword1" placeholder="Folio tarjeta" name="folio_tarjeta_circulacion" required>
              </div>
              <div class="form-group">
                <label>Cliente/Proveedor</label>
                <select class="form-control select2" style="width: 100%;" name="cliente_provedores_id"  required>
                  <option></option>
                  @foreach ($cliente_proveedores as $cliente_proveedor)
                    <option @if($unidades->cliente_provedor_id == $cliente_proveedor->id) selected @endif value="{{$cliente_proveedor->id}}">{{$cliente_proveedor->nombre}}</option>
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