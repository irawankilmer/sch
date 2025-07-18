@if (session('success') || session('error') || session('warning') || session('info'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: '{{ session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'warning' : 'info')) }}',
        title: {!! json_encode(session('success') ?? session('error') ?? session('warning') ?? session('info')) !!},
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

  <style>
    .colored-toast {
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      border-radius: 6px;
      font-size: 14px;
    }
  </style>
@endif



<script>
  document.addEventListener('DOMContentLoaded', function () {
    const logoutBtn = document.getElementById('logout-button');
    if (logoutBtn) {
      logoutBtn.addEventListener('click', function (e) {
        e.preventDefault();

        Swal.fire({
          title: 'Yakin ingin logout?',
          text: 'Sesi kamu akan diakhiri.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya, logout',
          cancelButtonText: 'Batal',
          customClass: {
            popup: 'zindex-sweetalert',
            confirmButton: 'btn btn-danger me-2',
            cancelButton: 'btn btn-secondary'
          },
          buttonsStyling: false,
          backdrop: true, // PENTING
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
          }
        });
      });
    }
  });
</script>