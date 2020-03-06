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

<!-- Leave Modal-->
<div class="modal fade" id="leaveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you want to leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">This decision cannot be withdrawn.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('ajax/' . $community['COM_ID'] . '/leaveCommunity') ?>">Leave</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="accessDenied" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div align="center" style="border-radius:10px;border: 1px">
                <img class="mt-2" src="<?= base_url('assets/'); ?>app-assets/images/pages/lock.png" style="heigth: 200px;width:200px;" class="img-fluid align-self-center" alt="branding logo">
                <h1 class="font-large-2 my-2">Access denied!</h1>
                <p>
                    Only admin can access this page.
                </p>
            </div>
        </div>
    </div>
</div>