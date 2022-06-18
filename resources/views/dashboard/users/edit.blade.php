@extends("layouts.main")
@section("content")
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{ $title }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('user.update', [$user->id]) }}" method="POST" role="form">
          @method("put")
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="name">Nama Lengkap</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Lengkap" name="name" value="{{ old('name', $user->name) }}">
                  @error("name")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username', $user->username) }}">
                  @error("username")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
                  @error("email")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" name="password">
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="roles">Role</label>
                  @foreach($roles as $role)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="roles{{ $role->id }}" value="{{ $role->id }}" {{ in_array($role->role_name, $userRole) ? 'checked' : '' }}>
                      <label class="form-check-label">{{ $role->role_name }}</label>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('user.index') }}" class="btn btn-warning">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
@endsection