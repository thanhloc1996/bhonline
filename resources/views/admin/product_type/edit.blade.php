@extends('admin.layout.index')
@section('contentad')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa loại
                            <small> {{$type->name}} </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors)>0)
                            <div class="alert alert-danger">@foreach($errors->all() as $err) {{$err}}<br>@endforeach</div>
                        @endif
                        @if(Session::has('thongbao'))
                             <div class="alert alert-success">{{Session('thongbao')}}</div>
                        @endif
                    <form action="admin/product_type/edit/{{$type->id}}" method="POST">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên</label>
                            <input class="form-control" name="name" placeholder="Please Enter Username" value="{{$type->name}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection