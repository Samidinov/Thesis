<!-- Modal -->
<div class="modal fade" id="exampleModal-top{{$subcategory_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{$modal_title}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ $route }}" method="post">
                @csrf

                <div class="modal-body">
                    @include('category.form-subcategory')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ $modal_btn_disagree }}
                    </button>
                    <button type="submit" class="btn btn-info" title="">
                        {{ $modal_btn_agree }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
