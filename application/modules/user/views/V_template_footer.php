<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="http://www.hummasoft.com/" target="_blank">Hummasoft</a>All rights Reserved</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->

<!-- searching -->
<script>
    $(document).ready(function() {
        $('#keyword').keyup(function() {
            var search = $('#keyword').val();
            if (search != '') {
                $.ajax({
                    url: "<?= base_url('ajax') ?>",
                    method: "POST",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // updating the view with notifications using ajax
        function load_unseen_notification(view = '') {
            $.ajax({
                url: "<?= base_url("ajax/notification") ?>",
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    html = '';
                    $('.list-notification').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('#unseen').html(data.unseen_notification);
                        html += '<h3 class="white" id="count">' + data.unseen_notification + ' New</h3><span class = "notification-title" > Notifications </span>';
                        $('#count').html(html);
                    } else {
                        html += '<h3 class="white" id="count">0 New</h3><span class = "notification-title" > Notifications </span>';
                        $('#count').html(html);
                    }
                }
            });
        }
        load_unseen_notification();
        // load new notifications
        $('.dropdown-notification').on('click', function() {
            $('.count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function() {
            load_unseen_notification();;
        }, 5000);
    });
</script>