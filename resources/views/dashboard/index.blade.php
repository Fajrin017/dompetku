@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang Kembali, {{ auth()->user()->name }}....</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div> -->
      </div>

      <div class="col-lg-6">
        <table class="table table-striped table-sm">
          <tr>
            <td><b>NAME</b></td>
            <td>{{ auth()->user()->name }}</td>
          </tr>
          <tr>
            <td><b>USERNAME</b></td>
            <td>{{ auth()->user()->username }}</td>
          </tr>
          <tr>
            <td><b>EMAIL</b></td>
            <td>{{ auth()->user()->email }}</td>
          </tr> 
          <tr>
            <td><b>PASSWORD</b></td>
            <td>{{ auth()->user()->password }}</td>
          </tr> 
          
        </table>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection