@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-4 offset-4">
            <p class="h5">
                {{ __('user.name') }} :
                {{$user->name}}
            </p>
            @if($user->surname)
                <p class="h5">
                    {{ __('user.surname') }} :
                    {{$user->surname}}
                </p>
            @endif
            <p class="h5">
                {{ __('user.phone_number') }} :
                {{$user->phone_number}}
            </p>
            <p class="h5">
                {{ __('user.email') }} :
                {{$user->email}}
            </p>
            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-info">
                {{__('form.btn_edit')}}
            </a>
            <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#exampleModalCenter{{$user->id}}">
                {{__('form.btn_delete')}}
            </button>
            @include('inc.modal-center',[
                    'id'=>$user->id,
                    'modal_title' => __('form.modal_title'),
                    'modal_description' => __('form.modal_description'),
                    'modal_category_question' => __('form.modal_user_question'),
                    'route' =>route('user.destroy',$user->id),
                    'modal_btn_disagree' => __('form.modal_btn_disagree'),
                    'modal_btn_agree' => __('form.modal_btn_agree'),

                    ])
        </div>
    </div>
@endsection
