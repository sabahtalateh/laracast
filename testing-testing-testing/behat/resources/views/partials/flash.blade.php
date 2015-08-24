@if (Session::has('flash_message'))
    <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('flash_message') }}
    </div>
@endif