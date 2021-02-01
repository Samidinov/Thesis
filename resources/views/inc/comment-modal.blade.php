<button type="button" class="btn btn-primary" data-toggle="modal"
        data-target=".bd-example-modal-lg">{{$modal_btn}}</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$modal_title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            ...

            <div class="modal-footer">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ __('form.modal_your_comment') }}</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1"  name="comment" rows="3"></textarea>
                    </div>
                    <input type="number" class="d-none" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">{{ __() }}</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
