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
      }, 1000);
    });
  }
}


async function someFunction() {
  while (true) {
    let dataResult = await client.get('/status');
    if (dataResult.status == "DONE") {
      window.location = `transaction/${dataResult.card_id}`;
      return dataResult;
    }
  }
}

(async () => { let r = await someFunction(); console.log(r); })();

  fetch('/filesdat/{{ $machine_id }}/data.json')
  .then(response => response.json())
  .then(data => console.log(data));

</script>
<style type="text/css">
label {
  font-family: "Source Code Pro", monospace;
  padding: 10px 0;
  color: Black;
}
#loader {
  position: relative;
  overflow: hidden;
  background-color: #232635;
  width: 100px;
  height: 10px;
  border-radius: 10px;
}

#loader > div {
  background-color: #fc00ff;
  width: 100%;
}

#loader > div::before,
#loader > div::after {
  content: "";
}

#loader > div,
#loader > div::before,
#loader > div::after {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
}

#loader > div::before {
  background-color: #00fffc;
  animation: comeOn 2s linear 0s infinite;
}

#loader > div::after {
  background-color: #fffc00;
  animation: comeOn 1s linear 0s infinite;
}

@keyframes comeOn {
  0% {
    width: 0px;
    left: 0px;
  }
  50% {
    left: 0px;
    width: 100%;
  }
  100% {
    left: 100%;
    width: 0%;
  }
}



</style>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Read Tag ID</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Operation</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Read Tag ID</li>
                </ol>
              </nav>
            </div>
            <div class="col-xl-12 order-xl-1">
	          <div class="card">
	            <div class="card-header">
	              <div class="row align-items-center">
	                <div class="col-8">
	                  <h3 class="mb-0">Read Tag ID</h3>
	                </div>
	              </div>
	            </div>
	            <div class="card-body pt-10">
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
                        <strong>Gagal!</strong> {!!session('alert')!!}
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
    			       <center>
    				       	<h1>Waiting To Read...</h1>
    		               <div id="loader">
    					   	<div></div>
    					   </div>
    				       <br>
    				       <h3 id="blink" style="opacity: 1;" align="center">Please Scan Tag to Display ID or User Data</h3>
    				       <h3>Page will be redirected if Card ID has been Scanned</h3>
    			       </center>
	            </div>
	          </div>
	        </div>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
	var blink = document.getElementById('blink');
	setInterval(function() {
		blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
	}, 750);
</script>
@endsection