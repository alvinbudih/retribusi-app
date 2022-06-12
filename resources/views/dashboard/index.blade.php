@extends('layouts.main')
@section('content')
<section role="main" class="content-body">
  <header class="page-header">
    <h2>Blank Page</h2>
  
    <div class="right-wrapper pull-right">
      <ol class="breadcrumbs">
        <li>
          <a href="index.html">
            <i class="fa fa-home"></i>
          </a>
        </li>
        <li><span>Pages</span></li>
        <li><span>Blank Page</span></li>
      </ol>
  
      <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
  </header>

  <!-- start: page -->
  @can('admin')
  <div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
          </div>

          <h2 class="panel-title">Judul Admin</h2>
        </header>
        <div class="panel-body">
          ini adalah content untuk admin
        </div>
      </section>
    </div>
  </div>
  @endcan

  @can('kasir')
  <div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
          </div>

          <h2 class="panel-title">Judul Kasir</h2>
        </header>
        <div class="panel-body">
          ini adalah content untuk Kasir
        </div>
      </section>
    </div>
  </div>
  @endcan

  @can('pelayanan')
  <div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
          </div>

          <h2 class="panel-title">Judul Pelayanan</h2>
        </header>
        <div class="panel-body">
          ini adalah content untuk pelayanan
        </div>
      </section>
    </div>
  </div>
  @endcan
  <!-- end: page -->
  
</section>
@endsection