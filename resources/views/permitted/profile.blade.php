@extends('layouts.app')

@section('contentheader_title')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.profile') }}
  @else
  {{ trans('message.profile') }}
  @endhasanyrole
@endsection

@section('contentheader_description')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.infouser') }}
  @else
  {{ trans('message.infouser') }}
  @endhasanyrole
@endsection

@section('breadcrumb_ubication')
  @hasanyrole('SuperAdmin|Admin')
    {{ trans('message.profile') }}
  @else
  {{ trans('message.profile') }}
  @endhasanyrole
@endsection

@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-4 col-xs-12">
      <div class="box box-warning">
        <div class="box-body box-profile">
          @if (Auth::user()->avatar == null)
            <img src="dist/img/user.jpg" class="profile-user-img img-responsive img-circle" alt="User Image">
          @else
            <img src="{{Auth::user()->avatar}}" class="profile-user-img img-responsive img-circle" alt="User Image">
          @endif
          <h3 class="profile-username text-center">
            @if (Auth::user()->social_name == null)
              {{ Auth::user()->name}}
            @else
              {{ Auth::user()->social_name}}
            @endif
          </h3>
          <p class="text-muted text-center">{{ trans('auth.privilegio') }}: {{ auth()->user()->roles->first()->name }}</p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>{{ trans('auth.email') }}</b> <a class="pull-right"> {{ auth()->user()->email }}</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">{{ trans('auth.aboutme') }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-certificate margin-r-5"></i> {{ trans('auth.privilegio') }}</strong>
          <p class="text-muted">
            {{ auth()->user()->roles->first()->name }}
          </p>
          <hr>

          <strong><i class="fa fa-list-alt margin-r-5"></i> {{ trans('auth.permisos') }}</strong>
          <p class="text-muted">
            @if (auth()->user()->getAllPermissions()->count())
              {{ auth()->user()->getAllPermissions()->pluck('name')->implode(', ') }}
            @else
              Sin permisos asociados
            @endif
          </p>

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> {{ trans('auth.location') }}</strong>
          <p class="text-muted">{{ auth()->user()->location }}</p>
        </div>
        <!-- /.box-body -->
      </div>

    </div>

    <div class="col-md-8 col-xs-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#settings" data-toggle="tab">{{ trans('auth.editar') }}</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="settings">
            <form class="form-horizontal">
              {{ csrf_field() }}
              <!-- {{ method_field('PUT') }} -->

              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">{{ trans('auth.nombre') }}</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="{{ old('name')}}">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ auth()->user()->email }}" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="city" class="col-sm-2 control-label">{{ trans('auth.location') }}</label>

                <div class="col-sm-10">
                   <input type="text" name="city" placeholder="City" class="form-control" value="{{ old('city,  auth()->user()->city') }}" id="city">
                </div>
              </div>

              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">{{ trans('auth.password') }}</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
              </div>

              <div class="form-group">
                <label for="password_confirmation" class="col-sm-2 control-label">{{ trans('auth.retrypepassword') }}</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn bg-olive"><i class="fa fa-pencil-square margin-r-5"></i>Actualizar información</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>

    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/admin/profile.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7LGUHYSQjKM4liXutm2VilsVK-svO1XA&libraries=places"></script>
<script type="text/javascript">
    function initialize() {
        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: "mx"}
        };
        var input = document.getElementById('city');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endpush
