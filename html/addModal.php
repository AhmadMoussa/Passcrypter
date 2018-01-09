<!-- Modal -->
<div class="modal fade" id="basicExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header">
			<h4 class="modal-title mx-auto" id="myModalLabel">Add Account</h4>
			</div>

			<!--Body-->
			<div class="modal-body" id="addModalBody">
				<div class="md-form">
				    <input type="text" id="addModalUrl" class="form-control">
				    <label for="addModalWebsite">Website Link:</label>
				</div>

				<div class="md-form">
					<input type="text" id="addModalEmail" class="form-control">
					<label for="addModalEmail">Email</label>
				</div>

				<div class="md-form">
					<input type="text" id="addModalUsername" class="form-control">
					<label for="addModalUsername">Username</label>
				</div>

		        <div class="md-form">
		            <input type="password" id="addModalPass" class="form-control">
		            <label for="addModalPass">Password</label>
		        </div>

		        <div class="md-form">
		            <input type="password" id="addModalPassConfirm" class="form-control">
		            <label for="addModalPassConfirm">Confirm Password</label>
		        </div>

		        <div class="md-form">
				    <input type="text" id="addModalTag" class="form-control" placeholder="Other">
				    <label for="addModalWebsite">Tag</label>
				</div>
	    	</div>

            <!--Footer-->
            <div class="modal-footer">
            	<p class="btn-flat waves-effect" onclick="$('#basicExample').modal('hide');"><strong>Close</strong></p>
                <p class="btn-flat waves-effect" id="addModalSave"><strong>Save</strong></p>
            </div>
        </div>
        <!--/.Content-->
	</div>
</div>
<!-- Modal -->