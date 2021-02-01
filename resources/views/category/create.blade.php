@extends('layouts.app')
@section('content')
    <div class="row">
        <form action="{{route('category.store')}}" method="post" class="col-8 offset-2">
            @include('category.form-category',[
                'title'=> __('category.title'),
                'title_value' => isset($category->title)?$category->title:old('title'),
                'title_description' => __('category.input_category_description'),
                'slug' => __('category.slug'),
                'slug_value' =>isset($category->slug)?$category->slug:old('title'),
                'slug_description' => __('category.input_slug_description'),
                'parent_id' =>isset($category->parent_id)?$category->parent_id:0,
            ])
            <button type="submit" class="btn btn-success">
                {{ __('form.btn_add') }}
            </button>
        </form>
    </div>
@endsection
