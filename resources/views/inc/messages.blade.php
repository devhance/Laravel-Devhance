@if (count($errors) > 0)
    @foreach ($errors as $error)
        {{ $error }}
    @endforeach
@endif

@if(session('sucess'))
    <div class="ui success message">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="ui danger message">
        {{ session('error') }}
    </div>
@endif


adawdadw
