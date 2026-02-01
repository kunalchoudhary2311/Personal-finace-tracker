<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Personal Finance Tracker.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Designed & Developed by <a href="https://www.softanic.in/">Kunal Choudhary.</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- end main content-->

<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->



<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>

<script src="assets/js/custom.js" type="text/javascript"></script>

<script src="assets/js/pages/form-validation.init.js"></script>


<!--datatable js-->

<!--datatable js-->
<script src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/1.11.5/js/dataTables.bootstrap6.min.js"></script>
<script src="http://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="http://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="http://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="http://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script>
    let table = new DataTable('#datatable');
</script>



<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="assets/js/hotkeys.js" type="text/javascript"></script>
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<script src="assets/libs/cleave.js/cleave.min.js"></script>
<!-- form masks init -->
<script src="assets/js/pages/form-masks.init.js"></script>

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweetalerts.init.js"></script>
<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
<!--Invoice create init js-->
<script src="assets/js/pages/invoicecreate.init.js"></script>


<script>

    $('body').hotKey({
        key: 'a',
        modifier: 'alt'
    }, function () {

        if (typeof $('#view-all-button').attr('href') !== 'undefined')
        {

            window.location = $('#view-all-button').attr('href');
        }

    });
</script>

<?php
if (isset($_SESSION['msg'])) {
    ?>
    <script>
        //        $('.toast').toast('show');

        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: <?php echo ucfirst($_SESSION['msg']['timer']); ?>,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({

                title: '<?php echo ucfirst($_SESSION['msg']['title']); ?>!',
                text: "<?php echo ucfirst($_SESSION['msg']['text']); ?>",
                icon: "<?php echo $_SESSION['msg']['type']; ?>"
            });

            //        Swal.fire({
            //            title: "<?php echo ucfirst($_SESSION['msg']['title']); ?>!",
            //            text: "<?php echo ucfirst($_SESSION['msg']['text']); ?>",
            //            icon: "<?php echo $_SESSION['msg']['type']; ?>",
            //            showCancelButton: !1,
            //            confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
            //            cancelButtonClass: "btn btn-danger w-xs mt-2",
            //            buttonsStyling: !1,
            //            showCloseButton: !0,
            //            timer: <?php echo ucfirst($_SESSION['msg']['timer']); ?>
            //        });
        });
    </script>
    <?php
    unset($_SESSION['msg']);
}
?>

</body>

</html>