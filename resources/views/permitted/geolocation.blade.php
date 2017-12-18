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
@endsection

@push('scripts')
<script src="{{ asset('js/admin/geolocation.js')}}"></script>
@endpush
