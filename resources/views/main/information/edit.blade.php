@extends('layout.master')



@section('content')

    <div class="jumbotron">
        <h2 class="info">Information Edit Page</h2>
    </div>

    <div class="container">



        <form method="post" action="{{route('information.update',['id'=>$infoedit->id])}}" class="form-horizontal">

            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <div class="form-group">

                <div class="col-lg-6">
                    <label for="Name">Name:</label>
                    <input type="text" name="name" class="form-control redius"  value="{{$infoedit->name}}" >
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                    <label for="description"> Description:</label>
                    <input type="text" class="form-control" name="description" value="{{$infoedit->description}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                    <input type="submit" class="btn btn-default" name="submit" value="update"  >
                </div>
            </div>


        </form>





    </div>



@endsection



