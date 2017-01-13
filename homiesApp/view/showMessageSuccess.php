<div class="container">
	<div class="row">
		<div class="cd-section">
			<div class="row">
				<div class="tim-typo">
					<h2 class="title">News</h2>
				</div>
			</div>
		</div>

		<div class="section">

			<div id="new-post" class="col-sm-12 col-md-4 pull-left">

				<div class="card">
					<div class="content">
						<h3 class="category text-info">
							<i class="material-icons">create</i>
							To post a message
						</h3>

						<form id="postMessage" method="post" enctype="multipart/form-data" action="ajaxPostMessage">

							<input type="hidden" id="destinataire" name="destinataire" value="<?= $context->user->id ?>">

							<div class="form-group form-info is-empty">
								<textarea id="message" name="message" class="form-control" placeholder="Write something here..." rows="6"></textarea>
								<span class="material-input"></span>
							</div>

								<div class="form-group">

									<div class="fileinput text-center fileinput-new pull-left" data-provides="fileinput">
										<div class="fileinput-preview fileinput-exists thumbnail img-raised" style="max-width: 50%;"></div>
										<div>

											<button type="button" rel="tooltip" class="btn btn-info" data-original-title="Select an image" data-placement="bottom" title="">
												<i class="material-icons">add_a_photo</i>
												<div class="ripple-container"></div>
												<span class="fileinput-exists">Edit</span>
<!--												<input type="hidden" value="" name="picture">-->
												<input type="file" id="file" name="file" accept="image/*">
												<div class="ripple-container"></div>
											</button>

											<a id="btn-remove" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Delete<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 43.5625px; top: 8.40625px; background-color: rgb(255, 255, 255); transform: scale(15.625);"></div></div></a>
										</div>
									</div>

								</div>

								<input type="submit" class="btn btn-info pull-right" value="Post"/>
						</form>
					</div>
				</div>


		</div>


			<div id="posts" class="col-sm-12 col-md-8 pull-right"></div>


		</div>
</div>


