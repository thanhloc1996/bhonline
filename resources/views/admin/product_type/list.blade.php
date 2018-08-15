        @extends('admin.layout.index')
        @section('contentad')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                       
                         
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                        <div class="row"><p> @if(count($errors)>0)
                            <div class="alert alert-danger">@foreach($errors->all() as $err) {{$err}}<br>@endforeach</div>
                        @endif
                        @if(Session::has('thongbao'))
                             <div class="alert alert-success">{{Session('thongbao')}}</div>
                        @endif</p>

                        </div>
                        <thead>
                            <tr align="center" text-align="center">
                                <th>ID</th>
                                <th>Loại bánh</th>
                                <th>Hình ảnh</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_type as $type)
                            <tr class="odd gradeX" align="center">
                                <td>{{$type->id}}</td>
                                <td>{{$type->name}}</td>
                                <td><img src="source/image/product/{{$type->image}}" height="40"> </td>                              
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product_type/delete/{{$type->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product_type/edit/{{$type->id}}">Sửa</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection
