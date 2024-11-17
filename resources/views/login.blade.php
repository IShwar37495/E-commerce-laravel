<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif


    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

 
    <form action="{{ route('submit') }}" method="post" id="form">
        @csrf
        <input type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" id="name">
        <br><br>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <br><br>
        <input type="password" name="password">
        <br><br>
        <button type="submit" id="submitButton">Submit</button>
    </form>



    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let form = document.getElementById('form');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); 

            let userName = document.getElementById('name').value;

            if (!userName) {
                alert('Please fill in the name');
            } else {
                form.submit();
               
            }


        });
    });
</script>
</body>
</html>
