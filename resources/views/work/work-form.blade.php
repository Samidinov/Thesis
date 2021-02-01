@error('subcategory_id.*')
<p class="alert alert-danger">
    {{ $message }}
</p>
@enderror
<form action="{{$route}}" method="post">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="form-group">
        <label for="title">{{ $title }}</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="{{ $title_input_placeholder}}"
               required value="{{ isset($work->title)? $work->title: old('title') }}">
    </div>
    <div class="form-group">
        <label for="address">{{ $address }}</label>
        <input type="text" class="form-control" id="address" name="address"
               placeholder="{{ $address_input_placeholder }}" required
               value="{{ isset($work->address)? $work->address : old('address') }}">
    </div>
    <div class="form-group">
        <label for="description">{{ $description }}</label>
        <textarea class="form-control" rows="5" id="description" name="description"
                  placeholder="{{ $description_input_placeholder }}"
                  required>{{ isset($work->description) ? $work->description: old('description') }}</textarea>
    </div>
    <div class="form-group form-inline">
        <div class="col-lg-6 col-sm-12 row">
            <label for="contacts" class="col-4">{{$phone}}</label>
            <input type="text" class=" col-8 form-control" placeholder="{{$phone_input_placeholder}}" required
                   id="contacts"
                   name="contacts" value="{{isset($work->contacts) ? $work->contacts : old('contacts')}}">
        </div>
        <div class="col-lg-6 row">
            <label for="price" class="col-4 text-left">{{$price}}</label>
            <input type="text" class="form-control col-8" placeholder="{{ $price_input_placeholder }}" id="price"
                   name="price" value="{{isset($work->price) ? $work->price: old('price')}}">
        </div>
        <input type="number" class="d-none" value="{{ Auth::user()->id }}" id="user_id" name="user_id">
    </div>
    <div class="form-group">
        <label for="time_to_work">{{ $time_to_work }}</label>
        <input type="text" class="form-control" id="time_to_work" name="time_to_work"
               placeholder="{{ $time_to_work_input_placeholder }}"
               value="{{isset($work->time_to_work) ? $work->time_to_work: old('time_to_work')}}">
    </div>
    <div class="form-group">
        <label for="exp_date">{{ $exp_date }}</label>
        <input type="date" class="form-control col-lg-3" id="exp_date" name="exp_date" required
               value="{{isset($work->exp_date) ?$work->exp_date: old('exp_date')}}">
    </div>
    @include('inc.all-categories-form' , [
                                           'categories' => $categories,
                                           'title' => __('form.work_create_all_category_title'),
                                           ])
    <div class="form-group text-center">
        <button type="submit" class="btn btn-success">
            {{$btn_save}}
        </button>
    </div>
</form>
