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
                <form role="form" id="formulario_venta" action="{{route("save-venta")}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="giro_empresa" value="{{$id}}">
                <div class="box-body">
                    <div class="input-group input-group-sm">
                        
                        <input type="text" class="form-control" id="txt_buscar_cliente_rfc" placeholder="Ingresar RFC del Cliente/Proveedor">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat"  id="buscar_cliente_rfc">Buscar</button>
                        </span>
                    </div>
                    <input type="hidden" name="_idCliente" id="idCliente">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telefono</label>
                        <input type="text" class="form-control" id="_razon_social" placeholder="Razon Social" name="razon_social" required>
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="_correo" placeholder="Correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telefono</label>
                        <input type="text" class="form-control" id="_telefono" placeholder="Telefono" name="telefono" required>
                    </div>

                    <hr>
                    
                    <div class="form-group">
                        <label>Folios</label>
                        <select class="form-control select2" id="_folios" multiple="multiple" name="folios[]" data-placeholder="Seleccionar Folios"
                                style="width: 100%;">
                        @foreach ($folios as $folio)
                            <option value="{{$folio->id}}">
                                {{$folio->folio}}
                            </option>  
                        @endforeach
                        </select>
                    </div>

                    <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" class="form-control" placeholder="Total a cobrar" id="_total_cobrar" name="total_cobrar">
                    </div>

                    <div class="form-group">
                            <label for="exampleInputPassword1">Cantidad de Folios</label>
                            <input type="text" class="form-control" id="_cantidad_folios" placeholder="Precio por folio" name="cantidad_folios" disabled required>
                        </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Precio por unidad</label>
                        <input type="text" class="form-control" id="_precio_unidad" placeholder="Precio por folio" name="precio_unidad" disabled required>
                    </div>
                    
                    <hr>

                    <div class="form-group">
                        <label>
                            <input type="radio" name="tipo_recibo" value="factura" class="minimal" checked>
                            Factura
                        </label>
                        <label>
                            <input type="radio" name="tipo_recibo" value="nota" class="minimal">
                            Nota
                        </label>
                        <label>
                            <input type="radio" name="tipo_recibo" value="publico_general" class="minimal">
                            Publico en General
                        </label>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label>
                            <input type="radio" name="tipo_pago" value="pagado" class="minimal" checked>
                            Pagado
                        </label>
                        <label>
                            <input type="radio" name="tipo_pago" value="pendiente" class="minimal">
                            Pendiente de Pago
                        </label>
                        <label>
                            <input type="radio" name="tipo_pago" value="abono" class="minimal">
                            Abono
                        </label>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Total Pagando o abonando</label>
                        <input type="number" class="form-control" id="_pago_abono" placeholder="Pago o Abono" name="pago_abono" required>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                        <a href="#" class="btn btn-default" id="continuar" data-toggle="modal" data-target="#modal-default"> Continuar</a>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Datos de venta</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Venta</label>
                            <input type="number" class="form-control" id="_venta_confirmar" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">IVA</label>
                            <input type="number" class="form-control" id="_iva_confirmar" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">TOTAL</label>
                            <input type="number" class="form-control" id="_total_confirmar" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">ABONO</label>
                            <input type="number" class="form-control" id="_abono_confirmar" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">PENDIENTE DE PAGO</label>
                            <input type="number" class="form-control" id="_pendiente_confirmar" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="btn_guardar_venta">Guardar</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
    </div>
    <!-- /.row -->
  </section>
@stop