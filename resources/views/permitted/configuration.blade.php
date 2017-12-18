@extends('layouts.app')

@section('contentheader_title')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.configuration') }}
  @else
  {{ trans('message.configuration') }}
  @endhasanyrole
@endsection

@section('contentheader_description')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.general') }}
  @else
  {{ trans('message.general') }}
  @endhasanyrole
@endsection

@section('breadcrumb_ubication')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.configuration') }}
  @else
  {{ trans('message.configuration') }}
  @endhasanyrole
@endsection

@section('content')
@endsection

@push('scripts')
<script src="{{ asset('js/admin/configuration.js')}}"></script>
@endpush
