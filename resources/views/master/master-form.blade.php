<form action="{{$route}}" class="mt-5 col-8 offset-2 row" method="post">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="form-group col-lg-6 ">
        <small class="text-primary d-inline">{{__('form.master_birth_year_title')}}</small>
        <input type="text" class="border-0 mb-0 w-100"  value="{{$master->birth_year ?? ( old('birth_year') ?? '' )}}" required placeholder="{{ __('form.master_create_birth_year_placeholder') }}" name="birth_year">
        <hr class="mt-0 mb-0">
    </div>
    <div class="form-group col-lg-6 d-inline">
        <small class="text-primary d-block">{{__('form.master_photo_title')}}</small>
        <input type="file" class="border-0 mb-0 w-100" value="{{ $master->photo ??( old('photo') ?? '' )}}" required name="photo">
        <input type="number" class="d-none" value="{{Auth::user()->id}}" name="user_id">
        <hr class="mt-0 mb-0">
    </div>
    <div class="form-group mt-5 col-12">
        <small class="text-primary d-block mt-0">{{ __('form.master_professionalism_title') }}</small>
        <textarea type="text" name="experience" class="border-0 mb-0 w-100">
            {{ $master->experience ?? ( old('experience') ?? '' )}}
        </textarea>
        <hr class="mt-0 mb-0">
    </div>
    @include('inc.all-categories-form',[
                                         'title' => __('form.all_categories_title_for_masters'),
                                         'categories' =>  $categories,])
    <div class="form-group col-12">
        <button type="submit" class="col-4 btn btn-success">{{__('form.btn_save')}}</button>
    </div>

</form>
