@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 mb-1 text-center">
            <h4 class="font-weight-bold">
                {{ __('form.master_show_title') }}
            </h4>
        </div>
        <div class="col-10 offset-1 row">
            <div class="col-4 text-center">
                <p class="col-12 text-muted font-weight-bolder">{{ __('user.master_show_user_title') }}</p>
                <img class="rounded-circle"
                     src="https://anglehit.com/wp-content/uploads/2016/02/i_n_c_o_g_n_i_t_o__xlicon__by_blackoptics8-d85c0em.jpg"
                     alt="user" width="200" height="200">
                <div class="col-12 font-weight-bold">
                    {{$user->name}}  {{$user->surname}}
                </div>
                <div class="col-12">{{ $master->getBirthYear() }}</div>
                <div class="col-12">{{ __('work.phone') }}{{ $user->phone_number }}</div>
            </div>
            <div class="col-8 row">
                <div class="col-12 text-center"></div>
                <div class="col-12"> {{ $master->getExperience() }}</div>
                <div class="col-3 offset-6"><a href="{{ route('master.edit',$master) }}"
                                               class="btn btn-primary">{{__('form.btn_edit')}}</a></div>
                <div class="col-3">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{ $user->id }}">
                        {{ __('form.btn_delete') }}
                    </button>
                    @include('inc.modal-center', [
                            'id'=>$user->id,
                            'modal_title' =>__('user.modal_destroy_master_title'),
                            'modal_description' =>__('user.modal_destroy_master_description'),
                            'modal_question' =>__('user.modal_destroy_master_question'),
                            'route'=>route('master.destroy', $master),
                            'modal_btn_agree'=>__('form.modal_btn_agree'),
                            'modal_btn_disagree'=>__('form.modal_btn_disagree'),
                            ''=>'',
                                    ])

                </div>
            </div>
        </div>

    </div>
@endsection
