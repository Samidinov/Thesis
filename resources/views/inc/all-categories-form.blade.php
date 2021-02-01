@isset($categories)
    <div class="row mt-5">
        <h3 class="col-12 text-center mt-5">{{ $title }}</h3>
        @foreach($categories as $category)
            @if(!$category->parent_id)
                <div class=" text-dark col-lg-3 col-6 mt-3">
                    <div class="col-12 font-weight-bold">
                        {{{$category->title}}}
                    </div>
                    @foreach($categories as $subcategory)
                        @if($category->id === $subcategory->parent_id)
                            <div class="col-12 text-info">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"
                                           name="subcategory_id[]"
                                           @isset($checked_categories)
                                            @foreach($checked_categories as $checked_category)
                                                @if($checked_category->id === $subcategory->id)
                                                    checked
                                                @endif
                                             @endforeach
                                           @endisset
                                           value="{{$subcategory->id}}">{{ $subcategory->title }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
@endisset
