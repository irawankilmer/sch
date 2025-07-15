@if (session('success') || session('error') || session('warning') || session('info'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: @json(session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'warning' : 'info'))),
      title: @json(session('success') ?? session('error') ?? session('warning') ?? session('info')),
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      customClass: {
        popup: 'colored-toast'
      }
    });
  });
</script>
@endif
