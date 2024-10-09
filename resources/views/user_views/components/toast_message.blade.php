<!-- Toast Message -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 99">
    <div id="liveToast" @class([ 'toast' , 'show'=> Session::get('success') || Session::get('error') ]) role="alert" aria-live="assertive" aria-atomic="true">
        <div @class([ 'd-flex' , 'bg-success'=> Session::get('success'), 'bg-danger' => Session::get('error') ])>
            <div class="toast-body">
                <span class="text-white" id="toastMessage">
                    {{ Session::get('error') ? Session::get('error') : Session::get('success') }}
                </span>
            </div>
        </div>
    </div>
</div>
<!-- End Toast Message -->
<script>
    @if(Session::get('success') || Session::get('error'))
    $("#liveToast").show(0).delay(2000).hide(0)
    @endif
</script>