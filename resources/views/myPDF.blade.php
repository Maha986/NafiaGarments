<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>

     @php

    $path = 'oo.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
        
   @endphp
    <h1>Welcome to ItSolutionStuff.com - </h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  
    <br/>
    <strong>Public Folder:</strong>
    <img src="{{ $logo }}" style="width: 200px; height: 200px">
  
   <form action="{{route('pdf')}}" method="post">
    @csrf
       
       <button type="submit">GET PDF</button>
   </form>

   
</body>
</html>