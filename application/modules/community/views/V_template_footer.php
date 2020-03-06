<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Report Community</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <form method="post" action="<?= base_url('community/' . $community['COM_ID'] . '/report') ?>">
                            <li class="d-inline-block mr-2">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="report[]" value="Pornography">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Pornography</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="report[]" value="Deception">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Deception</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="report[]" value="Racism">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Racism</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" name="report[]" value="Inactive">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Inactive</span>
                                    </div>
                                </fieldset>
                            </li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <textarea rows="4" id="textarea" name="report[]" placeholder="Or describe the problem here" style="width: 475px; height:100px ; margin-left: 16px; padding: 10px;"></textarea>
                <label class="control-label" for="textarea"></label><i class="mtrl-select"></i>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Report</button>
            </div>
        </div>
        </form>
    </div>
</div>


<!-- leave community -->
<script>
    $(document).ready(function() {
        if (!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        } else {
            $("#leave").click(function() {
                var id = $('#leave').data('id');

                Swal.fire({
                    title: 'Are you sure you want to leave this community?',
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?= base_url('ajax/leaveCommunity') ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                window.location.href = 'http://localhost/hummanitas/user/user_community';
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'There is error when deleting gallery.',
                                    'error'
                                )
                            }
                        });

                    }
                })

            });
        }
    });
</script>
<script>
    // $(document).ready(function() {
    //     if (!window.location.hash) {
    //         window.location = window.location + '#loaded';
    //         window.location.reload();
    //     } else {
    //         $(".memberManage").click(function() {
    //             Swal.fire({
    //                 type: 'error',
    //                 title: 'Access denied',
    //                 text: 'Only admin can access this page!'
    //             })
    //         });
    //         $(".settingCom").click(function() {
    //             Swal.fire({
    //                 type: 'error',
    //                 title: 'Access denied',
    //                 text: 'Only admin can access this page!'
    //             })
    //         });
    //     }

    // });
    (function($) {
        $(function() {
            $(".memberManage").click(function() {
                Swal.fire({
                    type: 'error',
                    title: 'Access denied',
                    text: 'Only admin can access this page!'
                })
            });
            $(".settingCom").click(function() {
                Swal.fire({
                    type: 'error',
                    title: 'Access denied',
                    text: 'Only admin can access this page!'
                })
            });
        });
    }(jQuery));
</script>