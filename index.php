

<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Form</title>
	<script type="text/javascript" src="jquery.min.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	
</head>
<body>
	<div class="container" id="addform">
		<h3 style="text-align: center;">Adding New Member</h3>
		<form action="create.php" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="profile" class="col-sm-2 col-form-label">Profile</label>
				<div class="col-sm-10">
					<div class="file btn btn-lg">

						<input type="file" name="profile" class="form-control-file" id="profile"/>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="logo" class="col-sm-2 col-form-label">Logo</label>
				<div class="col-sm-10">
					<div class="file btn btn-lg">

						<input type="file" name="logo" class="form-control-file" id="logo" />
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" id="name">
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Birthday</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" name="birthday" id="dob">
				</div>
			</div>
			<div class="form-group row">
				<label for="gender" class="col-sm-2 col-form-label">Gender</label>
				<div class="col-sm-10">
					<input type="radio" id="male" name="gender" value="male"checked="checked">
					<label class="form-check-label" for="male">Male</label><br>
					<input type="radio" id="female" name="gender" value="female">
					<label class="form-check-label"  for="female">Female</label>
				</div>
			</div>
			<div class="form-group row">
				<label for="language" class="col-sm-2 col-form-label">Favourite Language</label>
				<div class="col-sm-10">
					<select name="language" id="language" class="form-control">
						<option value="html">html</option>
						<option value="css">css</option>
						<option value="javascript">javascript</option>
						<option value="vue">vue</option>
						<option value="jquery">jquery</option>
						<option value="laravel">laravel</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12">
					<!-- <input type="button" class="btn btn-primary form-control" value="Add Now"> -->
					<button type="submit" class="btn btn-primary form-control">Add Now</button>
				</div>
			</div>
		</form>
	</div>
	<div class="container" id="update">
		<h3 style="text-align: center;">Editing Member</h3>


		<form action="update.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="oldid">
			<input type="hidden" name="oldProfile">
			<input type="hidden" name="oldLogo">
			<div class="form-group row">
				<label for="profile" class="col-sm-2 col-form-label">Profile</label>
				<div class="col-sm-10">
					<div class="file btn btn-lg">

						<input type="file" name="profile" class="form-control-file"/>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="logo" class="col-sm-2 col-form-label">Logo</label>
				<div class="col-sm-10">
					<div class="file btn btn-lg">

						<input type="file" name="logo" class="form-control-file" id="logo" />
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name">
				</div>
			</div>
			<div class="form-group row">
				<label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" name="birthday">
				</div>
			</div>
			<div class="form-group row">
				<label for="gender" class="col-sm-2 col-form-label">Gender</label>
				<div class="col-sm-10">
					<input type="radio" id="male" name="gender" value="male"checked="checked">
					<label for="male">Male</label><br>
					<input type="radio" id="female" name="gender" value="female">
					<label for="female">Female</label>
				</div>
			</div>
			<div class="form-group row">
				<label for="language" class="col-sm-2 col-form-label">Favourite Language</label>
				<div class="col-sm-10">
					<select name="language" id="language" class="form-control">
						<option value="html">html</option>
						<option value="css">css</option>
						<option value="javascript">javascript</option>
						<option value="vue">vue</option>
						<option value="jquery">jquery</option>
						<option value="bootstrap">bootstrap</option>
						<option value="laravel">laravel</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12">
					<!-- <input type="button" class="btn btn-primary form-control" value="Add Now"> -->
					<button type="submit" class="btn btn-primary form-control">Update Now</button>
				</div>
			</div>
		</form>
	</div>
	


	<div class="container my-4">
		<center><h3>Member List</h3></center>
		<table class="table table-bordered" border="1">
			<thead>
				<tr>
					<th>#</th>
					<th>photo</th>
					<th>Name</th>
					<th>Birthday</th>
					<th>Gender</th>
					<th>Language</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>

	</div>

	<script type="text/javascript">
		$(document).ready(function () {
			$('tbody').on('click','.btn-delete',function(){
				var id=$(this).data('id');
				$.get('delete.php',{index:id},function(res){
					console.log(res);
					getData();
				})
			})

			$('tbody').on('click','.btn-edit',function(){

                $('#addform').hide();
                $('#update').show();
				var id=$(this).data('id');
				$.get('list.json',function(res){
					var datatype=typeof res;
					var data;
					if(datatype=='object'){
						data=res;
					}else{
						data=JSON.parse(res);

					}
					var array=data[id];
					var profile=array['profile'];
					var logo=array['logo'];
					var name=array['name'];
					var birthday=array['birthday'];
					var gender=array['gender'];
					var language=array['language'];
					$('#update input[name="name"]').val(name);
					$('#update input[name="birthday"]').val(birthday);
					if(gender=="male"){
						$('#update input[value="male"]').prop('checked','checked');
					}else{
						$('#update input[value="female"]').prop('checked','checked');
					}
					$('#update select').val(language);
					$('#update input[name="oldid"]').val(id);
					$('#update input[name="oldProfile"]').val(profile);
					$('#update input[name="oldLogo"]').val(logo);
					
				})
			})

			$('#update').hide();
			getData();
			function getData(){
				//alert("Show Data");

				$.get('list.json',function(res){
					//console.log(res);
					
					var datatype=typeof res;
					var data;
					var html="";
					var j=0;
					if(datatype=='object'){
						data=res;
					}else{
						data=JSON.parse(res);

					}
					//console.log(data);
					$.each(data,function(i,v){
						//console.log(v);
						j++;
						html+=`<tr>
					<th scope="row">${j}</th>
					<td><img src="${v.profile}" width="50" height="50"></td>
					<td>${v.name}</td>
					<td>${v.birthday}</td>
					<td>${v.gender}</td>
					<td>${v.language}</td>
					<td><button class="btn btn-danger btn-delete" data-id="${i}">Delete</button>
						<button class="btn btn-danger btn-edit" data-id="${i}">Edit</button>
					</td>
				</tr>`;
				

					})
					$('tbody').html(html);
				});
			}
			
		})
	</script>

</body>
</html>