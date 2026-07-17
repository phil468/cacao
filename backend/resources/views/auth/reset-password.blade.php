@extends('layouts.store', ['title' => 'Nueva contraseña | Cacao del Perú'])

@section('content')
<section class="auth-page"><div class="form-card">
    <span class="eyebrow">TU CUENTA</span><h1>Crea una nueva contraseña</h1>
    @if($errors->any())<div class="notice error">{{ $errors->first() }}</div>@endif
    <form method="post" action="{{ route('password.update') }}">@csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label>Correo electrónico<input name="email" type="email" value="{{ old('email', $email) }}" required></label>
        <label>Nueva contraseña<input name="password" type="password" autocomplete="new-password" required></label>
        <label>Confirmar contraseña<input name="password_confirmation" type="password" autocomplete="new-password" required></label>
        <button type="submit">Guardar contraseña</button>
    </form>
</div></section>
@endsection
