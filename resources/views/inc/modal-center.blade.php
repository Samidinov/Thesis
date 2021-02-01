<!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{$id ?? ''}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ $modal_title ?? 'Modal title'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $modal_description ?? 'Modal description. Its empty form. please control your page' }}
                    <p class="font-weight-bold">
                        {{ $modal_question ?? '' }}
                    </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ $modal_btn_disagree ?? 'Close'}}
                </button>
                <form action="{{ $route ?? ''}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        {{ $modal_btn_agree ?? 'Agree'}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
