@extends('/app/app')
@section('content')
<script type="text/javascript">
let count = 0;

var client = {
  get: function () {
    return new Promise(function (resolve, reject) {
      count ++;
      setTimeout(function () {
        if (count > 4) resolve({status:'DONE',otherStuff:'Other Stuff'});
        else resolve({status: `count: ${count}`});
      }, 1000);
    });
  }
}


async function someFunction() {
  while (true) {
    let dataResult = await client.get('/status');
    console.log(dataResult.status);
    if (dataResult.status == "DONE") {
      return dataResult;
    }
  }
}

(async () => { let r = await someFunction(); console.log(r); })();
</script>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Top Up</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Operational</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Top Up</li>
                </ol>
              </nav>
            </div>
            <div class="col-xl-12 order-xl-1">
	          <div class="card">
	            <div class="card-header">
	              <div class="row align-items-center">
	                <div class="col-8">
	                  <h3 class="mb-0">Top Up</h3>
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
	            	<form action="{{route('topupReadedPost', $card_id)}}" method="post" enctype="multipart/form-data">
	            	{{csrf_field()}}
	                <div class="pl-lg-4">
	                  <div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Card ID</label>
	                        <input type="text" readonly="" value="{{$card_id}}" name="card_id" id="input-username" class="form-control" placeholder="Card ID" required="">
	                      </div>
	                    </div> 
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label class="form-control-label" for="input-username">Amount</label>
	                        <input type="number" name="amount" id="input-username" class="form-control" placeholder="Amount" required="">
	                      </div>
	                    </div>
	                  </div>
	                </div>
	            </div>
	            <div class="card-footer">
	              <div class="row align-items-center">
	                <div class="col-8">
	                  <h3 class="mb-0">Top Up</h3>
	                </div>
	                <div class="col-4 text-right">
	                  <input type="submit" class="btn btn-md btn-primary" value="Top Up">
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