@extends('layout.master')



@section('content')

    <div class="jumbotron">
      <h2 class="info">Information section</h2>
    </div>

    <div class="container">



        <form method="post" action="{{route('information.store')}}" class="form-horizontal">

            {{csrf_field()}}
            <div class="form-group">

                <div class="col-lg-6">
                    <label for="Name">Name:</label>
                <input type="text" name="name" class="form-control redius" placeholder="Enter Your Name">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                <label for="description"> Description:</label>
                <input type="text" class="form-control" name="description" placeholder="Enter Description">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-6">
                <input type="submit" class="btn btn-default" name="submit" >
                </div>
            </div>


        </form>




    </div>



    @endsection



