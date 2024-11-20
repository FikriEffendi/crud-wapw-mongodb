<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">

        <form method="POST" action="{{route('dashboard.update',['id'=>$dashboard->id])}}">
            @method("PATCH")
            @csrf
            <div class="mt-4">
                <label class="block text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" value="{{$dashboard->nama}}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mt-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{$dashboard->email}}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mt-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" value="{{$dashboard->password}}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mt-4">
                <label class="block text-gray-700">Role</label>
                <input type="text" name="role" value="{{$dashboard->role}}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <!-- Buttons -->
            <div class="flex justify-end mt-6">
                <a type="button" class="px-4 py-2 mr-2 text-gray-700 border rounded hover:bg-gray-100 focus:outline-none" href="{{route('dashboard.index')}}">Back</a>
                <button type="submit" class="px-4 py-2 text-white bg-gray-600 rounded hover:bg-gray-700 focus:outline-none">Edit</button>
            </div>
        </form>
    </div>

</body>

</html>