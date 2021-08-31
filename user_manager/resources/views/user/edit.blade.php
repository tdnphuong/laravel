<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    label{
        font-weight: bold;
        font-size: 13px;
    }
    .col-6 > input {
        background-color: #EDF2F7;
    }
    .col-12.mt-2 > input {
        background-color: #EDF2F7;
    }
    .col-4 > input {
        background-color: #EDF2F7;
    }
    .btn.btn-primary {
        background-color: #808080;
        font-color: #FFFFFF;
        margin-right:5px;
    }
    p {
        font-size:30px;
        font-weight:bold;
        width:100%;
        text-align:center;
    }
    @media screen and (max-width:767px){
        * {
            box-sizing:unset;
        }
        .col-12.mt-2 > input {
            max-width:200px
        }
        .col-4 {
            flex: unset;
            max-width: none;
        }
    }
</style>    
<body>
    <p> Edit User </p>
    <div class="container mt-4 w-50">
        <form action='{{route("handle_edition", ["id" => $user->id])}}' method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="">FIRST NAME</label>
                    <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" required>
                </div>
                <div class="col-6">
                    <label for="">LAST NAME</label>
                    <input type="text" class="form-control"  value="{{$user->last_name}}" name="last_name"required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <label for="">PASSWORD</label>
                    <input type="password" class="form-control"  value="{{$user->password}}" name="password">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">
                    <label for="">CITY</label>
                    <input type="text" class="form-control"  value="{{$user->city}}" name="city">
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">COUNTRY</label>   
                        <select class="form-control" id="sel1" name="country" default=" value="{{$user->country}}">
                            <option value="Viet Nam"
                                 @if ($user->country == 'Viet Nam') 
                                    selected="selected"
                                 @endif >Viet Nam</option>

                            <option value="USA" @if ($user->country == 'USA') 
                                    selected="selected"
                                 @endif>USA</option>    
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <label for="">ZIP</label>   
                    <input type="text" class="form-control" placeholder="Last name" name="zip" value="{{$user->zip}}">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6"></div>
                <div class="col-6 text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn  font-weight-bold"  href='{{route("index")}}'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>