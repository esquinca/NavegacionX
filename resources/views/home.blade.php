@extends('layouts.app')

@section('contentheader_title')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.dashboard') }}
  @else
  {{ trans('message.bienvenido') }}
  @endhasanyrole
@endsection

@section('contentheader_description')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.principal') }}
  @else
  {{ trans('message.user') }}
  @endhasanyrole
@endsection

@section('breadcrumb_ubication')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.dashboard') }}
  @else
  {{ trans('message.bienvenido') }}
  @endhasanyrole
@endsection

@section('content')
  @hasanyrole('SuperAdmin|Admin')
   <!--¡Soy escritor o administrador o ambos!-->
    @if( auth()->user()->can('View dashboard pral') )
      No definido aun
    @else
      <!--NO VER-->
      @include('default.session')
    @endif
  @else
   <!--¡No tengo el role de SuperAdmin ó Admin!-->
   @include('default.session')
  @endhasanyrole
@endsection

@push('scripts')
<script src="{{ asset('js/admin/dashboard.js')}}"></script>
@endpush
