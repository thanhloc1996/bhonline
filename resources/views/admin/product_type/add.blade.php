@extends('admin.layout.index')
@section('contentad')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Thêm loại</small>
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
                            <form action=" " method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control" name="name" placeholder="Vui lòng nhập loại"  required/>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Images</label>
                                    <input type="file" name="image" >
                                </div> --}}

                             <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection