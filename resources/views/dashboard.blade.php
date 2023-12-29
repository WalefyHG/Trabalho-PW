<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('/FavIcon.ico') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #4a5568;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-track {
            background-color: #cbd5e0;
        }

        .tabelinha::-webkit-scrollbar {
            width: 1px;
            height: 2px;
        }

        .tabelinha::-webkit-scrollbar-thumb {
            background-color: #4a5568;
        }
        .tabelinha::-webkit-scrollbar-track {
            background-color: #cbd5e0;
        }
    </style>
</head>
</head>

<body class='bg-gray-800 font-sans leading-normal overflow-hidden tracking-normal mt-12'>
    <header>
        <!--Nav-->
        <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

            <div class="flex flex-wrap justify-between items-center">
                <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                    <a class="w-32 cursor-pointer ml-2" onclick="{{route('dashboard')}}" aria-label="Home">
                        <img class="w-full" src="{{asset('/Logo55.png')}}" alt="">
                    </a>
                </div>



                <div class="flex w-full pt-2 content-center justify-end md:w-1/3 md:justify-end">
                    <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">

                        <li class="flex-1 md:flex-none md:mr-3">
                            <div class="relative inline-block">
                                <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2">
                                    @if($auth_user)
                                    <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, {{$auth_user->name}}
                                    <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg></button>
                                @endif
                                <div id="myDropdown"
                                    class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                    <a href="#"
                                        class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                            class="fa fa-user fa-fw"></i> Profile</a>
                                    <a href="#"
                                        class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                            class="fa fa-cog fa-fw"></i> Settings</a>
                                    <div class="border border-gray-800"></div>
                                    <a onclick="document.getElementById('logout-form').submit();"
                                        class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block cursor-pointer"><i
                                            class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>

                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout.admin') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </header>


    <main>

        <div class="flex flex-col md:flex-row">
            <nav aria-label="alternative nav">
                <div
                    class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-54 content-center">

                    <div
                        class="md:mt-12 md:w-56 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                        <ul
                            class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                            <li class="mr-3 flex-1">
                                <a onclick="toggleDashboardModal(); highlightMenuItem(this);"
                                    class=" cursor-pointer block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600 hover:bg-gray-900 menu-item">
                                    <i class="fas fa-home pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Home</span>
                                </a>
                            </li>

                            <li class="mr-3 flex-1">
                                <a onclick="toggleTaskModal(); highlightMenuItem(this);"
                                    class=" cursor-pointer block py-1 md:py-3 pl-1 align-middle text-white no-underline menu-item hover:text-white border-gray-800 hover:bg-gray-900">
                                    <i class="fas fa-user-plus pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Cadastrar
                                        Alunos</span>
                                </a>
                                
                            </li>
                            <li class="mr-3 flex-1">
                                <a onclick="toggleTeacherModal(); highlightMenuItem(this);"
                                    class=" cursor-pointer block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-gray-800 hover:bg-gray-900 menu-item">
                                    <i class="fas fa-chalkboard-teacher pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Cadastrar
                                        Professores</span>
                                </a>
                            </li>
                            
                            <li class="mr-3 flex-1">
                                <a onclick="toggleSalaModal(); highlightMenuItem(this);"
                                    class=" cursor-pointer block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-gray-800 hover:bg-gray-900 menu-item">
                                    <i class="fas fa-chalkboard pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Cadastrar
                                        Salas</span>
                                </a>
                            </li>

                            <li class="mr-3 flex-1">
                                <a onclick="toggleControlSalaModal(); highlightMenuItem(this);"
                                    class=" cursor-pointer block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-gray-800 hover:bg-gray-900 menu-item">
                                    <i class="fas fa-cogs pr-0 md:pr-3"></i><span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Gerenciar
                                        Salas</span>
                                </a>
                            </li>
                        </ul>
                    </div>


                </div>
            </nav>
            <div id="taskModal"
                class=" fixed top-0 left-28 w-full h-screen flex justify-center items-center close-modal modal bg-gray-800 invisible">
                <div class='bg-white w-4/5 h-4/5 rounded'>
                    <div class="flex justify-between items-center py-4 px-6 bg-gray-700">
                        <h2 class="text-lg text-white font-semibold">Cadastrar Alunos</h2>
                        <a onclick="toggleTaskModal()"
                            class="cursor-pointer text-lg text-white hover:text-gray-300 close-modal">&times;</a>
                    </div>
                    <div class="flex flex-col justify-center items-center p-4">
                        <form class="flex flex-col items-center gap-2 justify-center"
                            action="{{route('aluno.cadastro')}}" method="POST">
                            @csrf
                            <div class="grid p-3 grid-cols-3 gap-5">
                                <div class="flex gap-2 items-center">
                                    <label>Nome:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="name" name="name" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Email:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="email" name="email" type="email">
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>Senha:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="password" name="password" type="password">
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>CPF:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="cpf" name="cpf" type="text">
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>RG:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="rg" name="rg" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Telefone:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="telefone" name="telefone" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Endereço:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="endereco" name="endereco" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Cidade:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="cidade" name="cidade" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Estado:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="estado" name="estado" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>CEP:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="cep" name="cep" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Curso:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="curso" name="curso" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Instituição:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="instituicao" name="instituicao" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Periodo:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="periodo" name="periodo" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label for="turno">Turno:</label>
                                    <select
                                        class="w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="turno" name="turno">
                                        <option value="Manha">Manhã</option>
                                        <option value="Tarde">Tarde</option>
                                        <option value="Noite">Noite</option>
                                    </select>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Matricula:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="matricula" name="matricula" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label for="situacao">Situação:</label>
                                    <select
                                        class="w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="situacao" name="situacao">
                                        <option value="Matriculado">Matriculado</option>
                                        <option value="Trancado">Trancado</option>
                                        <option value="Concluido">Concluído</option>
                                        <option value="Expulso">Expulso</option>
                                    </select>
                                </div>

                                <div class="flex gap-2 col-span-2 items-center justify-center">
                                    <input type="hidden"
                                        class="drop-shadow-lg bg-slate-700 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id='role' name='role' required value='aluno'>
                                </div>
                            </div>

                            <button type="submit"
                                class=" w-2/12 bg-indigo-500 p-2 rounded-xl hover:bg-indigo-700 text-white">Cadastrar</button>


                        </form>
                    </div>
                </div>
            </div>

            <div id="salaModal"
                class="fixed top-0 left-28 w-full h-screen flex justify-center items-center close-modal modal bg-gray-800 invisible">
                <div class='bg-white w-4/5 h-4/5 rounded'>
                    <div class="flex justify-between items-center py-4 px-6 bg-gray-700">
                        <h2 class="text-lg text-white font-semibold">Cadastrar Salas</h2>
                        <a onclick="toggleSalaModal()"
                            class="cursor-pointer text-lg text-white hover:text-gray-300 close-modal">&times;</a>
                    </div>
                    <div class="flex flex-col justify-center items-center p-4">
                        <form class="flex flex-col items-center gap-2 justify-center"
                            action="{{route('salas.cadastro')}}" method="POST">
                            @csrf
                            <div class="grid p-3 grid-cols-3 gap-5">
                                <div class="flex gap-2 items-center">
                                    <label>Nome:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="nome" name="nome" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Capacidade:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="capacidade" name="capacidade" type="text">
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>Descrição:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="descricao" name="descricao" type="text">
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>Tipo de Salas:</label>
                                    <select
                                        class="w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        name="tipo" id="tipo">
                                        <option value="Sala de Aula">Sala de Aula</option>
                                        <option value="Laboratorio">Laboratorio</option>
                                    </select>
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>Data:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="data" name="data" type="date">
                                </div>
                            </div>

                            <button type="submit"
                                class=" w-2/12 bg-indigo-500 p-2 rounded-xl hover:bg-indigo-700 text-white">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>


            <div id="teacherModal"
                class="fixed top-0 left-28 w-full h-screen flex justify-center items-center close-modal modal bg-gray-800 invisible">
                <div class='bg-white w-4/5 h-4/5 rounded'>
                    <div class="flex justify-between items-center py-4 px-6 bg-gray-700">
                        <h2 class="text-lg text-white font-semibold">Cadastrar Professores</h2>
                        <a onclick="toggleTeacherModal()"
                            class="cursor-pointer text-lg text-white hover:text-gray-300 close-modal">&times;</a>
                    </div>
                    <div class="flex flex-col justify-center items-center p-4">
                        <form class="flex flex-col items-center gap-2 justify-center"
                            action="{{route('professores.cadastro')}}" method="POST">
                            @csrf
                            <div class="grid p-3 grid-cols-3 gap-5">
                                <div class="flex gap-2 items-center">
                                    <label>Nome:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="name" name="name" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Email:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="email" name="email" type="email">
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>Senha:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="password" name="password" type="password">
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>CPF:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="cpf" name="cpf" type="text">
                                </div>

                                <div class="flex gap-2 items-center">
                                    <label>RG:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="rg" name="rg" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Telefone:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="telefone" name="telefone" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Endereço:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="endereco" name="endereco" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Cidade:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="cidade" name="cidade" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Estado:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="estado" name="estado" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>CEP:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="cep" name="cep" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label for="formacao">Formação:</label>
                                    <select
                                        class="w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        name="formacao" id="formacao">
                                        <option value="Graduação">Graduação</option>
                                        <option value="Especialização">Especialização</option>
                                        <option value="Mestrado">Mestrado</option>
                                        <option value="Doutorado">Doutorado</option>
                                    </select>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Materia:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="materia" name="materia" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label>Instituição:</label>
                                    <input
                                        class=" w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="instituicao" name="instituicao" type="text">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <label for="situacao">Situação:</label>
                                    <select
                                        class="w-full drop-shadow-lg bg-blue-900 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id="situacao" name="situacao">
                                        <option value="Matriculado">Matriculado</option>
                                        <option value="Trancado">Trancado</option>
                                        <option value="Concluido">Concluído</option>
                                        <option value="Expulso">Expulso</option>
                                    </select>
                                </div>

                                <div class="flex gap-2 col-span-2 items-center justify-center">
                                    <input type="hidden"
                                        class="drop-shadow-lg bg-slate-700 outline-none border-none rounded-xl p-1 pl-3 ml-1 text-white"
                                        id='role' name='role' required value='professor'>
                                </div>
                            </div>

                            <button type="submit"
                                class=" w-2/12 bg-indigo-500 p-2 rounded-xl hover:bg-indigo-700 text-white">Cadastrar</button>


                        </form>
                    </div>
                </div>
            </div>


            <div id="dashboardModal"
                class=" fixed top-0 left-28 w-full h-screen flex justify-center items-center close-modal modal bg-gray-800">
                <div class='flex flex-col gap-1 bg-white w-4/5 h-4/5 overflow-y-auto rounded'>
                    <div class="flex justify-between items-center py-4 px-6 bg-gray-700">
                        <h2 class="text-lg text-white font-semibold">Dashboard</h2>
                        <a onclick="toggleDashboardModal()"
                            class="cursor-pointer text-lg text-white hover:text-gray-300 close-modal">&times;</a>
                    </div>
                    <h1 class="text-2xl ml-2 font-extrabold text-gray-800 dark:text-white mb-8">Lista de Alunos: </h1>

                    <div class="tabelinha flex overflow-y-auto max-h-screen shadow-md sm:rounded-lg">
                        <x-aluno-table :alunos="$alunos" />
                    </div>
                    <h1 class="text-2xl ml-2 mt-1 font-extrabold text-gray-800 dark:text-white mb-8">Lista de
                        Professores: </h1>
                    <div class="tabelinha flex overflow-y-auto max-h-screen shadow-md sm:rounded-lg">
                        <x-professor-table :professores="$professores" />
                    </div>
                </div>
            </div>

            <div id="controlsalaModal"
                class=" fixed top-0 left-28 w-full h-screen flex justify-center items-center close-modal modal bg-gray-800 invisible">
                <div class='flex flex-col gap-1 bg-white w-4/5 overflow-y-auto overflow-x-auto  h-4/5 rounded'>
                    <div class="flex justify-between items-center py-4 px-6 bg-gray-700">
                        <h2 class="text-lg text-white font-semibold">Controle de Sala</h2>
                        <a onclick="toggleControlSalaModal()"
                            class="cursor-pointer text-lg text-white hover:text-gray-300 close-modal">&times;</a>
                    </div>
                    <h1 class="text-2xl ml-2 mt-2 font-extrabold text-gray-800 dark:text-white mb-8">Lista de Sala:
                    </h1>

                    <div class="tabelinha flex overflow-y-auto max-h-screen shadow-md sm:rounded-lg">
                        <x-sala-table :salas="$salas" />
                    </div>

                    <h1 class="text-2xl ml-2 mt-2 font-extrabold text-gray-800 dark:text-white mb-8">Alugar Salas: </h1>
                    <div class="flex items-center justify-center">
                        @php $algumaSalaDisponivelParaAlugar = false; @endphp
                        @foreach($salas as $sala)
                        @if($sala->situacao === 'Livre')
                        @php $algumaSalaDisponivelParaAlugar = true; @endphp
                        @endif
                        @endforeach

                        @if($algumaSalaDisponivelParaAlugar)
                        <form action="{{route('salas.alugar')}}" method="POST"
                            class="flex items-center gap-8 justify-center">
                            @csrf
                            <label for="sala_id">Selecione uma Sala:</label>
                            <select name="sala_id" id="sala_id_alugar_{{ $sala->id }}">
                                @foreach($salas as $sala)
                                @if($sala->situacao === 'Livre')
                                <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
                                @endif
                                @endforeach
                            </select>

                            <label for="sala_id">Selecione um(a) Professor(a):</label>
                            <select name="professor_id" id="professor_id_alugar_{{ $sala->id }}">
                                @foreach($professores as $professor)
                                <option value="{{$professor->id}}">{{$professor->user->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit"
                                class="w-2/12 bg-indigo-500 p-2 rounded-xl hover:bg-indigo-700 text-white">Alugar</button>
                        </form>

                        @else
                        <h1 class="text-xl ml-2 mt-2 font-extrabold text-gray-800 dark:text-white mb-8">Não existe sala
                            para alugar</h1>
                        @endif
                    </div>
                    <h1 class="text-2xl ml-2 mt-2 font-extrabold text-gray-800 dark:text-white mb-8">Desalugar Salas:
                    </h1>
                    <div class="flex items-center mb-2 justify-center">
                        @php $algumaSalaAlugada = false; @endphp
                        @foreach($salas as $sala)
                        @if($sala->situacao === 'Alugada')
                        @php $algumaSalaAlugada = true; @endphp
                        @endif
                        @endforeach

                        @if($algumaSalaAlugada)
                        <form action="{{route('salas.desalugar')}}" method="POST"
                            class="flex items-center gap-8 justify-center">
                            @csrf
                            <label for="sala_id">Selecione uma Sala:</label>
                            <select name="sala_id" id="sala_id_desalugar_{{ $sala->id }}">
                                @foreach($salas as $sala)
                                @if($sala->situacao === 'Alugada')
                                <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
                                @endif
                                @endforeach
                            </select>
                            <button type="submit"
                                class="w-5/12 bg-indigo-500 p-2 rounded-xl hover:bg-indigo-700 text-white">Retirar</button>
                        </form>
                        @else
                        <h1 class="text-xl ml-2 mt-2 font-extrabold text-gray-800 dark:text-white mb-8">Todas as Salas
                            Disponíveis</h1>
                        @endif
                    </div>
                </div>
            </div>

            @if(Session::has('success'))
            <div id="alert" class="w-2/12 z-20 fixed top-2 right-0 bg-green-500 text-white p-4 text-center hidden">
                {{ Session::get('success') }}
            </div>
            @endif


            @foreach($professores as $professor)
            <div class="fixed inset-0 overflow-y-auto hidden" id="editarProfessorModal{{ $professor->id }}">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-md">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <a onclick="closeModal('editarProfessorModal{{ $professor->id }}')"
                                class="absolute top-0 right-0 m-4 cursor-pointer text-lg text-gray-500 hover:text-gray-700 close-modal">&times;</a>
                            <form method="post" action="{{ route('professores.atualizar', $professor->id) }}">
                                @csrf
                                @method('put')

                                <div class="mb-4">
                                    <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" name="name" value="{{ $professor->user->name ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                    <input type="email"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="email" name="email" value="{{ $professor->user->email ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="cpf" class="block text-gray-700 text-sm font-bold mb-2">CPF:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="cpf" name="cpf" value="{{ $professor->cpf ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="rg" class="block text-gray-700 text-sm font-bold mb-2">RG:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="rg" name="rg" value="{{ $professor->rg ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="telefone"
                                        class="block text-gray-700 text-sm font-bold mb-2">Telefone:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="telefone" name="telefone" value="{{ $professor->telefone ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="endereco"
                                        class="block text-gray-700 text-sm font-bold mb-2">Endereço:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="endereco" name="endereco" value="{{ $professor->endereco ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="cidade"
                                        class="block text-gray-700 text-sm font-bold mb-2">Cidade:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="cidade" name="cidade" value="{{ $professor->cidade ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="estado"
                                        class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="estado" name="estado" value="{{ $professor->estado ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="cep" class="block text-gray-700 text-sm font-bold mb-2">CEP:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="cep" name="cep" value="{{ $professor->cep ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="formacao"
                                        class="block text-gray-700 text-sm font-bold mb-2">Formação:</label>
                                    <select name="formacao" id="formacao">
                                        <option value="Graduação" @if($professor->formacao === 'Graduação')
                                            selected @endif>Graduação</option>
                                        <option value="Especialização" @if($professor->formacao ===
                                            'Especialização') selected @endif>Especialização</option>
                                        <option value="Mestrado" @if($professor->formacao === 'Mestrado')
                                            selected @endif>Mestrado</option>
                                        <option value="Doutorado" @if($professor->formacao === 'Doutorado')
                                            selected @endif>Doutorado</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="materia"
                                        class="block text-gray-700 text-sm font-bold mb-2">Materia:</label>
                                    <input type="text" id="materia" name="materia"
                                        value="{{ $professor->materia ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="instituicao"
                                        class="block text-gray-700 text-sm font-bold mb-2">Instituição:</label>
                                    <input type="text" id="instituicao" name="instituicao"
                                        value="{{ $professor->instituicao ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="situacao"
                                        class="block text-gray-700 text-sm font-bold mb-2">Situação:</label>
                                    <select name="situacao" id="situacao">
                                        <option value="Matriculado" @if($professor->situacao === 'Matriculado')
                                            selected @endif>Matriculado</option>
                                        <option value="Trancado" @if($professor->situacao === 'Trancado')
                                            selected @endif>Trancado</option>
                                        <option value="Concluido" @if($professor->situacao === 'Concluido')
                                            selected @endif>Concluído</option>
                                        <option value="Expulso" @if($professor->situacao === 'Expulso')
                                            selected @endif>Expulso</option>
                                    </select>
                                </div>
                                

                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Salvar
                                    Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($alunos as $aluno)

            <div class="fixed inset-0 overflow-y-auto hidden" id="editarAlunoModal{{ $aluno->id }}">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-md">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <a onclick="closeModal('editarAlunoModal{{ $aluno->id }}')"
                                class="absolute top-0 right-0 m-4 cursor-pointer text-lg text-gray-500 hover:text-gray-700 close-modal">&times;</a>
                            <form method="post" action="{{ route('aluno.atualizar', $aluno->id) }}">
                                @csrf
                                @method('put')
                                <div class="mb-4">
                                    <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" name="name" value="{{ $aluno->user->name ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                    <input type="email"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="email" name="email" value="{{ $aluno->user->email ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="cpf" class="block text-gray-700 text-sm font-bold mb-2">CPF:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="cpf" name="cpf" value="{{ $aluno->cpf ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="rg" class="block text-gray-700 text-sm font-bold mb-2">RG:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        name="rg" value="{{ $aluno->rg ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="telefone"
                                        class="block text-gray-700 text-sm font-bold mb-2">Telefone:</label>
                                    <input type="text" id="telefone" name="telefone"
                                        value="{{ $aluno->telefone ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="endereco"
                                        class="block text-gray-700 text-sm font-bold mb-2">Endereço:</label>
                                    <input type="text" id="endereco" name="endereco"
                                        value="{{ $aluno->endereco ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="cidade"
                                        class="block text-gray-700 text-sm font-bold mb-2">Cidade:</label>
                                    <input type="text" id="cidade" name="cidade" value="{{ $aluno->cidade ?? 'N/A' }}">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="estado"
                                        class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                                    <input type="text" id="estado" name="estado" value="{{ $aluno->estado ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="cep" class="block text-gray-700 text-sm font-bold mb-2">CEP:</label>
                                    <input type="text" id="cep" name="cep" value="{{ $aluno->cep ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="curso"
                                        class="block text-gray-700 text-sm font-bold mb-2">Curso:</label>
                                    <input type="text" id="curso" name="curso" value="{{ $aluno->curso ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="instituicao"
                                        class="block text-gray-700 text-sm font-bold mb-2">Instituição:</label>
                                    <input type="text" id="instituicao" name="instituicao"
                                        value="{{ $aluno->instituicao ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="periodo"
                                        class="block text-gray-700 text-sm font-bold mb-2">Periodo:</label>
                                    <input type="text" id="periodo" name="periodo"
                                        value="{{ $aluno->periodo ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="turno"
                                        class="block text-gray-700 text-sm font-bold mb-2">Turno:</label>
                                    <select name="turno" id="turno">
                                        <option value="Manha" @if($aluno->turno === 'Manha') selected @endif>Manhã
                                        </option>
                                        <option value="Tarde" @if($aluno->turno === 'Tarde') selected @endif>Tarde
                                        </option>
                                        <option value="Noite" @if($aluno->turno === 'Noite') selected @endif>Noite
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="matricula"
                                        class="block text-gray-700 text-sm font-bold mb-2">Matricula:</label>
                                    <input type="text" id="matricula" name="matricula"
                                        value="{{ $aluno->matricula ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="situacao"
                                        class="block text-gray-700 text-sm font-bold mb-2">Situação:</label>
                                    <select name="situacao" id="situacao">
                                        <option value="Matriculado" @if($aluno->situacao === 'Matriculado')
                                            selected @endif>Matriculado</option>
                                        <option value="Trancado" @if($aluno->situacao === 'Trancado')
                                            selected @endif>Trancado</option>
                                        <option value="Concluido" @if($aluno->situacao === 'Concluido')
                                            selected @endif>Concluído</option>
                                        <option value="Expulso" @if($aluno->situacao === 'Expulso')
                                            selected @endif>Expulso</option>
                                    </select>
                                </div>
                                

                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Salvar
                                    Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            @foreach($salas as $sala)

            <div class="fixed inset-0 overflow-y-auto hidden" id="editarSalaModal{{ $sala->id }}">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-md">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <a onclick="closeModal('editarSalaModal{{ $sala->id }}')"
                                class="absolute top-0 right-0 m-4 cursor-pointer text-lg text-gray-500 hover:text-gray-700 close-modal">&times;</a>
                            <form method="post" action="{{ route('sala.atualizar', $sala->id) }}">
                                @csrf
                                @method('put')
                                <div class="mb-4">
                                    <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                                    <input type="text"
                                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        id="nome" name="nome" value="{{ $sala->nome ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="capacidade"
                                        class="block text-gray-700 text-sm font-bold mb-2">Capacidade:</label>
                                    <input type="text" id="capacidade" name="capacidade" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        value="{{ $sala->capacidade ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="descricao"
                                        class="block text-gray-700 text-sm font-bold mb-2">Descrição:</label>
                                    <input type="text" id="descricao" name="descricao" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                        value="{{ $sala->descricao ?? 'N/A' }}">
                                </div>

                                <div class="mb-4">
                                    <label for="tipo"
                                        class="block text-gray-700 text-sm font-bold mb-2">Tipo:</label>
                                    <select name="tipo" id="tipo">
                                        <option value="Sala de Aula" @if($sala->tipo === 'Sala de Aula') selected
                                            @endif>Sala de Aula</option>
                                        <option value="Laboratorio" @if($sala->tipo === 'Laboratorio') selected
                                            @endif>Laboratorio</option>
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="data"
                                        class="block text-gray-700 text-sm font-bold mb-2">Data:</label>
                                    <input type="date" id="data" name="data"
                                        value="{{ $sala->data ?? 'N/A' }}">
                                </div>

                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Salvar
                                    Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
    </main>
    <script src="{{asset('js/dashboard.js')}}"></script>

</body>

</html>