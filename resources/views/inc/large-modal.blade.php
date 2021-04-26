<!-- Large modal -->
<button type="button" title="@yield('modal_call_btn_title')" class="btn btn-primary col-4 offset-4" data-toggle="modal"
        data-target=".bd-example-modal-lg">
    @yield('modal_call_btn')
</button>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content m">
            @yield('modal_content')
        </div>
    </div>
</div>
