@extends('layouts.store', ['title' => 'Recuperar contraseña | Cacao del Perú'])

@section('content')
<section class="auth-page"><div class="form-card">
    <span class="eyebrow">TU CUENTA</span><h1>Recupera tu contraseña</h1>
    <p>Te enviaremos un enlace seguro si encontramos una cuenta con ese correo.</p>
    @if(session('success'))<div class="notice success">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="notice error">{{ $errors->first() }}</div>@endif
    <form method="post" action="{{ route('password.email') }}">@csrf
        <label>Correo electrónico<input name="email" type="email" value="{{ old('email') }}" autocomplete="email" required></label>
        <button type="submit">Enviar enlace</button>
    </form>
</div></section>
@endsection
