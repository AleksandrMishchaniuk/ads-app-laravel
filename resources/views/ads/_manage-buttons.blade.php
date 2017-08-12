@can('manage', $ad)
  <div class="pull-right manage_buttons">
    {{ link_to_route('ad.edit', 'Edit', ['id' => $ad->getId()], [
      'class' => 'btn btn-primary'
    ]) }}
    {!! Form::submit("Delete", [
      'class' => 'btn btn-danger',
      'form' => 'delete_form_' . $ad->getId(),
    ]) !!}
    {!! Form::open([
      'method' => 'DELETE',
      'route' => ['ad.destroy', $ad->getId()],
      'class' => 'form-inline',
      'id' => 'delete_form_' . $ad->getId(),
    ]) !!}
    {!! Form::close() !!}
  </div>
@endcan
