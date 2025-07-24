@extends('dashboard.layouts.app')
@section('title', 'Master Data - Profil Sekolah')

@push('styles')
  <style>
    .input-group.is-invalid .form-control,
    .input-group.is-invalid .input-group-merge,
    .input-group.is-invalid .input-group-text {
      border-color: #dc3545 !important;
      box-shadow: none !important;
    }

    .input-group.is-invalid .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }
  </style>
@endpush

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-6 gy-6">
      <div class="col-xxl">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Profil Sekolah</h5>
          </div>
          <div class="card-body">
            <form id="form-profil-sekolah"
                  action="{{ route('master.profilSekolahUpdate') }}"
                  method="POST"
                  enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{ $data->id }}">

              {{-- Nama Sekolah --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="nama_sekolah">Nama Sekolah</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge @error('nama_sekolah') is-invalid @enderror">
                    <span id="nama_sekolah2" class="input-group-text"><i class="icon-base bx bx-rename"></i></span>
                    <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                           placeholder="Nama Sekolah" value="{{ $data->nama_sekolah }}"
                           aria-describedby="nama_sekolah2"/>
                  </div>
                  @error('nama_sekolah')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              {{-- NPSN --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="npsn">NPSN</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="npsn2" class="input-group-text"><i class="icon-base bx bx-key"></i></span>
                    <input type="text" class="form-control" id="npsn" name="npsn"
                           placeholder="NPSN" value="{{ $data->npsn }}" aria-describedby="npsn2"/>
                  </div>

                  @error('npsn')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              {{-- Akreditasi --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="akreditasi">Akreditasi</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="akreditasi2" class="input-group-text"><i class="icon-base bx bx-equalizer"></i></span>
                    <input type="text" class="form-control" id="akreditasi" name="akreditasi"
                           placeholder="Akreditasi" value="{{ $data->akreditasi }}" aria-describedby="akreditasi2"/>
                  </div>
                </div>
              </div>

              {{-- Logo Sekolah --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="logo_url">Logo Sekolah</label>
                <div class="col-sm-10">
                  <div class="mb-3">
                    @if ($data->logo_url)
                      <img src="{{ asset('storage/' . $data->logo_url) }}"
                           alt="Logo Sekolah"
                           class="img-thumbnail mb-2"
                           style="max-height: 120px;">
                    @endif
                  </div>

                  <input type="file" class="form-control @error('logo_url') is-invalid @enderror"
                         id="logo_url" name="logo_url" accept="image/*">

                  @error('logo_url')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              {{-- Alamat --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="alamat2" class="input-group-text"><i class="icon-base bx bx-pin"></i></span>
                    <textarea id="alamat" name="address" class="form-control" placeholder="Alamat"
                              aria-describedby="alamat2">{{ $data->address }}</textarea>
                  </div>
                </div>
                @error('address')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              {{-- Telepon --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="phone">Nomor Telepon</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="phone2" class="input-group-text"><i class="icon-base bx bx-sitemap"></i></span>
                    <input type="text" id="phone" name="phone" class="form-control phone-mask"
                           placeholder="Nomor Telepon" value="{{ $data->phone }}" aria-describedby="phone2"/>
                  </div>
                </div>
                @error('phone')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>

              {{-- Email --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
                    <input type="text" id="basic-icon-default-email" name="email" class="form-control"
                           placeholder="john.doe" value="{{ $data->email }}"
                           aria-describedby="basic-icon-default-email2"/>
                    <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                  </div>
                  @error('email')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              {{-- Tingkat --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="tingkat">Tingkat</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="tingkat" class="input-group-text"><i class="icon-base bx bx-signal-5"></i></span>
                    <input type="text" id="tingkat" name="tingkat" class="form-control phone-mask"
                           placeholder="Tingkat" value="{{ $data->tingkat }}" aria-describedby="tingkat"/>
                  </div>
                  @error('tingkat')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              {{-- Status --}}
              <div class="row mb-6">
                <label class="col-sm-2 col-form-label" for="status">Status</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="status" class="input-group-text"><i class="icon-base bx bx-check"></i></span>
                    <input type="text" id="status" name="status" class="form-control phone-mask"
                           placeholder="Status" value="{{ $data->status }}" aria-describedby="status"/>
                  </div>
                  @error('status')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              {{-- Submit --}}
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" id="btn-submit" class="btn btn-primary">
                    <span class="btn-text">Send</span>
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
{{--  preview gambar--}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const input = document.getElementById('logo_url');
      const previewContainer = input.closest('.col-sm-10').querySelector('.mb-3');

      input.addEventListener('change', function (e) {
        const file = e.target.files[0];

        if (file && file.type.startsWith('image/')) {
          const reader = new FileReader();

          reader.onload = function (event) {
            let existingPreview = previewContainer.querySelector('img');

            if (!existingPreview) {
              existingPreview = document.createElement('img');
              existingPreview.classList.add('img-thumbnail', 'mb-2');
              existingPreview.style.maxHeight = '120px';
              previewContainer.appendChild(existingPreview);
            }

            existingPreview.src = event.target.result;
          };

          reader.readAsDataURL(file);
        }
      });
    });
  </script>

{{--  loading button--}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('form-profil-sekolah');
      const btn = document.getElementById('btn-submit');
      const spinner = btn.querySelector('.spinner-border');
      const text = btn.querySelector('.btn-text');

      form.addEventListener('submit', function () {
        btn.disabled = true;
        spinner.classList.remove('d-none');
        text.textContent = 'Menyimpan...';
      });
    });
  </script>
@endpush
