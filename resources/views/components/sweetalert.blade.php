@if (session('success'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: @json(session('success')),
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>
@endif

@if ($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: @json($errors->first()),
        showConfirmButton: false,
        timer: 3000
    });
});
</script>
@endif

@if (session('error'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: @json(session('error')),
        showConfirmButton: false,
        timer: 3000
    });
});
</script>
@endif
