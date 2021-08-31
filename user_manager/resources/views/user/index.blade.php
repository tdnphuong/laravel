<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
    <style>
        .has-search .form-control {
            padding-left: 2.375rem;
        }
        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
        .title > th {
            color: #808080;
        }
        a {
            margin-left: 10px;
        }
        .form-control{
            background-color: #EDF2F7;
        }
        p {
            font-size:30px;
            font-weight:bold;
            width:100%;
            text-align:center;
        }
        tbody > tr >th {
            font-weight:normal;
        }
        .col-4{
            min-width:300px;
        }
        @media screen and (min-width:330px){
            .col-1{
            max-width:none;
            flex:unset;
            }
        }
        @media screen and (min-width:768px){
            .col-1{
                flex: 0 0 8.333333%;
                max-width: 8.333333%;
            }
        }
    </style>
<body>
    <p>USER MANAGER<p>
    <div class="container mt-4">
        <div class="row">
            <div class="col-1">
                <h3>List</h3>
            </div>
            <div class="col-4">
                <form action="{{route('search')}}" method="get">
                    @csrf
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search" name="search" id="search-input" value="<?php echo $searched ?? '';?>">
                    </div>
                    <button class="btn-primary hidden" type="submit" id="search-btn" style="display:none"></button>
                </form> 
            </div>
        </div>
        <table class="table">
            <thead>
                <tr class="title">
                <th scope="col">Id</th>
                <th style="width: 200px"scope="col">Name</th>
                <th scope="col">City</th>
                <th style="width: 150px"scope="col">State</th>
                <th style="width: 120px"scope="col">Zip</th>
                <th scope="col">Create at</th>
                <th scope="col">Update at</th>
                <th scope="col"></th>
                </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <th  scope="row">{{$user->id}}</th>
                        <td>{{$user->first_name . ' ' . $user->last_name}}</td>
                        <td>{{$user->city}}</td> 
                        <td>{{$user->country}}</td> 
                        <td>{{$user->zip}}</td> 
                        <td>{{date("d-m-Y", strtotime($user->created_at))}}</td>
                        <td>{{date("d-m-Y", strtotime($user->updated_at))}}</td>
                        <td>
                            <a href="{{route('add-user')}}" class="btn btn-info">Add</a>
                            <a href="{{route('edit', ['id' => $user->id])}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('delete', ['id' => $user->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<script>
    var input = document.getElementById("search-input");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("search-btn").click();
        }
    });

</script>
</html>