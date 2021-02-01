@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-10 offset-1 mb-4 text-center">
            <h4>
                {{ __('form.edit_page_info_title') }}
            </h4>
            <p class="font-weight-light">
                {{ __('form.edit_page_info_description') }}
            </p>
        </div>
        <form action="{{ route('category.update',$category->id) }}" method="post" class="col-8 offset-2">
            @method('PUT')
            @include('category.form-category',[
                'title'=> __('category.title'),
                'title_value' => isset($category->title)?$category->title:old('title'),
                'title_description' => __('category.input_category_description'),
                'slug' => __('category.slug'),
                'slug_value' =>isset($category->slug)?$category->slug:old('title'),
                'slug_description' => __('category.input_slug_description'),
                'parent_id' =>isset($category->parent_id)?$category->parent_id:0,
            ])
            <button type="submit" class="btn btn-success" title="{{ __('form.btn_edit_title') }}">
                {{ __('form.btn_edit') }}
            </button>
        </form>
        @if($category->parent_id<2 )
            {{--            Если это котегория то выведем подкатегории      --}}
            <div class="col-10 offset-1 mt-5 mb-2 border-1">
                <h3 class="text-center">
                    {{ __('category.subcategories_head_title',['category'=>$category->title]) }}
                </h3>
                <p class="text-center">
                    {{__('category.subcategories_head_description',['category'=>$category->title])}}
                </p>
            </div>
            <div class="col-8 offset-2 mt-4">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">{{ __('category.service_table_title') }}</th>
                        <th scope="col">{{ __('category.service_table_slug') }}</th>
                        <th scope="col">{{ __('category.service_table_parent') }}</th>
                        <th scope="col">
                            <i class="fa fa-cogs text-center"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( isset($subcategories))

                        @foreach($subcategories as $subcategory)
                            <tr>
                                <td class="text-danger">#</td>
                                <td>{{$subcategory->title}}</td>
                                <td class="text-muted">{{$subcategory->slug}}</td>
                                <td>{{$category->title}}</td>
                                <td>
                                    <a href="{{ route('category.edit',$subcategory) }}"
                                       title="{{ __('form.btn_icon_edit',['attribute'=>$subcategory->title]) }}"
                                       class="fa fa-pencil text-info d-inline-block"></a>
                                    <button type="button"
                                            title="{{ __('form.btn_icon_destroy',['attribute'=>$subcategory->title]) }}"
                                            class="btn text-danger ml-2 fa fa-trash" data-toggle="modal"
                                            data-target="#exampleModalCenter{{$subcategory->id}}">
                                    </button>
                                    @include('inc.modal-center', [
                                            'modal_title' => __('form.modal_title'),
                                            'modal_description' => __('form.modal_title'),
                                            'modal_btn_agree' => __('form.modal_btn_agree'),
                                            'modal_btn_disagree' => __('form.modal_btn_disagree'),
                                            'modal_question' => __('form.modal_category_question'),
                                            'route' => route('category.destroy',$subcategory->id),
                                             'id' => $subcategory->id,
                                        ])
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary col-4 offset-4"
                    title="{{__('form.btn_add_subcategory_hover')}}" data-toggle="modal"
                    data-target="#exampleModal-top{{$category->id}}subcategory">
                {{ __('category.btn_add_subcategory') }}
            </button>
            @include('inc.modal-top', [
                                           'modal_title' => __('form.modal_service_title'),
                                           'route' => route('category.store',$category->id),
                                           'modal_btn_disagree' => __('form.modal_btn_disagree'),
                                           'modal_btn_agree' => __('form.btn_add'),
                                           'subcategory_id'=> $category->id.'subcategory',
                                       ])
            {{--            @extends('inc.modal-top')--}}
            {{--                @section('modal_title')--}}
            {{--                    {{ __('form.modal_subcategory_title')}}--}}
            {{--                @endsection--}}
            {{--                @section('modal_content')--}}
            {{--                    @include('category.form-subcategory')--}}
            {{--                    <p class="text-danger">--}}
            {{--                        {{ __('form.your_attention') }}--}}
            {{--                    </p>--}}
            {{--                    <h6 class="text-dark">--}}
            {{--                        {{ __('form.modal_info_about_category',['category' => $category->title]) }}--}}
            {{--                    </h6>--}}
            {{--                @endsection--}}
            {{--                @section('modal_btn_disagree')--}}
            {{--                    {{ __('form.modal_btn_close') }}--}}
            {{--                @endsection--}}
            {{--                @section('modal_btn_agree')--}}
            {{--                    {{ __('form.btn_save') }}--}}
            {{--                @endsection--}}
        @endif
    </div>
@endsection
