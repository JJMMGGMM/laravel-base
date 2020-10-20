@if ($message = Session::get('success'))
  <div class="container">
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  </div>
@endif

@if ($message = Session::get('error'))
  <div class="container">
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  </div>
@endif

@if ($message = Session::get('warning'))
  <div class="container">
    <div class="alert alert-warning alert-block">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  </div>
@endif

@if ($message = Session::get('info'))
  <div class="container">
    <div class="alert alert-info alert-block">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{ $message }}</strong>
    </div>
  </div>
@endif

@if (count($errors) > 0)
  <div class="container">
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Uhhh...</strong>
      <br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
