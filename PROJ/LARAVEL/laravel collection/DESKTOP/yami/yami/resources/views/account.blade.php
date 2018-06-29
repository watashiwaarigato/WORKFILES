<!DOCTYPE html>
<html>
<head>
	<title>Menu | YAMI YUGI</title>
	<meta charset="UTF-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<link href="/common/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link href="/common/css/alignment.css" rel="stylesheet">
	<link href="/common/css/account.css" rel="stylesheet">

	<script type="text/javascript" src="/common/js/jquery.js"></script>
	<script type="text/javascript" src="/common/components/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="/common/js/account.js"></script>
</head>
<body>


	
	<div class="cover">
		<div class="wrap">
			
		</div>
	</div>
	<div class="info">
		<div class="wrap">
			<div class="char">
				<div class="avatar">
					<p class="img">
						@if(!empty($data->avatar))
							<img src="{{ $data->avatar }}">
						@endif
					</p>
					<p class="btn"><a href="#">change</a></p>
				</div>
			</div>
			<div>
				<p class="cname">{{ $data->nickname }} <span>({{ $data->username }})</span> <span class="btn"><a href="#">change</a></span></p>
				
			</div>
		</div>
	</div>
	
	
	
	
	<!-- Modal Picture Upload-->
	<div id="pictureModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<form method="POST" action="/account" accept-charset="UTF-8" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<p class="modal-title"><strong>Change Picture</strong></p>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="usr">Image:</label>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="file" name="file" class="form-control" required="required">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" id="save_pic">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	
	<!-- Modal Change Name-->
	<div id="chatnameModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<form method="POST" action="/account/changename" accept-charset="UTF-8">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<p class="modal-title"><strong>Change Name</strong></p>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="usr">Chat Name:</label>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="text" name="chatname" maxlength="15" value="{{ $data->nickname }}" class="form-control" required="required">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default" id="save_pic">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</body>
</html>