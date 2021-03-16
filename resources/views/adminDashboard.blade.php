@extends('app/app')
@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                </ol>
              </nav>
            </div>
          </div>
           <!-- Card stats -->
          <div class="row">
            @if($card_1)
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Saldo</h5>
                      <span class="h2 font-weight-bold mb-0">Rp.&nbsp;{{number_format($total_amount->amount)}}</span>
                    </div>
                    <!--div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div-->
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if($card_2)
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Transaksi</h5>
                      <span class="h2 font-weight-bold mb-0">Rp.&nbsp;{{number_format($total_amount_this_week)}}</span>
                    </div>
                    <!--div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div-->
                  </div>
                  <!--p class="mt-3 mb-0 text-sm">
                      <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>0%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p-->
                </div>
              </div>
            </div>
            @endif
            @if($card_3)
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Penghasilan</h5>
                      <span class="h2 font-weight-bold mb-0">Rp.&nbsp;{{number_format($total_amount)}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <!--p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Your Total</span>
                  </p-->
                </div>
              </div>
            </div>
            @endif
            @if($card_4)
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Kantin Aktif</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_canteen}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <!--p class="mt-3 mb-0 text-sm">
                      <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>0%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p-->
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Transaksi Terakhir (5)</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Tanggal Transaksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach($transaction as $data)
                    <tr>
                      <th scope="row">
                        {{$no++}}
                      </th>
                      <td>
                        @if(Session::get('user_type') === 'Siswa')
                          {{number_format(($data->amount * 0.02) + $data->amount,0,'.',',')}}
                        @else
                          {{number_format($data->amount,0,'.',',')}}
                        @endif
                      </td>
                      <td>
                        {{$data->created_at}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection