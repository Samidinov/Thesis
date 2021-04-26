@extends('layouts.app')
@section('content')
    <div class="row">
<div class="col-10 offset-1">
    @include('work.work-form', [
        'route' =>route('work.store'),
        'title' => __('work.title'),
        'title_input_placeholder' =>__('work.title_input_placeholder')  ,
        'address' =>__('work.address') ,
        'address_input_placeholder' =>__('work.address_input_placeholder') ,
        'description' => __('work.description') ,
        'description_input_placeholder' => __('work.description_input_placeholder'),
        'phone' => __('work.phone'),
        'phone_input_placeholder' => __('work.phone_input_placeholder'),
        'price' =>__('work.price') ,
        'price_input_placeholder' => __('work.price_input_placeholder'),
        'time_to_work' => __('work.time_to_work'),
        'time_to_work_input_placeholder' => __('work.time_to_work_input_placeholder'),
        'exp_date' =>  __('work.exp_date') ,
        'btn_save'=> __('work.btn_save_create'),

])
</div>
    </div>
@endsection
