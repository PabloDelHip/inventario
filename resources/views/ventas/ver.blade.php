@extends('layout')

@section('content')
<section class="content">
    <div class="row">
      <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Datos Venta</h3>
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
                <div class="box-body">
                    <div class="input-group input-group-sm">
                        
                        <input type="text" class="form-control" value="{{$venta->clienteProvedor->rfc}}" disabled id="txt_buscar_cliente_rfc" placeholder="Ingresar RFC del Cliente/Proveedor">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat"  id="buscar_cliente_rfc" disabled>Buscar</button>
                        </span>
                    </div>
                    <input type="hidden" name="_idCliente" id="idCliente">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Razon social</label>
                        <input type="text" class="form-control" value="{{$venta->clienteProvedor->razon_social}}" id="_razon_social" disabled placeholder="Razon Social" name="razon_social" required>
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" value="{{$venta->clienteProvedor->correo}}" id="_correo" disabled placeholder="Correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telefono</label>
                        <input type="text" class="form-control" value="{{$venta->clienteProvedor->telefono}}" id="_telefono" disabled placeholder="Telefono" name="telefono" required>
                    </div>

                    <hr>
                    
                    <div class="form-group">
                        <label>Folios</label>
                        <select class="form-control select2" disabled id="_folios" multiple="multiple" name="folios[]" data-placeholder="Seleccionar Folios"
                                style="width: 100%;">
                        @foreach ($folios as $folio)
                            <option selected value="{{$folio->id}}">
                                {{$folio->folio}}
                            </option>  
                        @endforeach
                        </select>
                    </div>

                    <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" class="form-control" disabled placeholder="Total a cobrar" value="{{$venta->total_con_iva}}" id="_total_cobrar" name="total_cobrar">
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
                            <input type="radio" @if($venta->factura) checked @endif disabled name="tipo_recibo" value="factura" class="minimal">
                            Factura
                        </label>
                        <label>
                            <input type="radio" @if($venta->nota) checked @endif disabled name="tipo_recibo" value="nota" class="minimal">
                            Nota
                        </label>
                        <label>
                            <input type="radio" @if($venta->publico_general) checked @endif disabled name="tipo_recibo" value="publico_general" class="minimal">
                            Publico en General
                        </label>
                    </div>

                    <hr>

                    
                </div>
                <!-- /.box-body -->
                </form>
            </div>
        </div>

        <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Pago</h3>
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
                    <form role="form" action="{{route("abonar-pago")}}" method="POST">
                    {{csrf_field()}}
                    <div class="box-body">    
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"> Total Pagado</label>
                            <input type="text" class="form-control" name="pagado" id="inputSuccess" value="{{$pagos->sum('pago_con_iva')}}">
                        </div>
                        <div class="form-group has-error">
                            <label class="control-label" for="inputError"> Falta por Pagar</label>
                            <input type="text" class="form-control" name="falta_pagar" id="inputError" value="{{$falta_pagar}}" >
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Abonar</label>
                            <input type="number" class="form-control" id="_telefono" name="abonado" required>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="pagado" value="{{$pagos->sum('pago_con_iva')}}">
                            <input type="hidden" name="id_venta" value="{{$venta->id}}">
                            <input type="hidden" name="falta_pagar" value="{{$falta_pagar}}">
                            <input type="submit" class="btn btn-default" value="Abonar">
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
    
                    {{-- <div class="box-footer">
                            <a href="#" class="btn btn-default" id="continuar" data-toggle="modal" data-target="#modal-default"> Continuar</a>
                    </div> --}}
                    </form>
                </div>

                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Pagos</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Fecha de pago</th>
                              <th>Pago</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($pagos as $pago)
                                <tr>
                                    <td>{{$pago->created_at}}</td>
                                    <td>{{$pago->pago_con_iva}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
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