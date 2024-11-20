<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex items-center justify-center max-w-full mt-5 mb-5">
        <div class="max-w-full text-xl font-semibold text-blue-900 font-poppins">Daftar Akun Guru dan Staff</div>
    </div>

    <div class="flex items-center justify-center max-w-2xl m-3 mx-auto">
        <a href="{{route('dashboard.create')}}" class="p-3 text-white bg-purple-500 border border-blue-300 rounded-xl font-poppins hover:bg-purple-700">Tambah Akun</a>
    </div>

    <div class="flex items-center justify-center max-w-full m-3 font-poppins">
        <table class="w-full border border-collapse border-gray-300 shadow-lg table-auto">
            <thead>
                <tr class="text-gray-700 bg-gray-200">
                    <th class="px-4 py-2 border border-gray-300">No</th>
                    <th class="px-4 py-2 border border-gray-300">Nama Lengkap</th>
                    <th class="px-4 py-2 border border-gray-300">Email</th>
                    <th class="px-4 py-2 border border-gray-300">Role</th>
                    <th class="px-4 py-2 border border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>

                @php
                $number=1;
                @endphp

                @foreach ($dashboards as $dashboard)

                <tr class="text-center odd:bg-white even:bg-gray-100">
                    <td class="px-4 py-2 border border-gray-300">{{$number++}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$dashboard->nama}}</td>
                    <td class="px-4 py-2 border border-gray-300">{{$dashboard->email}}</td>
                    <td class="px-4 py-2 text-center border border-gray-300">{{$dashboard->role}}</td>
                    <td class="">
                        <div class="flex items-center justify-center gap-4">
                            <form action="{{route('dashboard.destroy',['id'=>$dashboard->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="text-red-500 hover:underline">Hapus</button>
                            </form>

                            <a class="text-blue-500 hover:underline" href="{{route('dashboard.edit',['id'=>$dashboard->id])}}">Edit</a>
                        </div>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
    <div class="mb-20 "></div>
</body>

</html>