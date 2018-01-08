@extends('layouts.app')

@section('contentheader_title')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.geolocation') }}
  @else
  {{ trans('message.geolocation') }}
  @endhasanyrole
@endsection

@section('contentheader_description')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.transporte') }}
  @else
  {{ trans('message.transporte') }}
  @endhasanyrole
@endsection

@section('breadcrumb_ubication')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.geolocation') }}
  @else
  {{ trans('message.geolocation') }}
  @endhasanyrole
@endsection

@section('content')

@if( auth()->user()->can('View geolocation') )
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="box box-solid">
          <div class="box-body">
            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                Ubicación de autobuses en tiempo real.
            </h4>

            <div class="media">
                <div class="media-body">
                  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" align="right">

                      <button class="btn btn-info btnconsumptionunity" id="btn-refresh" type="button" style="opacity: 0.5;">
                        <i class="fa fa-refresh margin-r5"></i>
                        Reload
                      </button>

                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                      <div class="clearfix">
                        <div id="googlemap" style="height: 400px; width: 100%;">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="box box-solid">
          <div class="box-body">
            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                Tabla de equipos.
            </h4>
            
            <div class="media">
                <div class="media-body">
                  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                      <div class="clearfix">
                        <table id="tableDatosGPS" name="tableDatosGPS" class="table table-bordered table-striped" style="font-size: 85%;">
                          <thead>
                            <tr >
                              <th class="bg-primary">Equipo</th>
                              <th class="bg-primary">MAC</th>
                              <th class="bg-primary">Latitud</th>
                              <th class="bg-primary">Longitud</th>
                              <th class="bg-primary">Velocidad</th>
                              <th class="bg-primary">Último Contacto</th>
                              <th class="bg-primary">Estado</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>



@else
  @include('default.denied')
@endif

@endsection

@push('scripts')
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD07V9hwyUjrRCXiJHo9YdftE0VJIbRP8">
</script>
<script src="/plugins/momentupdate/moment-with-locales.js"></script>
<script src="{{ asset('js/admin/geolocation.js')}}"></script>
@endpush
