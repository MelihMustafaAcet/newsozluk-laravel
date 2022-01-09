@if(session()->has('success'))
    <script>alertify.success('{{session('success')}}')</script>
    @endif
@if(session()->has('error'))
    <script>alertify.error('{{session('error')}}')</script>
    @endif

@foreach($errors->all() as $error)
<script>
    alertify.error('{{$error}}')
</script>
@endforeach
