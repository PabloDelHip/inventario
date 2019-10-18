@extends('layout')

@section('content')
<section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Alta Folio Unico</h3>
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
          <form role="form" action="{{route("save-folios")}}" method="POST">
            {{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Folio</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Folio" name="folio" required>
                <input type="hidden" name="vendido" value="0">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

         <!-- general form elements -->
         <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Alta Folios</h3>
          </div>

          <!-- form start -->
          <form role="form" action="{{route("save-varios-folios")}}" method="POST">
            {{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Primeros Caracteres del Folio</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Folio" name="folio" required>
                
                <label for="exampleInputEmail1">Numero Inicio</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Folio" name="numero_folio_inicio" required>

                <label for="exampleInputEmail1">Numero Final</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Folio" name="numero_folio_final" required>
                <input type="hidden" name="vendido" value="0">
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