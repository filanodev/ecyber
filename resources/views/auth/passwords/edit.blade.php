@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.my_profile') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("profile.password.updateProfile") }}">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.change_password') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("profile.password.update") }}">
                        @csrf
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">New {{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="password_confirmation">Repeat New {{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.delete_account') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("profile.password.destroyProfile") }}" onsubmit="return prompt('{{ __('global.delete_account_warning') }}') == '{{ auth()->user()->email }}'">
                        @csrf
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.delete') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(Route::has('profile.password.toggleTwoFactor'))
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.two_factor.title') }}
                    </div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route("profile.password.toggleTwoFactor") }}">
                            @csrf
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    {{ auth()->user()->two_factor ? trans('global.two_factor.disable') : trans('global.two_factor.enable') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection