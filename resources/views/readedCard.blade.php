@extends('/app/app')
@section('content')
<script type="text/javascript">
  window.EditEventListener("load", function() {
  var limit = 1;
  document.getElementById("Edit").EditEventListener("click", function() {
    // Create a div
    if(limit>0){
      var div = document.createElement("div");
      div.setAttribute("class","form-group");
      // Create a file input
      var file = document.createElement("input");
      file.setAttribute("type", "file");
      file.setAttribute("class", "form-control-file")
      file.setAttribute("name", "foto[]"); // You may want to change this
      file.setAttribute("multiple","");

      // Edit the file and text to the div
      div.appendChild(file);
      limit = limit+1;
      //Append the div to the container div
      document.getElementById("container").appendChild(div);
    }else{
      alert('Maximal 3 gambar');
    }
  });
});
</script>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Card Data</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Operation</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Card Data</li>
                </ol>
              </nav>
            </div>
            <div class="col-xl-12 order-xl-1">
	          <div class="card">
	            <div class="card-header">
	              <div class="row align-items-center">
	                <div class="col-8">
	                  <h3 class="mb-0">Card Data</h3>
	                </div>
	              </div>
	            </div>
	            <div class="card-body">
	            	<div class="row">
	            		<div class="col-sm-12">
	            			@if(session('message'))
				            <div class="card-header bg-transparent pb-2">
				              <div class="alert alert-success">
				                <strong>Sukses!</strong> {!!session('message')!!}.
				              </div>
				            </div>
				            @endif
				            @if(session('alert'))
				            <div class="card-header bg-transparent pb-2">
				              <div class="alert alert-danger">
				                <strong>Gagal!</strong> {!!session('alert')!!}.
				              </div>
				            </div>
				            @endif
	            		</div>
	            	</div>
	            	<form action="{{route('userEditPost', $id)}}" method="post" enctype="multipart/form-data">
	            	{{csrf_field()}}
	                <div class="pl-lg-4">
	                  <div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Name</label>
	                        <input type="text" name="name" value="{{ $user->name }}" id="input-username" class="form-control" placeholder="Name" required="">
	                      </div>
	                    </div> 
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Username</label>
	                        <input type="text" name="username" value="{{ $user->username }}" id="input-username" class="form-control" placeholder="Username" required="">
	                      </div>
	                    </div>                    
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Card ID</label>
	                        <input type="text" name="card_id" value="{{$user->card_id}}" id="input-username" class="form-control" placeholder="Card ID" required="">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Machine ID (Optional)</label>
	                        <input type="text" name="machine_id" value="{{$user->machine_id}}" id="input-username" class="form-control" placeholder="Machine ID">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                       	<div class="form-group">
							  <label class="form-control-label" for="input-last-name">Gender</label>
							  <select name="gender" class="form-control" id="sel1">
							    <option value="1" @if($user->gender==1) selected="selected" @endif>Male</option>
							    <option value="2" @if($user->gender==2) selected="selected" @endif>Female</option>
							  </select>
							</div>
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Phone</label>
	                        <input type="number" value="{{ $user->phone }}" name="phone" id="input-username" class="form-control" placeholder="Phone" required="">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                       	<div class="form-group">
							  <label class="form-control-label" for="input-last-name">User Type</label>
							  <select name="user_type" class="form-control" id="sel1">
							    <option value="3" @if($user->user_type==3) selected @endif>Siswa</option>
							    <option value="2" @if($user->user_type==2) selected @endif>Kantin</option>
							    <option value="1" @if($user->user_type==1) selected @endif>Admin</option>
							  </select>
							</div>
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Amount</label>
	                        <input type="number" value="{{$user->amount}}" name="amount" id="input-username" class="form-control" placeholder="Amount" required="">
	                      </div>
	                    </div>
	                  </div>
	                </div>
	            </div>
	            <div class="card-footer">
	              <div class="row align-items-center">
	                <div class="col-8">
	                  <h3 class="mb-0">Card Data</h3>
	                </div>
	                <div class="col-4 text-right">
	                  <a href="{{URL::previous()}}" class="btn btn-md btn-primary">Back</a>
	                </div>
	              </div>
	            </div>
	            </form>
	          </div>
	        </div>
          </div>
        </div>
      </div>
    </div>
@endsection