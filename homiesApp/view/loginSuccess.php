<div class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="card card-signup">
					<form class="form" method="post" action="<?= $context->link('login'); ?>">
						<div class="content">

							<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">face</i>
					</span>
								<div class="form-group form-info label-floating is-focused">
									<label class="control-label">Username</label>
									<input type="text" autofocus name="user" class="form-control">
									<span class="material-input"></span>
								</div>
							</div>

							<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">lock_outline</i>
					</span>
								<div class="form-group form-info label-floating is-empty">
									<label class="control-label">Password</label>
									<input type="password" name="password" class="form-control">
									<span class="material-input"></span>
								</div>
							</div>

						</div>
						<div class="footer text-center">
							<input type="submit" class="btn btn-info btn-round"  value="Login"/>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


