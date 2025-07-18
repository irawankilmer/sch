@extends('auth.layout')
@section('title', 'Login')

@push('styles')
    <style>
      .input-group.is-invalid .form-control,
      .input-group.is-invalid .input-group-text {
        border-color: #dc3545 !important;
      }
    </style>
@endpush

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <h4 class="mb-1">Selamat datang kembali</h4>
          <form id="formAuthentication" class="mb-6" action="{{ route('login.store') }}" method="POST">
            @csrf
            <!-- Identifier Field -->
            <div class="mb-4">
              <label for="identifier" class="form-label">Username atau Email</label>
              <input
                type="text"
                class="form-control @error('identifier') is-invalid @enderror"
                id="identifier"
                name="identifier"
                placeholder="Masukkan username atau email..."
                value="{{ old('identifier') }}"
              />
              @error('identifier')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-4 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                <input
                  type="password"
                  id="password"
                  class="form-control @error('password') is-invalid @enderror"
                  name="password"
                  placeholder="••••••••"
                  aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
              </div>
              @error('password')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <!-- Remember + Forgot -->
            <div class="mb-4 d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" name="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
              <a href="auth-forgot-password-basic.html">
                <small>Lupa Password?</small>
              </a>
            </div>

            <!-- Submit -->
            <div class="mb-4">
              <button id="login-btn" class="btn btn-primary d-grid w-100 d-flex align-items-center justify-content-center gap-2" type="submit">
                <div id="login-spinner" class="spinner-border spinner-border-sm text-white d-none" role="status" aria-hidden="true"></div>
                <span id="login-text">Login</span>
              </button>
            </div>
          </form>

          <p class="text-center">
            <span>Baru di platform kami?</span>
            <a href="auth-register-basic.html"><span>Daftar akun</span></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
@if ($errors->has('error'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: {!! json_encode($errors->first('error')) !!},
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        backdrop: false,
        customClass: {
          popup: 'colored-toast'
        }
      });
    });
  </script>
@endif

{{-- tombol animasi loading --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('formAuthentication');
  const btn = document.getElementById('login-btn');
  const spinner = document.getElementById('login-spinner');
  const text = document.getElementById('login-text');

  if (!form || !btn) return;

  form.addEventListener('submit', function () {
    if (!form.checkValidity()) return;

    btn.disabled = true;
    spinner.classList.remove('d-none');
    text.textContent = 'Logging in...';
  });
});
</script>
@include('auth.toast')
@endpush
