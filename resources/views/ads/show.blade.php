@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{ $ad->getTitle() }}</h1>
      <div class="info">
        Author: <span class="author">{{ $author->getUsername() }}</span>
        <br>
        Created <span class="created_date">{{ $ad->getCreatedAt() }}</span>
      </div>
      <br>
      <br>
      <br>
      <p class="text">{{ $ad->getDescription() }}</p>
      @include('ads._manage-buttons', ['ad' => $ad])
    </div>
  </div>
</div>
@endsection
