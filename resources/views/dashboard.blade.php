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
                    <h1>Lista de Coisas</h1>
                    @foreach (Auth::user()->myTasks as $task)

                    <div class="flex justify-between border-b mb-2 gap-4
                    hover:bg-gray-300 "
                    x-data="{showDelete : false , showEdit : false}">
                            <div class="flex justify-between flex-grow">
                                <div>{{ $task->description }}</div>
                                <div>{{ $task->expiration }}</div>
                            </div>

                            <div class="flex gap-2 " >
                                <div>
                                    <span class=" cursor-pointer px-2 bg-red-500 text-white" @click="showDelete = true "> Apagar </span>
                                </div>
                                <div>
                                    <span class=" cursor-pointer px-2 bg-blue-500 text-white" @click=" showEdit = true ">Editar</span>
                                </div>
                            </div>
                            
                            <template x-if="showEdit">
                                <div class="absolute top-0 bottom-0 left-0 rigth-0 bg-gray-800 bg-opacity-20 z-0">
                                    <div class="w-96 bg-white p-4 absolute left-1/4 rigth-1/4 top-1/4 botton-1/4 z-10">
                                        <h2 class="text-xl font-bold text-center"> {{$task->description}} </h2>
                                                <form class="my-4" action="{{ route('task.update', $task) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-text-input name="description" placeholder="Descrição" value="{{$task->description}}"/>
                                                    <x-text-input name="expiration" placeholder="Prazo" value="{{$task->expiration}}"/>
                                                    <x-primary-button class="w-full text-center mt-2"> Salvar </x-primary-button>
                                                </form>
                                            <x-danger-button @click=" showEdit = false " class="w-full bg-gray bg-opacity-50">Cancel</x-danger-botton>
                                        
                                    </div>
                                </div>
                            </template>

                            <template x-if="showDelete">
                                <div class="absolute top-0 bottom-0 left-0 rigth-0 bg-gray-800 bg-opacity-20 z-0">
                                    <div class="w-96 bg-white p-4 absolute left-1/4 rigth-1/4 top-1/4 botton-1/4 z-10">
                                        <h2 class="text-xl font-bold text-center"> Are you sure? </h2>
                                        <div class="flex justify-between mt-4">
                                                <form action="{{ route('task.destroy', $task) }}" method="POST">
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

                        <form action="{{ route('task.store') }}" method="POST">
                        @csrf
                        <x-text-input name="description" placeholder="New Description"/>
                        <x-text-input name="expiration" placeholder="New Expiration"/>
                        <x-primary-button> Salvar </x-primary-button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
