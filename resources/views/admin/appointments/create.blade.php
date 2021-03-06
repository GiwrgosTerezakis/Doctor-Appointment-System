@extends('admin.layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Create') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.appointments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="user">{{ __('Users') }}*</label>
                <select name="user_id" id="user" class="form-control select2" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->user ? $appointment->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('user_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : '' }}">
                <label for="doctor">{{ __('Doctors') }}*</label>
                <select name="doctor_id" id="doctor" class="form-control select2" required>
                    @foreach($doctors as $id => $doctor)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->doctor ? $appointment->doctor->id : old('doctor_id')) == $id ? 'selected' : '' }}>{{ $doctor }} </option>
                    @endforeach
                </select>
                @if($errors->has('doctor_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('doctor_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ __('Start Time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($appointment) ? $appointment->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </em>
                @endif

            </div>
            <div class="form-group {{ $errors->has('finish_time') ? 'has-error' : '' }} " style="display: none">
                <label for="finish_time">{{ __('Finishing Time') }}</label>
                <input type="text" id="finish_time" name="finish_time" class="form-control datetime" value="1">
                @if($errors->has('finish_time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('finish_time') }}
                    </em>
                @endif

            </div>

            <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                <label for="comments">{{ __('Comments') }}</label>
                <textarea id="comments" name="comments" class="form-control ">{{ old('comments', isset($appointment) ? $appointment->comments : '') }}</textarea>
                @if($errors->has('comments'))
                    <em class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </em>
                @endif

            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ __('Save') }}">
                <a style="float:right;" class="btn btn-default" href="{{ route('admin.appointments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </form>


    </div>
</div>
@endsection
