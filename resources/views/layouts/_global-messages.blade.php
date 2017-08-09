<div class="container global-messages">
    @if(!empty(\Session::get('error')))
      <div class="alert alert-danger">{{ \Session::get('error') }}</div>
    @endif
</div>
