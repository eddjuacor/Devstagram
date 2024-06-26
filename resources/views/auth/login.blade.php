@extends('layouts.app')

@section('titulo')
    Inicia Sesion en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 ">
        <div class="md:w-4/12">
            <img src="{{ asset('img/register.png')}}" alt="Imagen de inicio de sesion">

            <div class="md:flex md:justify-center text-4xl text-sky-700 mt-6">
                <p>Compartimos tus mismos pensamientos!</p>
            </div>

        </div>

        <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-xl">
             <form method="post" action="
             {{route('login')}}" novalidate>
                @csrf
               
                @if(session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session ('mensaje')}}</p>

                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 fotn-bold"></label>
                        Email
                    </label>
                    <input type="email"
                            id="email"
                            name="email"
                            placeholder="Tu Correo Electronico"
                            class="border p-3 w-full rounded-lg @error('email')
                                border-red-500
                            @enderror"
                            value="{{old('email')}}"      
                    >

                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 fotn-bold"></label>
                        Password
                    </label>
                    <input type="password"
                            id="password"
                            name="password"
                            placeholder="Password de registro"
                            class="border p-3 w-full rounded-lg @error('password')
                                border-red-500
                            @enderror"
                              
                    >

                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                     @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> 
                    <label class="text-sm font-bold">Recordar Sesion</label>
                    
                </div>

                <input type="submit"
                       value="Inisia Sesion"
                       class="bg-sky-600 hover:bg-sky-700 tramsotopm-colors cursor-pointer 
                       uppercase font-bold w-full p-3 text-white rounded-lg"         
                >
             </form>   
        </div>
    </div>
@endsection
