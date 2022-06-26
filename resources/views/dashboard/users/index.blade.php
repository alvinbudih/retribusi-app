@extends("layouts.main")

@section("content")
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      @if(session()->has("success"))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session("success") }}
      </div>
      @endif

      <h3 class="card-title">{{ $title }}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#modal-default">
          <i class="fas fa-plus"></i>
          Tambah Data
        </button>
        {{-- <a href="{{ route('user.create') }}" class="btn btn-primary">
          <i class="fas fa-plus"></i>
          Tambah Data
        </a> --}}
      </div>
    </div>
    <div class="card-body">
      <table class="table table-sm table-hover text-nowrap projects">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
              {{-- <button type="submit" class="btn btn-success btn-sm tombol-ubah" data-toggle="modal" data-target="#modal-default" data-id="{{ $user->id }}">
                <i class="fas fa-pencil-alt"></i>
                Edit
              </button> --}}
              <a class="btn btn-success btn-sm" href="{{ route('user.edit', [$user->id]) }}">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
              </a>
              <form action="{{ route("user.destroy", [$user->id]) }}" method="post" class="d-inline">
                @method("delete")
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')">
                  <i class="fas fa-trash"></i>
                  Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <form action="" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-judul">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
            @error("name")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
            @error("username")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="yourname@example.com" name="email" value="{{ old('email') }}">
            @error("email")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
            @error("password")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="roles">Role</label>
            @foreach($roles as $role)
              <div class="custom-control custom-switch">
                <input class="custom-control-input" type="checkbox" name="roles{{ $role->id }}" id="roles{{ $role->id }}" value="{{ $role->id }}">
                <label class="custom-control-label" id="roles{{ $role->id }}">{{ $role->role_name }}</label>
              </div>
            @endforeach
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script src="{{ asset('js/script.js') }}"></script>
@endsection