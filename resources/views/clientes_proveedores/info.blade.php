<?php use App\Http\Controllers\ClienteProveedorController; ?>
@extends('layout')

@section('content')
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Clientes/Proveedores</h3>
          </div>
          <!-- /.box-header -->
          <div class="col-6">
            <div class="box-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Fecha y hora</th>
                    <th>Total</th>
                    <th>Pagado</th>
                    <th>Falta x pagar</th>
                    <th>Fecha y hora ultimo pago</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                        @foreach ($ventas as $venta)
                        <tr>
                          @php
                              $pago = ClienteProveedorController::seleccionarPagos($venta->id);
                              $falta_por_pagar = $pago[0]['total_actual_con_iva'];
                          @endphp
                            <td>{{$venta->id}}</td>
                            <td>{{$venta->created_at}}</td>
                            <th>{{$venta->total_con_iva}}</th>
                            <th>${{$pago[0]['pago_con_iva']}}</th>
                            <th>${{$pago[0]['total_actual_con_iva']}}</th>
                            <th>{{$pago[0]['created_at']}}</th>
                            <th>
                              @if($falta_por_pagar<=0)
                                <small class="label bg-red">Pagado</small>
                              @else
                                <small class="label bg-red">Pendiente de pago</small>
                              @endif
                            </th>
                            <th>
                                <a class="btn btn-primary btn-sm" href="{{route("ver-venta",['id'=> $venta->id])}}">
                                    <i class="fa fa-eye"></i> Ver
                                </a>
                            </th>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@stop