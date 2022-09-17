@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $errors->first() }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(session('success'))
<div class="deleteModal bg-gray-400 px-3 alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="hide()">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<script>
  function hide(){
        $('.deleteModal').addClass('hidden');
    }

</script>


@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('error') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif