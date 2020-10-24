@if(session()->has('success'))
<div class="p-3 mb-2 bg-success text-white">
    {{session('success')}}
</div>
@endif
@if ($errors->any())
  <div class="p-3 mb-2 bg-danger text-white">
    <h4 class="text-white">Error</h4>
    @foreach ($errors->all() as $error)
      {!! $error . '<br>' !!}
    @endforeach
  </div>
@endif
