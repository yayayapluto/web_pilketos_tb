@if (session('easter'))
    <script>
        Swal.fire({
            title: 'PERHATIAN',
            text: "{{ session('easter') }}\nJangan jahil yah",
            background: '#f0f8ff',
            color: '#333',
            showClass: {
                popup: 'animate__animated animate__zoomIn'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOut'
            },
            timer: 5000,
            timerProgressBar: true,
        });
    </script>
@endif


@if (session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn-success'
            }
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            title: 'Error...',
            text: "{{ implode('\\n', $errors->all()) }}",
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn-error'
            }
        });
    </script>
@endif

<style>
    .btn-success {
        background-color: #4CAF50; /* Darker green */
        color: white;
    }

    .btn-error {
        background-color: #F44336; /* Darker red */
        color: white;
    }
</style>
