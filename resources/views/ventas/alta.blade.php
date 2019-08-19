@extends('layout')

@section('content')
<section class="content">
    <div class="row">
      <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Alta Venta</h3>
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
                <form role="form" action="{{route("save-unidades")}}" method="POST">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="input-group input-group-sm">
                        
                        <input type="text" class="form-control" id="txt_buscar_cliente_rfc" placeholder="Ingresar RFC del Cliente/Proveedor">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat"  id="buscar_cliente_rfc">Buscar</button>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telefono</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefono" name="telefono" required>
                    </div>    
                    <div class="form-group">
                        <label>Contacto</label>
                        <textarea class="form-control" rows="3" placeholder="Contacto" name="contacto"></textarea>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Alta Venta</h3>
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
                    <form role="form" action="{{route("save-unidades")}}" method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="input-group input-group-sm">
                            
                            <input type="text" class="form-control" placeholder="Ingresar RFC del Cliente/Proveedor">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat"  id="buscar_cliente_rfc">Buscar</button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telefono</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefono" name="telefono" required>
                        </div>    
                        <div class="form-group">
                            <label>Contacto</label>
                            <textarea class="form-control" rows="3" placeholder="Contacto" name="contacto"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Capacidad en kg</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Capacidad en kg" name="contacto">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Capacidad Lt</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Capacidad Lt" name="capacidad_lt">
                        </div>
                        <div class="form-group">
                        <label>Capacidad Pasajeros</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Capacidad pasajeros" name="capacidad_pasajeros" required>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Num. Ejes</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Num. Ejes" name="num_ejes" required>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Placas</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Placas" name="placas" required>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Folio de tarjeta de circulación</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Folio tarjeta" name="folio_tarjeta_circulacion" required>
                        </div>
                        <div class="form-group">
                        <label>Cliente/Proveedor</label>
                        <select class="form-control select2" style="width: 100%;" name="cliente_provedores_id" required>
                            <option></option>
                            {{-- @foreach ($cliente_proveedores as $cliente_proveedor)
                            <option value="{{$cliente_proveedor->id}}">{{$cliente_proveedor->nombre}}</option>
                            @endforeach --}}
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