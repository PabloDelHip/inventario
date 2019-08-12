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
                <th>Nombre</th>
                <th>Razon Social</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($clientes_proveedores as $cliente_proveedor)
                <tr>
                    <td>{{$cliente_proveedor->nombre}}</td>
                    <td>{{$cliente_proveedor->razon_social}}</td>
                    <td>{{$cliente_proveedor->telefono}}</td>
                    <td>{{$cliente_proveedor->correo}}</td>
                    <td>
                        @switch($cliente_proveedor->tipo)
                            @case(1)
                                {{'Cliente'}}
                                @break
                            @case(2)
                                {{'Proveedor'}}
                                @break
                            @case(3)
                                {{'Cliente - Proveedor'}}
                                @break
                            @default
                                
                        @endswitch
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{route('datos-clientes-proveedores',['id'=>$cliente_proveedor->id])}}">
                            <i class="fa fa-eye"></i> Ver
                        </a>
                        <a class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i> Editar
                        </a>
                        <a class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Bloquear
                        </a>
                    </td>
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