@extends('layouts.app')
@section('content')
    <div class="row pt-4 pb-4" style="background-color: #f0e0ff;">
        <div class="col-4 text-center">
            <p class="col-12 text-muted font-weight-bolder">{{ __('work.customer') }}</p>
            <img class="rounded-circle"
                 src="https://anglehit.com/wp-content/uploads/2016/02/i_n_c_o_g_n_i_t_o__xlicon__by_blackoptics8-d85c0em.jpg"
                 alt="user" width="200" height="200">
            <div class="col-12 font-weight-bold">
                {{$user->name}}  {{$user->surname}}
            </div>
            <div class="col-12">{{ __('work.phone') }}{{ $user->phone_number }}</div>
        </div>
        <div class="col-8 row ">
            <div class="col-12 row offset-1">
                <h4 class="col-10 font-weight-bold d-inline "> {{ $work->title}} </h4>
                <i class="add-to-saved-list text-info col-2 fa fa-bookmark-o fa-2x cursor-pointer w-25"></i>
                <script type="text/javascript">
                    document.addEventListener("DOMContentLoaded",function() {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        const work_id = <?php echo json_encode($work->id) ?>;
                        const user_id = <?php echo json_encode(\Illuminate\Support\Facades\Auth::id()) ?>;
                        const toSave = document.querySelector(".add-to-saved-list");

                            $.ajax({
                                type:'POST',
                                url:"{{ route('isMyAd') }}",
                                data:{
                                    user_id : user_id,
                                    ad_id : work_id,
                                },
                                success : function(data) {
                                    if (data.result == true) {
                                        toSave.classList.remove('fa-bookmark-o');
                                        toSave.classList.add('fa-bookmark');
                                    }
                                },
                                error : function(req, err) {
                                    alert: ("Request:"+ JSON.stringify(req));
                                }});


                    const changeBookmarkStyle = (isMy = false) => {

                        let work_id = <?php echo json_encode($work->id) ?>;
                        let user_id = <?php echo json_encode(\Illuminate\Support\Facades\Auth::id()) ?>;
                        if (isMy) {
                            toSave.classList.remove('fa-bookmark');
                            toSave.classList.add('fa-bookmark-o');
                            $.ajax({
                                type:'POST',
                                url:"{{ route('userAds') }}",
                                data:{
                                    user_id : user_id,
                                    ad_id : work_id,
                                    action: 'remove'
                                },
                                success : function (data) {
                                    //success part
                                }
                            });

                        } else {

                            toSave.classList.remove('fa-bookmark-o');
                            toSave.classList.add('fa-bookmark');

                            $.ajax({
                                type:'POST',
                                url:"{{ route('userAds') }}",
                                data:{
                                    user_id : user_id,
                                    ad_id : work_id,
                                    action: 'add'
                                },
                                success : function (data) {
                                    //success part
                                }
                            });
                        }
                    }
                    toSave.addEventListener('click', (e) => {
                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        if (toSave.classList.contains('fa-bookmark')) {
                            changeBookmarkStyle(true);
                        } else {
                            changeBookmarkStyle(false);
                        }
                    })

                    })
                </script>
            </div>
            <h5 class="col-md-3"> {{__('work.description')}} </h5>
            <h5 class="col-9"> {{ $work->description }} </h5>
            <div class="col-4 text-danger"><i class="fa fa-dollar"></i> {{ $work->price }} </div>
            <div class="col-4"><i class="fa fa-phone"> </i> {{ $work->contacts }}</div>
            <div class="col-4"><i class="text-success fa fa-map-pin mr-2"></i> {{ $work->address }}</div>
            <div class="col-12 row">
                <div class="col-4 offset-8">
                    <a class="btn btn-success col-12 ">
                        {{ __('work.btn_give_feedback') }}
                        <i class="ml-2 fa fa-comment"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if (sizeof($works)>0)
        <div class="row mt-4 mb-4">
            <div class="col-12  row ">
                <h5 class=" col-9 offset-3 font-weight-bold mb-4">{{ __('work.title_for_similar_ads') }}</h5>
                <div class="col-3 bg-info text-white h-100">
                    Для рекламы партнеров!
                </div>
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
    @endif
@endsection
@push('scripts')
    <script>
        const toSave = document.querySelector(".add-to-saved-list");
        toSave.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('hello js');
        })
    </script>
@endpush
