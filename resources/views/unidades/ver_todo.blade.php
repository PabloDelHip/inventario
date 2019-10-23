@extends('layout')

@section('content')
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Unidades</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Placas</th>
                <th>Folio Tarjeta Circulación</th>
                <th>Rfc Cliente</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($unidades as $unidad)
                <tr>
                    <td>{{$unidad->id}}</td>
                    <td>{{$unidad->modelo}}</td>
                    <td>{{$unidad->marca}}</td>
                    <td>{{$unidad->placas}}</td>
                    <td>{{$unidad->folio_tarjeta_circulacion}}</td>
                    <td>{{$unidad->clienteProvedor->rfc}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('ver-unidad',['id'=>$unidad->id])}}">
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