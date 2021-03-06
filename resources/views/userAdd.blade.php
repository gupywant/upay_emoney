@extends('/app/app')
@section('content')
<script type="text/javascript">
let count = 0;
var date2 = new Date();
var status = null

var client = {
  get: function () {
    return new Promise(function (resolve, reject) {
      var jsonData = ''
      fetch('/filesdat/{{ $machine_id }}/data.json')
		  .then(response => response.json())
		  .then(data => jsonData = data);
      setTimeout(function () {
      	var date1 = new Date(jsonData.read_date);
        if (date1 >= date2) resolve({status:'DONE',card_id:jsonData.card_id});
        else resolve({status: `count: ${date1}`});
      }, 450);
    });
  }
}


async function someFunction() {
  while (true) {
    let dataResult = await client.get('/status');
    if (dataResult.status == "DONE") {
      document.getElementById("card_id").value = dataResult.card_id
      return dataResult;
    }
  }
}

(async () => { let r = await someFunction(); console.log(r); })();

  fetch('/filesdat/{{ $machine_id }}/data.json')
  .then(response => response.json())
  .then(data => console.log(data));
</script>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Add User</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">User Data</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
              </nav>
            </div>
            <div class="col-xl-12 order-xl-1">
	          <div class="card">
	            <div class="card-header">
	              <div class="row align-items-center">
	                <div class="col-8">
	                  <h3 class="mb-0">Add User</h3>
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
	            	<form action="{{--route('admin.kueTambah')--}}" method="post" enctype="multipart/form-data">
	            	{{csrf_field()}}
	                <div class="pl-lg-4">
	                  <div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Name</label>
	                        <input type="text" name="name" id="input-username" class="form-control" placeholder="Name" required="">
	                      </div>
	                    </div> 
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Username</label>
	                        <input type="text" name="username" id="input-username" class="form-control" placeholder="Username" required="">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Card ID</label>
	                        <input type="text" id="card_id" name="card_id" id="input-username" class="form-control" placeholder="Card ID" required="">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Machine ID (Optional)</label>
	                        <input type="text" name="machine_id" id="input-username" class="form-control" placeholder="Machine ID">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                       	<div class="form-group">
							  <label class="form-control-label" for="input-last-name">Gender</label>
							  <select name="gender" class="form-control" id="sel1">
							    <option value="1">Male</option>
							    <option value="2">Female</option>
							  </select>
							</div>
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Phone</label>
	                        <input type="number" name="phone" id="input-username" class="form-control" placeholder="Phone" required="">
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                       	<div class="form-group">
							  <label class="form-control-label" for="input-last-name">User Type</label>
							  <select name="user_type" class="form-control" id="sel1">
							    <option value="3">Siswa</option>
							    <option value="2">Kantin</option>
							    <option value="1">Admin</option>
							  </select>
							</div>
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Amount</label>
	                        <input type="number" name="amount" id="input-username" class="form-control" placeholder="First Amount" required="">
	                      </div>
	                    </div>
	                  </div>
	                </div>
	            </div>
	            <div class="card-footer">
	              <div class="row align-items-center">
	                <div class="col-8">
	                  <h3 class="mb-0">Add User</h3>
	                </div>
	                <div class="col-4 text-right">
	                  <input type="submit" class="btn btn-md btn-primary" value="Add User">
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