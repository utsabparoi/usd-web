@extends('layouts.backend.app')
@section('title', 'Dashboard')

@section('content')

    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Dashboard</li>
            </ul><!-- /.breadcrumb -->
        </div>

          <div class="page-content">
            <div class="row">
              <div class="card">
                <div class="container">
                  <span><i class="fa fa-users" aria-hidden="true"></i></span>
                  <b>Totol Investor</b>
                  <p>300</p>
                </div>
              </div>
              <div class="card">
      
                <div class="container">
                  <span><i class="fa fa-users" aria-hidden="true"></i></span>
                  <b>Active Investor</b>
                  <p>200</p>
                </div>
              </div>
              <div class="card">
             
                <div class="container">
                  <span> <i class="fas fa-hand-holding-usd"></i></span>
                  <b>Total Deposited</b>
                  <p>345678999$</p>
                </div>
              </div>
            </div>
   
          </div>
        
          <div class="page-content">
            <div class="row">
              <div class="card">
                <div class="container">
                  <span><i class="fas fa-spinner"></i></span>
                  <b>Pending Deposited</b>
                  <p>4555555$</p>
                </div>
              </div>
              <div class="card">
              
                <div class="container">
                  <span><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                  <b>Total Withdrawan</b>
                  <p>360000$</p>
                </div>
              </div>
              <div class="card">
             
                <div class="container">
                  <span><i class="fa fa-spinner" aria-hidden="true"></i></span>
                  <b>Pending Withdraw</b>
                  <p>30000$</p>
                </div>
              </div>
            </div>
   
          </div>
        @push('js')
        @endpush
    @endsection
  {{-- <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="card text-white bg-primary" >
                        <div class="card-header text-center" style="padding:3px; font-size:15px; background-color:#FF9F43">Total Investor
                        </div>
                        <div style="padding:3px; font-size:15px; background-color:#a26e9c; display:flex">
                          <span style="font-size: 2em;
                          background-color: #28C751;
                          color: white;
                          border-radius: 11px;
                          padding: 6px;
                          width: 21%;
                          margin-left: -3px;
                          text-align: center;">
                            <i class="fas fa-hand-holding-usd"></i>
                          </span>
                          <p style="padding:10px; margin-left:200px; font-size:20px">50</p>
                        </div>
                      
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 active-investor">
                   <div class="row">
                    <div class="active-log">
                      <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="active-text">
                      <p>Active Investor</p>
                      <h3>77</h3>
                    </div>
                   </div>
                </div>
                <div class="col-xs-12 col-md-4 text-center">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header">Total Deposit</div>
                        <div class="col-4">
                          <span style="font-size: 3em; background-color:#28C76F; color:white;">
                            <i class="fas fa-hand-holding-usd"></i>
                          </span>
                        </div>
                        <div class="col-8 text-end">
                          <h4 class="card-title">50</h4>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-4 text-center">
                  <div class="card">
                    <img src="img_avatar.png" alt="Avatar" style="width:100%">
                    <div class="container">
                      <h4><b>John Doe</b></h4>
                      <p>Architect & Engineer</p>
                    </div>
                  </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 text-center">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Total Withdrawan</div>
                        <div class="col-4">
                          <span style="font-size: 3em; background-color:#28C76F; color:white;">
                            <i class="fas fa-hand-holding-usd"></i>
                          </span>
                        </div>
                        <div class="col-8 text-end">
                          <h4 class="card-title">50</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 text-center">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Pending Withdrawals</div>
                        <div class="col-4">
                          <span style="font-size: 3em; background-color:#28C76F; color:white;">
                            <i class="fas fa-hand-holding-usd"></i>
                          </span>
                        </div>
                        <div class="col-8 text-end">
                          <h4 class="card-title">50</h4>
                      </div>
                    </div>
                </div>
            </div> --}}