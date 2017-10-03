<div>
@if (isset($person))
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.identity_id'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->identity_id}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.firstname'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->firstname}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.lastname'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->lastname}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.email'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->email}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.gender'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->gender == 'male' ? __('messages.persons.genders.male') : __('messages.persons.genders.female')}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.birthdate'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->birthdate->format('d-m-Y')}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.address'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->address}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.country'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->country->name}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.city'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->city->name}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.mobile_phone'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->mobile_phone}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-info">@lang('messages.persons.home_phone'):</h5>
        </div>
        <div class="col-sm-9">
            <h5>{{$person->home_phone}}</h5>
        </div>
    </div>
@endif
</div>