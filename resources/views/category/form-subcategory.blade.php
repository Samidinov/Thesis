
<div class="form-group">
    <label for="title"> {{ __('category.modal_service_title') }} </label>
    <input type="text" value="{{old('title') }}" class="form-control" id="title" name="title" placeholder="{{__('category.input_service_placeHolder')}}">
    <small id="titleHelp" class="form-text text-muted">{{__('category.modal_service_description')}}</small>
</div>
<div class="form-group">
    <label for="slug"> {{ __('category.slug') }} </label>
    <input type="text" value="{{old('title') }}" class="form-control" id="slug" name="slug" placeholder="{{__('category.input_slug_placeHolder')}}">
    <small id="slugHelp" class="form-text text-muted">{{__('category.input_slug_description')}}</small>
</div>
<div class="form-group d-none">
    <input value={{ $category->id }} name="parent_id">
</div>
