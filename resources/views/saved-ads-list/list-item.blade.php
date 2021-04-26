<div class="col-8">
    <a class="col-12 d-block text-primary font-weight-bold" href="{{ $route }}" >
        {{strlen($item->title)<50?$item->title:mb_substr($item->title,0,50).'..'}}
    </a>
    <small class="col-12 text-secondary"> {{ substr($item->description,0,100).'...' }} </small>
</div>
<div class="col-4">
    <div class="col-12"> {{ $item->created_at }}</div>
    <div class="col-12">{{ $item->exp_date }} </div>
    <div class="col-12 fa fa-dollar text-danger">{{$item->price}}</div>
</div>
<hr align="left" class="d-inline" width="100%" size="1" color="#ff9900" />
