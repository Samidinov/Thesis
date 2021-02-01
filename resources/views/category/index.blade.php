@extends('layouts.app')
@section('content')
    <div class=" col-10 offset-1">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">{{__('category.table_category_title')}}</th>
                <th scope="col">{{__('category.table_category_slug')}}</th>
                <th scope="col">
                    <i class="fa fa-cogs text-center"></i>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                        <td class="text-danger">#</td>
                        <td>{{$category->title}}</td>
                        <td class="text-muted">{{$category->slug}}</td>
                        <td>
                            <a href="{{ route('category.edit',$category) }}"
                               title="{{ __('form.btn_icon_edit',['attribute' => $category->title]) }}"
                               class="fa fa-pencil text-info d-inline-block"></a>

                            <button type="button" class="btn text-danger ml-2 fa fa-trash" data-toggle="modal"
                                    title="{{ __('form.btn_icon_destroy_hover',['attribute' => $category->title]) }}"
                                    data-target="#exampleModalCenter{{$category->id}}">
                            </button>
                            @include('inc.modal-center', [
                                    'modal_title' => __('form.modal_title'),
                                    'modal_description' => __('form.modal_title'),
                                    'modal_btn_agree' => __('form.modal_btn_agree'),
                                    'modal_btn_disagree' => __('form.modal_btn_disagree'),
                                    'modal_category_question' => __('form.modal_category_question'),
                                    'route' => route('category.destroy', $category->id),
                                    'id' => $category->id,
                                ])
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('category.create') }}" class="btn btn-info col-4 offset-4"
           title="{{ __('form.btn_add_category') }}"> {{ __('category.btn_add') }}
        </a>
    </div>

@endsection
