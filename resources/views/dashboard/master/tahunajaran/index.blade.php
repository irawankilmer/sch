@extends('dashboard.layouts.app')
@section('title', 'Master Data - Tahun Ajaran')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">

    {{-- Flash Message --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row">
      {{-- Info Tahun Ajaran Aktif --}}
      <div class="col-md-6">
        <div class="card border shadow-sm">
          <div class="card-header bg-label-primary d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-primary">📘 Tahun Ajaran Aktif</h5>
            <span class="badge bg-primary">{{ $tahunAktif ? 'Aktif' : 'Belum Aktif' }}</span>
          </div>

          <div class="card-body">
            @if($tahunAktif)
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><strong>Tahun Ajaran</strong></span>
                  <span>{{ $tahunAktif->tahun_ajaran }}</span>
                </li>

                @foreach($tahunAktif->semester->where('status', true) as $s)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <span class="badge bg-success me-2">Semester Aktif</span>
                      {{ $s->semester }}
                    </div>
                    <span class="text-muted">{{ $s->periode }}</span>
                  </li>
                @endforeach
              </ul>
            @else
              <div class="alert alert-warning mb-0">
                <i class="bx bx-info-circle"></i> Belum ada tahun ajaran aktif.
              </div>
            @endif
          </div>
        </div>
      </div>


      {{-- Form Tambah --}}
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Tambah Tahun Ajaran</h5>
          <div class="card-body">
            <form action="{{ route('master.tahunAjaranStore') }}" method="POST">
              @csrf
              <label for="tahun_ajaran_tambah">Tahun Ajaran</label>
              <input type="text" name="tahun_ajaran_tambah" id="tahun_ajaran_tambah"
                     class="form-control @error('tahun_ajaran_tambah') is-invalid @enderror"
                     value="{{ old('tahun_ajaran_tambah') }}">
              @error('tahun_ajaran_tambah')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- Table Tahun Ajaran --}}
    <div class="card mt-4">
      <h5 class="card-header">Daftar Tahun Ajaran</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
          <tr>
            <th>No</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th>Periode</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach($tahunAjarans as $index => $item)
            <tr data-id="{{ $item->id }}">
              <td>{{ $tahunAjarans->firstItem() + $index }}</td>
              <td>
                <div class="tahun-wrapper d-flex align-items-center gap-2">
                  <span class="tahun-text">{{ $item->tahun_ajaran }}</span>

                  {{-- Icon edit --}}
                  <button type="button" class="btn btn-sm p-1 text-primary tahun-edit-btn" title="Edit">
                    <i class='bx bx-pencil'></i>
                  </button>

                  {{-- FORM EDIT --}}
                  @php $editing = session('edit_id') == $item->id; @endphp

                  <form action="{{ route('master.tahunAjaranUpdate', $item->id) }}" method="POST"
                        class="tahun-form {{ $editing ? '' : 'd-none' }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-2">
                      <input type="text" name="tahun_ajaran"
                             class="form-control form-control-sm w-auto @error('tahun_ajaran', 'edit') is-invalid @enderror"
                             value="{{ old('tahun_ajaran', $item->tahun_ajaran) }}" required>
                      @error('tahun_ajaran', 'edit')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                  </form>

                </div>
              </td>

              <td>
                @foreach($item->semester as $s)
                  {{ $s->semester }}
                  @if($s->status)
                    <span class="badge bg-success">Aktif</span>
                  @endif
                  <br>
                @endforeach
              </td>
              <td>
                @foreach($item->semester as $s)
                  {{ $s->periode }}<br>
                @endforeach
              </td>

              <td>
                @if($item->status)
                  <span class="badge bg-success">Aktif</span>
                @else
                  <span class="badge bg-secondary">Nonaktif</span>
                @endif
              </td>
              <td>
                {{-- Tombol Aktifkan Semester --}}
                @foreach($item->semester as $s)
                  @if(!$s->status)
                    <form method="POST" action="{{ route('master.aktifkanSemester', $s->id) }}">
                      @csrf
                      @method('PATCH')
                      <button class="btn btn-sm btn-outline-secondary mt-1" type="submit">Aktifkan {{ $s->semester }}</button>
                    </form>
                  @else
                    <span class="text-muted">Semester Aktif</span>
                  @endif
                  <br>
                @endforeach
              </td>


            </tr>
          @endforeach
          </tbody>
        </table>
        <div class="mt-3 ms-3">
          {{ $tahunAjarans->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const editButtons = document.querySelectorAll('.tahun-edit-btn');

      editButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.stopPropagation();
          const wrapper = this.closest('.tahun-wrapper');
          wrapper.querySelector('.tahun-text').style.display = 'none';
          this.style.display = 'none';
          wrapper.querySelector('.tahun-form').classList.remove('d-none');
        });
      });

      document.addEventListener('click', function (e) {
        document.querySelectorAll('.tahun-wrapper').forEach(wrapper => {
          if (!wrapper.contains(e.target)) {
            const form = wrapper.querySelector('.tahun-form');
            const btn = wrapper.querySelector('.tahun-edit-btn');
            const txt = wrapper.querySelector('.tahun-text');
            if (form && !form.classList.contains('d-none')) {
              form.classList.add('d-none');
              btn.style.display = '';
              txt.style.display = '';
            }
          }
        });
      });

      // Tetap buka form jika error saat update
      const editId = "{{ session('edit_id') }}";
      if (editId) {
        const row = document.querySelector(`[data-id='${editId}']`);
        // auto focus
        row.querySelector("input[name='tahun_ajaran']").focus();
        if (row) {
          row.querySelector('.tahun-text').style.display = 'none';
          row.querySelector('.tahun-edit-btn').style.display = 'none';
          row.querySelector('.tahun-form').classList.remove('d-none');
        }
      }
    });
  </script>
@endpush
