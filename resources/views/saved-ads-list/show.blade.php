@extends('layouts.app')
@section('content')
    <div class="row">
        </div>
        <div class="col-12 row">
            <div class="col-8 offset-2 row">
                @foreach ($saved_ads as $saved_ad)
                    @include('saved-ads-list.list-item', [
                            'item' => $saved_ad,
                            'route' =>  route('work.show',$saved_ad->id)
                        ])
                @endforeach

            </div>
        </div>
    </div>

@endsection
