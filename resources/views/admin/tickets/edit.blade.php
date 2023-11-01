@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.ticket.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.tickets.update", [$ticket->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('login') ? 'has-error' : '' }}">
                            <label class="required" for="login">{{ trans('cruds.ticket.fields.login') }}</label>
                            <input class="form-control" type="text" name="login" id="login" value="{{ old('login', $ticket->login) }}" required>
                            @if($errors->has('login'))
                                <span class="help-block" role="alert">{{ $errors->first('login') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ticket.fields.login_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">{{ trans('cruds.ticket.fields.password') }}</label>
                            <input class="form-control" type="text" name="password" id="password" value="{{ old('password', $ticket->password) }}">
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ticket.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('etat') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.ticket.fields.etat') }}</label>
                            <select class="form-control" name="etat" id="etat">
                                <option value disabled {{ old('etat', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Ticket::ETAT_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('etat', $ticket->etat) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('etat'))
                                <span class="help-block" role="alert">{{ $errors->first('etat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ticket.fields.etat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label for="users_id">{{ trans('cruds.ticket.fields.users') }}</label>
                            <select class="form-control select2" name="users_id" id="users_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('users_id') ? old('users_id') : $ticket->users->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ticket.fields.users_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('router') ? 'has-error' : '' }}">
                            <label for="router_id">{{ trans('cruds.ticket.fields.router') }}</label>
                            <select class="form-control select2" name="router_id" id="router_id">
                                @foreach($routers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('router_id') ? old('router_id') : $ticket->router->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('router'))
                                <span class="help-block" role="alert">{{ $errors->first('router') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ticket.fields.router_helper') }}</span>
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
</div>
@endsection