@extends('layout')

@section('content')
    <section class="content-header">
        <h1>
          INVENTARIO
          <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <p style="font-size: 27px;"> Registro de clientes y proveedores</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <p style="font-size: 27px;"> Ventas</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <p style="font-size: 27px;"> Analisis</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <p style="font-size: 27px;"> Gastos</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
            
      
          </section>
          <!-- /.content -->
@stop