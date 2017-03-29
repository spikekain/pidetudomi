@if (count($errors)>0)
  <div class="alert alert-danger " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Datos Incompletos

      @foreach ($errors->all() as $error)
          <ul>
        {!!$error!!}
        </ul>
      @endforeach

  </div>
@endif
