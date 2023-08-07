@extends('layouts.template')

@section('header-assets')
@endsection

@section('footer-assets')
@endsection

@php 
$title = 'Tambahkan User';
@endphp
@section('content')
      <!-- Main Container -->
      <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
          <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
              <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                  {{$title}}
                </h1>
                <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                  Tambahkan pengguna baru
                </h2>
              </div>
              <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                  <li class="breadcrumb-item">
                    <a class="link-fx" href="javascript:void(0)">Generic</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="link-fx" href="javascript:void(0)">Configuration</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    {{$title}}
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
        <!-- Floating Labels -->
        <div class="block block-rounded col-ld-6">
            <div class="block-header block-header-default">
              <h3 class="block-title">Tambah Pengguna</h3>
            </div>
            <div class="block-content block-content-full">
              <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-l12">
                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter a username" required>
                      <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-4">
                      <input type="email" class="form-control" id="email" name="email" placeholder="admin@example.com" required>
                      <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                      <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-4">
                      <input type="password" class="form-control" id="password" name="password_confirm" placeholder="Password" required>
                      <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-4">
                      <select class="form-select" id="roles" name="roles" aria-label="Floating label select role" required>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
                      <label for="roles">Roles</label>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Create</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- END Floating Labels -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
@endsection