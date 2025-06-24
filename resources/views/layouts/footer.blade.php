    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset ('sbadmin2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset ('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('sbadmin2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset ('sbadmin2/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ asset ('sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset ('sbadmin2/js/demo/datatables-demo.js')}}"></script>
    <script src="{{ asset ('sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    @session('success')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: "{{ session('success') }}"
        });
    </script>
    @endsession

    @session('error')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: "{{ session('error') }}"
        });
    </script>
    @endsession



</body>

</html>