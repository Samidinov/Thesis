@extends('layouts.app')
@section('content')
    <div class="col-12">
        <h4 class="text-center font-weight-bolder mb-4">
            {{ __('work.my_works') }}
        </h4>
    </div>
    <div class="col-10 offset-1 row">
        @foreach($works as $work)
            <div class="col-3 fa fa-dollar text-primary">
                {{$work->price}}
                <div class="col-12 mt-3">
                    <a href="{{ route('work.edit',$work) }}" title="{{ __('work.edit_page_edit_icon_hover') }}"
                       class="fa fa-pencil text-info d-inline-block"></a>
                    <button type="button" class="btn text-danger fa fa-trash" data-toggle="modal" data-target="#exampleModalCenter{{$work->id}}">
                    </button>

                    @include('inc.modal-center', [
                            'id'=>$work->id,
                            'modal_title'=>'ochurruu',
                            'modal_description_question'=> 'ochuruugo makulsuzbu',
                            'modal_btn_disagree' => 'Артка кайт',
                            'route' => route('work.destroy', $work->id),
                            'modal_btn_agree' => 'Өчүрүүгө макулмун'
                    ])
                </div>
            </div>
            <div class="col-6">
                <a class="col-12 d-block text-primary h5 font-weight-bold"
                   href="{{route('work.edit',$work)}}"> {{strlen($work->title)<50?$work->title:mb_substr($work->title,0,50).'..'}}</a>
                <small class="col-12 text-secondary"> {{ substr($work->description,0,100 ).'...' }} </small>
            </div>
            <div class="col-3">
                <div class="col-12"> {{ $work->created_at }}</div>
                <div class="col-12">{{ isset($work->exp_date)?__('work.until_date').$work->exp_date :''}} </div>
            </div>
            <hr align="left" width="100%" size="1" color="#ff9900"/>
        @endforeach
    </div>
@endsection
