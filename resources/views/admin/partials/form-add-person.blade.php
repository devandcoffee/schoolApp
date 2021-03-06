<div>
@if (isset($config))
    <div class="form-group{{ $errors->has('identity_id') ? ' has-error' : '' }}">
        <label for="identity_id" class="col-sm-2 control-label">@lang('messages.persons.identity_id'):</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="identity_id" id="identity_id" placeholder="{{ __('messages.persons.identity_id') }}" value="{{ old('identity_id') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
        <label for="firstname" class="col-sm-2 control-label">@lang('messages.persons.firstname'):</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="{{ __('messages.persons.firstname') }}" value="{{ old('firstname') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
        <label for="lastname" class="col-sm-2 control-label">@lang('messages.persons.lastname'):</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="{{ __('messages.persons.lastname') }}" value="{{ old('lastname') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-sm-2 control-label">@lang('messages.persons.email'):</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('messages.persons.email') }}" value="{{ old('email') }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">@lang('messages.persons.gender'):</label>
        <div class="col-sm-6">
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="male" checked>@lang('messages.persons.genders.male')
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="female">@lang('messages.persons.genders.female')
                </label>
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        <label for="birthdate" class="col-sm-2 control-label">@lang('messages.persons.birthdate'):</label>
        <div class="col-sm-6">
            <input type="text" class="form-control datepicker" name="birthdate" id="birthdate" placeholder="{{ __('messages.persons.birthdate') }}" value="{{ old('birthdate') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-sm-2 control-label">@lang('messages.persons.address')</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="address" id="address" placeholder="{{ __('messages.persons.address') }}" value="{{ old('address') }}">
        </div>
    </div>
    <selectbasedon :config="{{ json_encode($config) }}"></selectbasedon>
    <div class="form-group{{ $errors->has('mobile_phone') ? ' has-error' : '' }}">
        <label for="mobile_phone" class="col-sm-2 control-label">@lang('messages.persons.mobile_phone')</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" placeholder="{{ __('messages.persons.mobile_phone') }}" value="{{ old('mobile_phone') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has('home_phone') ? ' has-error' : '' }}">
        <label for="home_phone" class="col-sm-2 control-label">@lang('messages.persons.home_phone')</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="home_phone" id="home_phone" placeholder="{{ __('messages.persons.home_phone') }}" value="{{ old('home_phone') }}">
        </div>
    </div>
@endif
</div>