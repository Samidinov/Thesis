@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 work-index-img">
            {{--            <img src="https://sgtechcentre.undp.org/content/dam/gctisd/images/Smart%20Farm%205G%20Blog.png" alt="Farmer man" width="100%" height="500">--}}
        </div>
        <div class="col-12 row">
            <div class="col-3"></div>
            <div class="col-9 row">
                @foreach($works as $work)
                    @include('inc.work-list', [
                                                 'work_price' => $work->price,
                                                 'route'=> route('work.show',$work),
                                                 'work_title'=> $work->title,
                                                 'work_description' => $work->description,
                                                 'work_created_at' => $work->created_at,
                                                 'work_exp_date' => isset($work->exp_date)?__('work.until_date').$work->exp_date :'' ,
                                                 ])
                @endforeach
            </div>
        </div>
    </div>

@endsection
