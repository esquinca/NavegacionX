@extends('layouts.app')

@section('contentheader_title')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.survey') }}
  @else
  {{ trans('message.survey') }}
  @endhasanyrole
@endsection

@section('contentheader_description')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.resultados') }}
  @else
  {{ trans('message.resultados') }}
  @endhasanyrole
@endsection

@section('breadcrumb_ubication')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.survey') }}
  @else
  {{ trans('message.survey') }}
  @endhasanyrole
@endsection

@section('content')
  @hasanyrole('SuperAdmin|Admin')
   <!--¡Soy escritor o administrador o ambos!-->
    @if( auth()->user()->can('View survey') )
      <!--SI VER-->
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="box box-solid">
                  <div class="box-body">
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="date_search_pral" class="control-label">Busqueda General:</label>
                            <input type="text" class="form-control datepickermonth" id="date_search_pral" placeholder="2017-12">
                        </div>
                        <div class="form-group">
                          <select id="selectgraphs" name="selectgraphs"  class="form-control" multiple="multiple" required>
                            <option value="1"> Grafica 1 </option>
                            <option value="2"> Grafica 2 </option>
                            <option value="3"> Grafica 3 </option>
                            <option value="4"> Grafica 4 </option>
                          </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-info btngeneral"><i class="fa fa-bullseye margin-r5"></i> Generar</button>
                        </div>
                    </div>
                   </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
                <div class="box box-solid">
                  <div class="box-body">
                    <div class="media">
                      <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                          Encuestas - Nacionalidades
                      </h4>
                      <div class="media">
                          <div class="media-body">
                              <div class="clearfix">
                                  <div style="margin-top: 0">
                                    <div id="main_nationality" style="width: 100%; min-height: 250px; border:1px solid #ccc;padding:10px;"></div>
                                    Grafica
                                    @php
                                      $mytime = Carbon\Carbon::now();
                                      echo $mytime->toDateTimeString();
                                    @endphp
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                   </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
                <div class="box box-solid">
                  <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Encuestas - Edades
                    </h4>

                    <div class="media">
                        <div class="media-body">
                            <div class="clearfix">
                                <div style="margin-top: 0">
                                  <div id="main_ages" style="width: 100%; min-height: 250px; border:1px solid #ccc;padding:10px;"></div>
                                  Grafica
                                  @php
                                    $mytime = Carbon\Carbon::now();
                                    echo $mytime->toDateTimeString();
                                  @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
                <div class="box box-solid">
                  <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Encuestas - Dominios
                    </h4>
                    <div class="media">
                        <div class="media-body">
                            <div class="clearfix">
                                <div style="margin-top: 0">
                                  <div id="main_domains" style="width: 100%; min-height: 350px; border:1px solid #ccc;padding:10px;"></div>
                                  Grafica
                                  @php
                                    $mytime = Carbon\Carbon::now();
                                    echo $mytime->toDateTimeString();
                                  @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
                <div class="box box-solid">
                  <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Encuestas - Tours
                    </h4>

                    <div class="media">
                        <div class="media-body">
                            <div class="clearfix">
                                <div style="margin-top: 0">
                                  <div id="main_tours" style="width: 100%; min-height: 350px; border:1px solid #ccc;padding:10px;"></div>
                                  Grafica
                                  @php
                                    $mytime = Carbon\Carbon::now();
                                    echo $mytime->toDateTimeString();
                                  @endphp
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
      <!--NO VER-->
      @include('default.denied')
    @endif
  @else
   <!--¡No tengo el role de SuperAdmin ó Admin!-->
   @include('default.denied')
  @endhasanyrole
@endsection

@push('scripts')
<link href="{{ asset('/plugins/bootstrap-multiselect-master/css/bootstrap-multiselect.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/plugins/bootstrap-multiselect-master/js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/admin/survey.js')}}"></script>

@endpush
