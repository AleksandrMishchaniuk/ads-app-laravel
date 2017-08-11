@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @if (Auth::check())
            {{ link_to_route('ad.create', 'Create Ad') }}
            <br>
            <br>
          @endif
          @foreach ($ad_page as $ad)
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4>
                  {{ link_to_route('ad.show', $ad->getTitle(), ['id' => $ad->getid()]) }}
                </h4>
                <div>
                  <small>
                    Author: {{ $users[$ad->getUserId()]->getUsername() }}
                    /
                    {{ $ad->getCreatedAt() }}
                  </small>
                </div>
              </div>

              <div class="panel-body">
                {{ $ad->getDescription() }}
              </div>
            </div>
          @endforeach
          {{ $ad_page->links() }}
        </div>
    </div>
</div>
@endsection
