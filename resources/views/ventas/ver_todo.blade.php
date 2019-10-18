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
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id Venta</th>
                <th>Rfc</th>
                <th>Razon Social</th>
                <th>Total Venta</th>
                <th>Total Pagado</th>
                <th>Recibo</th>
                <th>Empresa Venta</th>
                <th>Usuario Venta</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($ventas as $venta)
                <tr>
                    <td>{{$venta->id}}</td>
                    <td>{{$venta->clienteProvedor->rfc}}</td>
                    <td>{{$venta->clienteProvedor->razon_social}}</td>
                    <td>${{$venta->total_con_iva}}</td>
                    <td>${{$venta->total_pagado}}</td>
                    <td>
                      @if()
                    </td>
                    <td>{{$pago->created_at}}</td>
                    <th>
                        <a class="btn btn-success btn-sm" href="{{route("ver-venta",['id'=> $pago->venta_id])}}">
                            <i class="fa fa-eye"></i> Ver Venta
                        </a> 
                    </th>   
                </tr>
                @endforeach
              </tbody>
            </table>
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