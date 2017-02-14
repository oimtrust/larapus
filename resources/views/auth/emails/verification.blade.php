Klik link berikut ini untuk melakukan aktifasi akun larapus :
<a href="{{ $link = url('auth/verify', $token). '?email='.urlencode($user->email) }}">
	{{ $link }}
</a>