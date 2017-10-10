<div>
@if (isset($person))
    <?php $person_class = str_replace(']', '', str_replace('[', '.', $person)); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">@lang('messages.persons.avatar'):</label>
        <div class="col-sm-6">
            <label>@lang('messages.persons.upload_avatar')</label>
            <input type="file" name="{{$person.'[avatar]'}}" accept="image/*">
        </div>
    </div>
    <div class="form-group{{ $errors->has($person_class.'.identity_id') ? ' has-error' : '' }}">
        <label for="{{$person.'[identity_id]'}}" class="col-sm-2 control-label">@lang('messages.persons.identity_id'):</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="{{$person.'[identity_id]'}}" id="{{$person.'[identity_id]'}}" placeholder="{{ __('messages.persons.identity_id') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has($person_class.'.firstname') ? ' has-error' : '' }}">
        <label for="{{$person.'[firstname]'}}" class="col-sm-2 control-label">@lang('messages.persons.firstname'):</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="{{$person.'[firstname]'}}" id="{{$person.'[firstname]'}}" placeholder="{{ __('messages.persons.firstname') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has($person_class.'.lastname') ? ' has-error' : '' }}">
        <label for="{{$person.'[lastname]'}}" class="col-sm-2 control-label">@lang('messages.persons.lastname'):</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="{{$person.'[lastname]'}}" id="{{$person.'[lastname]'}}" placeholder="{{ __('messages.persons.lastname') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has($person_class.'.email') ? ' has-error' : '' }}">
        <label for="{{$person.'[email]'}}" class="col-sm-2 control-label">@lang('messages.persons.email'):</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="{{$person.'[email]'}}" id="{{$person.'[email]'}}" placeholder="{{ __('messages.persons.email') }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">@lang('messages.persons.gender'):</label>
        <div class="col-sm-6">
            <div class="radio">
                <label>
                    <input type="radio" name="{{$person.'[gender]'}}" value="male" checked>@lang('messages.persons.genders.male')
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="{{$person.'[gender]'}}" value="female">@lang('messages.persons.genders.female')
                </label>
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has($person_class.'.birthdate') ? ' has-error' : '' }}">
        <label for="{{$person.'[birthdate]'}}" class="col-sm-2 control-label">@lang('messages.persons.birthdate'):</label>
        <div class="col-sm-6">
            <input type="text" class="form-control datepicker" name="{{$person.'[birthdate]'}}" id="{{$person.'[birthdate]'}}" placeholder="{{ __('messages.persons.birthdate') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has($person_class.'.address') ? ' has-error' : '' }}">
        <label for="{{$person.'[address]'}}" class="col-sm-2 control-label">@lang('messages.persons.address')</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="{{$person.'[address]'}}" id="{{$person.'[address]'}}" placeholder="{{ __('messages.persons.address') }}">
        </div>
    </div>
    <selectbasedon :config="{{ json_encode($config) }}"></selectbasedon>
    <div class="form-group{{ $errors->has($person_class.'.mobile_phone') ? ' has-error' : '' }}">
        <label for="{{$person.'[mobile_phone]'}}" class="col-sm-2 control-label">@lang('messages.persons.mobile_phone')</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="{{$person.'[mobile_phone]'}}" id="{{$person.'[mobile_phone]'}}" placeholder="{{ __('messages.persons.mobile_phone') }}">
        </div>
    </div>
    <div class="form-group{{ $errors->has($person_class.'.home_phone') ? ' has-error' : '' }}">
        <label for="{{$person.'[home_phone]'}}" class="col-sm-2 control-label">@lang('messages.persons.home_phone')</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="{{$person.'[home_phone]'}}" id="{{$person.'[home_phone]'}}" placeholder="{{ __('messages.persons.home_phone') }}">
        </div>
    </div>
@endif
</div>