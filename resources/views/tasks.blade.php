<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script>
        function load(){
            alert("load");
        }
    </script>
</head>
<body>
   <div class="container">
    <div class="text-center">
        <h1>Daily Task</h1>
        <div class="row">
      
            <div class="col-md-12">
            @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
            @endforeach
            <form method="post" action="/saveTask">
            {{csrf_field()}}
                <input type="text" class="form-control" name="task" placeholder="Enter task here">
                </br>
                <input type="submit" class="btn btn-success" value="submit" onclick="load();">
                <input type="reset" class="btn btn-info" value="reset">
            </form>
                </br>
                <table class="table table-striped">
                <thead style="background-color:#0490b3;color:white">
                    <th>id</th>
                    <th>Task</th>
                    <th>Completed</th>
                    <th>action</th>
                    </thead>
                    @foreach($tasks as $task)
                        <tr >
                            <td style="padding:0.4rem">{{$task->id}}</td>
                            <td style="padding:0.4rem">{{$task->task}}</td>
                            <td style="padding:0.4rem">
                            @if($task->iscompleted)
                            <span class="badge badge-danger">completed</span>
                            @else 
                            <span class="badge badge-info">Not complete</span>
                            @endif
                            </td>
                            <td>
                            @if(!$task->iscompleted)
                            <a href="/markascompleted/{{$task->id}}" class="btn btn-success">Mark as completed</a>
                            @else
                             <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-success">Mark as not completed</a>
                            @endif
                             <a href="/deleteTask/{{$task->id}}" class="btn btn-danger">Delete</a>
                             <a href="updatetask/{{$task->id}}" class="btn btn-warning">Update</a>
                            </td>
                           
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
   </div> 
</body>
</html>