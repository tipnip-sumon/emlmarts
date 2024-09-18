<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <x-msg type="danger" id="hello">
            {{-- <x-slot name="title">Well done!</x-slot> --}}
            <x-slot:title class="font-bold">Well done!</x-slot:title>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.
                {{ $component->link('Refferal Link','http://127.0.0.1:8000/index') }}
            </p>
       </x-msg>
       {{-- @php
           $componentName = "alert";
       @endphp
       <x-dynamic-component :component="$componentName" type="danger"/> --}}
        <x-form action="/somepage" method="PUT" id="formData">
           <input type="text" name="name">
           <button type="submit" class="btn btn-primary">Submit</button>
        </x-form>
    </div>
</body>
</html>