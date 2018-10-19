@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>Settings</strong>
                </div>

                <div class="card-body">

                  <form class="" action="{{ route('settings.store') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Site Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="site_name" class="form-control" id="name" value="{{ $setting->site_name or null}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="email" value="{{ $setting->email or null}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $setting->phone or null}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="currency" class="col-sm-2 col-form-label">Currency</label>
                        <div class="col-sm-10">
                          <select name="currency" class="form-control" id="currency">
                            <option value="BDT" @if(isset($setting->currency)) {{$setting->currency == 'BDT' ? 'selected' : ''}} @endif>BDT</option>
                            <option value="USD" @if(isset($setting->currency)) {{$setting->currency == 'USD' ? 'selected' : ''}} @endif>USD</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="perpage" class="col-sm-2 col-form-label">Items Per Page (Backend):</label>
                        <div class="col-sm-10">
                            <input type="number" name="per_page" class="form-control" id="perpage" value="{{ $setting->per_page or null}}" min="1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="homeperpage" class="col-sm-2 col-form-label">Items Per Page (Home):</label>
                        <div class="col-sm-10">
                            <input type="number" name="home_per_page" class="form-control" id="homeperpage" value="{{ $setting->home_per_page or null}}" min="1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="blogperpage" class="col-sm-2 col-form-label">Items Per Page (Blog):</label>
                        <div class="col-sm-10">
                            <input type="number" name="blog_per_page" class="form-control" id="blogperpage" value="{{ $setting->blog_per_page or null}}" min="1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="withsidebarperpage" class="col-sm-2 col-form-label">Items Per Page (With Sidebar):</label>
                        <div class="col-sm-10">
                            <input type="number" name="withsidebar_per_page" class="form-control" id="withsidebarperpage" value="{{ $setting->withsidebar_per_page or null}}" min="1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="perpage" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>
                    </div>

                  </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
