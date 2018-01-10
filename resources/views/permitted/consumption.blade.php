@extends('layouts.app')

@section('contentheader_title')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.consumption') }}
  @else
  {{ trans('message.consumption') }}
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
    {{ trans('message.consumption') }}
  @else
  {{ trans('message.consumption') }}
  @endhasanyrole
@endsection

@section('content')

@if( auth()->user()->can('View consumption') )
  <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="box box-solid">
            <div class="box-body">
              <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                  Consumo - Mensual
              </h4>
              <div class="media">
                  <div class="media-body">
                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="form-inline">
                            <div class="form-group">
                              <label for="selunidad" class="col-xs-3 control-label">Unidad: </label>
                              <div class="col-xs-8">
                                <select class="form-control" id="selunidad">
                                      <option value="" selected>Elija</option>
                                  @forelse ($listarunidad as $info)
                                      <option value="{{ $info->id }}"> {{ $info->Nombre }} </option>
                                  @empty
                                  @endforelse
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="date_search_unity_month" class="col-xs-3 control-label">Fecha:</label>
                                <div class="col-xs-8">
                                  <input type="text" class="form-control datepickermonth" id="date_search_unity_month" placeholder="2017-12">
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-xs-8">
                                <button type="button" class="btn btn-info btnconsumptionunity"><i class="fa fa-bullseye margin-r5"></i> Generar</button>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="clearfix">
                          <div id="main_consumo_dia" style="width: 100%; min-height: 400px; border:1px solid #ccc;padding:10px;"></div>
                        </div>
                      </div>
                    </div>

                  </div>
              </div>

             </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-exchange"></i>
              <h3 class="box-title">Consumo - Top 5</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="form-inline">
                      <div class="form-group">
                          <label for="date_search_top_month" class="col-xs-3 control-label">Fecha:</label>
                          <div class="col-xs-8">
                            <input type="text" class="form-control datepickermonth" id="date_search_top_month" placeholder="2017-12">
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-xs-8">
                          <button type="button" class="btn btn-info btnconsumptiontop"><i class="fa fa-bullseye margin-r5"></i> Generar</button>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
                  <div id="main_consumo_sem" style="width: 100%; min-height: 300px; border:1px solid #ccc;padding:10px;"></div>
                </div>
                <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
                  <div class="table-reponsive">
                    <table id="example2" name='example2' class="display nowrap table table-bordered table-hover" cellspacing="0" width="95%">
                      <input type='hidden' id='_tokenb' name='_tokenb' value='{!! csrf_token() !!}'>
                      <thead >
                        <tr class="bg-primary" style="background: #00A5BA;">
                          <th> <small>Transporte</small> </th>
                          <th> <small>Subida.</small> </th>
                          <th> <small>Bajada.</small> </th>
                          <th style="display: none"> <small>Subida1.</small> </th>
                          <th style="display: none"> <small>Bajada2.</small> </th>
                        </tr>
                      </thead>
                      <tbody style="background: #FFFFFF;">
                      </tbody>
                      <tfoot id='tfoot_average'>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-signal"></i>
              <h3 class="box-title">Consumo - Diario</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="form-inline">
                      <div class="form-group">
                          <label for="date_search_top_days" class="col-xs-3 control-label">Fecha:</label>
                          <div class="col-xs-8">
                            <input type="text" class="form-control datepickermonthcomplet" id="date_search_top_days" placeholder="2017-12-01">
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-xs-8">
                          <button type="button" class="btn btn-info btnconsumptiontopday"><i class="fa fa-bullseye margin-r5"></i> Generar</button>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  Grafica de subida
                  <div id="main_consumo_dia_up" style="width: 100%; min-height: 200px; border:1px solid #ccc;padding:10px;"></div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  Grafica de bajada
                  <div id="main_consumo_dia_down" style="width: 100%; min-height: 200px; border:1px solid #ccc;padding:10px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-exchange"></i>
              <h3 class="box-title">Consumo de Subida - Gigabyte por Transporte</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="form-inline">
                    <div class="form-group">
                      <label for="date_search_up_for_month" class="col-xs-3 control-label">Fecha:</label>
                      <div class="col-xs-8">
                        <input type="text" class="form-control datepickermonth" id="date_search_up_for_month" placeholder="2017-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-8">
                        <button type="button" class="btn btn-info btnconsumptionup"><i class="fa fa-bullseye margin-r5"></i> Generar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="table-responsive">
                    <table class="table" id="example_up" name='example_up' class="hover" width="100%" cellspacing="0">
                      <thead>
                          <tr class="bg-primary" style="background: #F0AD4E; font-size: 11.5px; ">
                              <th> <small>Transporte</small> </th>
                              @for ($i = 1; $i <= 31; $i++)
                              <th> <small> {{ $i }} </small> </th>
                              @endfor
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-exchange"></i>
              <h3 class="box-title">Consumo de Bajada - Gigabyte por Transporte</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="form-inline">
                    <div class="form-group">
                      <label for="date_search_down_for_month" class="col-xs-3 control-label">Fecha:</label>
                      <div class="col-xs-8">
                        <input type="text" class="form-control datepickermonth" id="date_search_down_for_month" placeholder="2017-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-8">
                        <button type="button" class="btn btn-info btnconsumptiondown"><i class="fa fa-bullseye margin-r5"></i> Generar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="table-responsive">
                    <table id="example_down" name='example_down' class="display nowrap table table-bordered table-hover" width="100%" cellspacing="0">
                      <thead>
                          <tr class="bg-primary" style="background: #F0AD4E; font-size: 11.5px; ">
                              <th> <small>Transporte</small> </th>
                              @for ($i = 1; $i <= 31; $i++)
                              <th> <small> {{ $i }} </small> </th>
                              @endfor
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
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
<script src="{{ asset('/plugins/momentupdate/moment-with-locales.js')}}"></script>
<script src="{{ asset('js/admin/consumption.js')}}"></script>
@endpush
