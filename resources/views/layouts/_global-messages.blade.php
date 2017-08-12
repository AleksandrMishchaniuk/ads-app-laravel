<div class="container global-messages">
    @if(!empty(\Session::get('error')))
      <div class="alert alert-danger">{{ \Session::get('error') }}</div>
    @elseif (!empty(\Session::get('notice')))
      <div class="alert alert-success">{{ \Session::get('notice') }}</div>
    @endif
</div>
