

    <div class="col-8">
        <a class="col-12 d-block text-primary font-weight-bold" href="{{ $route }}" >
            {{strlen($work->title)<50?$work->title:mb_substr($work->title,0,50).'..'}}
        </a>
        <small class="col-12 text-secondary"> {{ substr($work_description,0,100).'...' }} </small>
    </div>
    <div class="col-4">
        <div class="col-12"> {{ $work_created_at }}</div>
        <div class="col-12">{{ $work_exp_date }} </div>
        <div class="col-12 fa fa-dollar text-danger">{{$work_price}}</div>
    </div>
    <hr align="left" class="d-inline" width="100%" size="1" color="#ff9900" />
