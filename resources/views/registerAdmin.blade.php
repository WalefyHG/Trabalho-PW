<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('/favIcon.ico') }}" />
    <title>Cadastro - Admin</title>
    @vite('resources/css/app.css')
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center md:h-screen bg-blue-40">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <form
                class="flex flex-col items-center justify-center w-9/12 h-4/5 p-12 gap-16 text-black bg-white rounded-2xl"
                method="POST" action="{{route('admin.cadastrar')}}">
                @csrf
                <div class="w-full flex justify-center items-center py-4 px-6 bg-gray-700 rounded">
                    <h2 class="text-2xl text-white font-semibold">Cadastro do Administrador</h2>
                </div>
                <div class="grid p-3 grid-cols-2 gap-5">
                    <div class="flex gap-2 items-center">
                        <label>Nome:</label>
                        <input
                            class=" w-full drop-shadow-lg bg-slate-700 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                            id="name" name="name" type="text">
                    </div>
                    <div class="flex gap-2 items-center">
                        <label>Email:</label>
                        <input
                            class=" w-full drop-shadow-lg bg-slate-700 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                            id="email" name="email" type="email">
                    </div>

                    <div class="flex col-span-2  gap-2 items-center">
                        <label>Senha:</label>
                        <input
                            class=" w-full drop-shadow-lg bg-slate-700 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                            id="password" name="password" type="password">
                    </div>

                    <div class="flex gap-2 items-center justify-center">
                        <input type="hidden"
                            class="drop-shadow-lg bg-slate-700 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                            id='role' name='role' required value='admin'>
                    </div>
                </div>

                <button type="submit"
                    class="bg-indigo-500 p-2 rounded-xl hover:bg-indigo-700 text-white">Cadastrar</button>
            </form>
        </div>
    </section>
</body>

</html>