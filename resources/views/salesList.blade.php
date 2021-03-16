@extends('app/app')
@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Sales Report</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
                </ol>
              </nav>
            </div>
            <div class="col-xl-12 order-xl-1">
	          <div class="card">
	            <!-- Card header -->
	            <div class="card-header border-0">
	              	<h3 class="mb-0">Sales Report</h3>
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
	            </div>
	            <!-- Light table -->
	            <div class="table-responsive">
	              <table class="table align-items-center table-flush" id="myTable">
	                <thead class="thead-light">
	                  <tr>
	                    <th scope="col" class="sort" data-sort="name">No</th>
	                    <th scope="col" class="sort" data-sort="completion">Transaction Amount</th>
	                    <th scope="col" class="sort" data-sort="completion">Transaction Date</th>
	                  </tr>
	                </thead>
	                <tbody class="list">
	                @php
	                	$no = 1;
	                @endphp
	                @foreach($sales as $key => $data)
	                  <tr>
	                    <td scope="row">
	                      {{$no++}}
	                    </td>
	                    <td>
	                      {{$data->amount}}
	                    </td>
	                    <td>
	                      {{$data->created_at}}
	                    </td>
	                  </tr>
	                @endforeach
	                </tbody>
	              </table>
	            </div>
	            <!-- Card footer -->
	            <div class="card-footer py-4">
	            </div>
	          </div>
	        </div>
          </div>
        </div>
      </div>
    </div>
@endsection