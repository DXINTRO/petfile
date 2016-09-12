<div class="alert alert-success addOrderSuccess" style="display:none;">
    <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
    <strong><strong>
            </div>
            <div class="panel panel-default" id="adminUsersOrder">
                <!-- Default panel contents -->
                <div class="panel-heading">View Order Of User</div>
                <div class="panel-body">
                    <p>You can search the order of a user here. Just type his/her email to the search bar and press search.</p>
                    <p>Proccessed orders will be marked DONE.</p>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default searchOrderOfUser" type="button">Search</button>
                        </span>
                        <input type="text" class="form-control" name="searchUserEmail" id="searchUserEmail" placeholder="Enter user email">
                    </div>
                </div>

                <div style="height:300px; overflow:auto;border: 1px solid rgba(51, 51, 51, 0.17);margin: 5px;">
                    <!-- Table -->
                    <table class="table table-hover" id="adminOrderTable">
                        <?= $order_table ?>
                    </table>

                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>

                        <div class="modal-body clearfix">

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary confirmAction" data-formSubmit="form">Yes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="footer">
                <p>&copy; Company 2016</p>
            </div>

            </div>