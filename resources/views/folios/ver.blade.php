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
                <th>Folio</th>
                <th>Vendido</th>
                <th>Fecha de Venta</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($folios as $folio)
                <tr>
                    <td>{{$folio->folio}}</td>
                    <td>
                        @if($folio->vendido)
                            <span class="label label-success">Vendido</span>
                        @else
                        <span class="label label-primary">Libre</span>
                        @endif
                    </td>
                    <td>{{$folio->fecha_venta}}</td>
                    <td>
                        @if($folio->vendido)
                            <a class="btn btn-success btn-sm" href="{{route('ver-venta',['id'=>$folio->ventas_id])}}">
                                <i class="fa fa-eye"></i> Ver Venta
                            </a>
                        @endif
                    </td>
                    {{-- <td>
                        
                        <a class="btn btn-success btn-sm" href="{{route('datos-clientes-proveedores',['id'=>$giro_empresa->id])}}">
                            <i class="fa fa-eye"></i> Ver
                        </a>
                        <a class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i> Editar
                        </a>
                        <a class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Bloquear
                        </a>
                    </td> --}}
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