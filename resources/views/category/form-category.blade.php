@csrf
<div class="form-group">
    <label for="title"> {{ $title }} </label>
    <input type="text" value="{{$title_value}}" class="form-control" id="title" name="title" placeholder="{{__('category.input_category_placeHolder')}}">
    <small id="titleHelp" class="form-text text-muted">{{$title_description}}</small>
</div>
<div class="form-group">
    <label for="slug"> {{ $slug }} </label>
    <input type="text" value="{{ $slug_value }}" class="form-control" id="slug" name="slug" placeholder="{{__('category.input_slug_placeHolder')}}">
    <small id="slugHelp" class="form-text text-muted">{{ $slug_description }}</small>
</div>
<div class="form-group d-none">
    <input value={{ $parent_id  }} name="parent_id">
</div>
