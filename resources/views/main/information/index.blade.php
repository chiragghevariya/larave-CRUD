@extends('layout.master')

@section('title')
    Info | index
    @stop

@section('content')


    <div class="jumbotron">

        <h1 class="info">Information Data</h1>
    </div>


    <div class="container">

        <div class="autohide">

            @if(session('msg-delete'))

                <div class="alert alert-danger" style="width:40%;position: static;overflow: hidden">
                    {{session('msg-delete')}}
                </div>
            @endif

            @if(session('msg-update'))

                <div class="alert alert-success" style="overflow: hidden;position:static;width: 40%">
                    {{session('msg-update')}}
                </div>
            @endif

            @if(session('message'))

                <div class="alert alert-success" style="width:40%;overflow: hidden;position: static">
                    {{session('message')}}
                </div>
            @endif



        </div>


        <div>

            <a href="{{Route('information.create')}}" class="pull-right btn btn-success" style="position:static;overflow: hidden">create Info</a>

        </div>

        <table class="table table-responsive table-striped tableinfo" >

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                <tr>

            </thead>
            @foreach($infodata as $info)
            <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->name}}</td>
                <td>{{$info->description}}</td>
                <td >  <a href="{{route('information.edit',['id'=>$info->id])}}" class="btn btn-success">Edit</a></td>
                <td>
                    <form method="post" action="{{route('information.destroy',['id'=>$info->id])}}">
                        {{csrf_field()}}
                        {{ method_field('delete') }}

                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>

                </td>

            </tr>

                @endforeach

        </table>


    </div>

    <script type="text/javascript">

        window.setTimeout(function() {
            $(".autohide").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 500);

    </script>

 @endsection