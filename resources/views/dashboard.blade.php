<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-gray-900 dark:text-gray-100">
                    <h1 class="font-red">Lista de Coisas</h1>
                    @foreach (Auth::user()->myJogos as $jogo)

                    <div class="flex justify-between border-b mb-2 gap-4
                    hover:bg-blue-300  "
                    x-data="{showDelete : false , showEdit : false}">

                            <div class="flex justify-between flex-grow gap-6">
                                <div>Titulo : {{ $jogo->titulo }}</div>
                                <div>Desenvolvedora :  {{ $jogo->desenvolvedora }}</div>
                                <div>Plataforma :{{ $jogo->plataforma }}</div>
                                <div>Ano de Lançamento :{{ $jogo->ano_lancamento }}</div>
                                <div>Gênero :{{ $jogo->genero }}</div>
                            </div>

                            <div class="flex gap-2 " >
                                <div>
                                    <span class=" cursor-pointer px-2 bg-gray-900 text-red" @click="showDelete = true "> Apagar </span>
                                </div>
                                <div>
                                    <span class=" cursor-pointer px-2 bg-gray-900 text-red" @click=" showEdit = true ">Editar</span>
                                </div>
                            </div>
                            
                            <template x-if="showEdit">
                                <div class="absolute top-0 bottom-0 left-0 rigth-0 bg-blue-800 bg-opacity-20 z-0">
                                    <div class="w-1500 bg-white p-4 absolute left-1/4 rigth-1/4 top-1/4 botton-1/4 z-10">
                                        <h2 class="text-xl font-bold text-center"> {{$jogo->titulo}} </h2>
                                                <form class="my-4" action="{{ route('jogo.update', $jogo) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-text-input name="titulo" placeholder="Título" value="{{$jogo->titulo}}"/>
                                                    <x-text-input name="desenvolvedora" placeholder="Desenvolvedora" value="{{$jogo->desenvolvedora}}"/>
                                                    <x-text-input name="plataforma" placeholder="Plataforma" value="{{$jogo->plataforma}}"/>
                                                    <x-text-input name="ano_lancamento" placeholder="Ano de Lançamento" value="{{$jogo->ano_lancamento}}"/>
                                                    <label for="genero">Gênero:</lavel>
                        <select class="bg-black" name="genero">
                        <option>Ação</option>
                        <option>Luta</option>
                        <option>Terror</option>

                        </select>
                                                    <x-primary-button class="w-full text-center mt-2"> Salvar </x-primary-button>
                                                </form>
                                            <x-danger-button @click=" showEdit = false " class="w-full bg-gray bg-opacity-50">Cancel</x-danger-botton>
                                        
                                    </div>
                                </div>
                            </template>

                            <template x-if="showDelete">
                                <div class="absolute top-0 bottom-0 left-0 rigth-0 bg-white-800 bg-opacity-20 z-0">
                                    <div class="w-96 bg-white p-4 absolute left-1/4 rigth-1/4 top-1/4 botton-1/4 z-10">
                                        <h2 class="text-xl  font-bold text-center">Tem certeza ? </h2>
                                        <div class="flex justify-between mt-4">
                                                <form action="{{ route('jogo.destroy', $jogo) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button> Delete anyway </x-danger-button>
                                                </form>
                                            <x-primary-button @click=" showDelete = false ">Cancel</x-primary-botton>
                                        </div>
                                        
                                    </div>
                                </div>
                            </template>
                            
                            </div>
                        





                        @endforeach

                        <form class="text-white"action="{{ route('jogo.store') }}" method="POST">
                        @csrf
                        <x-text-input name="titulo" placeholder="Título"/>
                        <x-text-input name="desenvolvedora" placeholder="Desenvolvedor"/>
                        <x-text-input name="plataforma" placeholder="Plataforma"/>
                        <x-text-input name="ano_lancamento" placeholder="Ano de Lançamento"/>
                        <label for="genero" class="">Gênero:</lavel>
                        <select class="bg-white-800 text-black" name="genero">
                        <option>Ação</option>
                        <option>Luta</option>
                        <option>Terror</option>

                        </select>
                        
                        
                        <x-primary-button> Salvar </x-primary-button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



