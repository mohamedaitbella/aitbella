@extends('cosmed::layouts.master')

@section('title', 'Cosmed – Contact')
@section('description',
    'Pour nous contacter : Cosmed, Route Jilabal N°88, Rabat, Maroc Tél : 035 9767 909, Fax : 11 11
    11 11 11')

@section('content')

    
        @if (session('message_remercions'))
        
            <div class="grid h-screen place-items-center">
                <h1 class="text-4xl font-bold	">
                    {{ session("message_remercions")}}
                </h1> 
            </div>
        @else
            <h1 class="text-4xl font-bold mt-5">Contact</h1>
            <p class="text-base font-light leading-relaxed mt-0 mb-8  mt-12  ">
                {{ __('Vous souhaitez nous contacter ? nous vous remercions de remplir le formulaire suivant') }}</p>
            <div class="flex flex-wrap w-full">
                <form class="w-full" method="POST" action="{{ route('contacts.store') }}">
                    @csrf
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 items-center">
                        <!-- Grid Container -->
                        <div class="flex items-center col-span-4">
                            <!-- Grid cell -->
                            <span class="font-bold mb-1 md:mb-0 mr-2 whitespace-nowrap">Informations personnelles</span>
                        </div>
                        <div class="flex items-center">
                            <!-- Grid cell -->
                            <label class="text-gray-500 font-bold mb-1 md:mb-0 mr-2 whitespace-nowrap" for="civilite">Civilité :
                                *</label>
                        </div>
                        <div class="flex items-center col-span-3">
                            <select class="border-2 border-gray-200 w-full" name="civilite"  id="civilite">
                                <option disabled  @selected(old('civilite') == null) value>Choisir</option>
                                <option  @selected(old('civilite') == 'Monsieur') value="Monsieur">Monsieur</option>
                                <option  @selected(old('civilite') == 'Madame') value="Madame">Madame</option>
                                <option  @selected(old('civilite') == 'Mademoiselle')value="Mademoiselle">Mademoiselle</option>
                            </select>

                        </div>
                        <x-cosmed::contact.error :messages="$errors->get('civilite')" class="mt-2" />
                        {{-- prenom --}}
                        <x-cosmed::contact.label for="prenom" :value="__('Prénom : *')"   />
                        <x-cosmed::contact.input id="prenom" 
                                        type="text"
                                        name="prenom"
                                        />

                        <x-cosmed::contact.error :messages="$errors->get('prenom')" class="mt-2" />
                        
                        <x-cosmed::contact.label for="prenom" :value="__('Nom : *')"  />
                        <x-cosmed::contact.input id="nom" 
                                        type="text"
                                        name="nom"
                                        />

                        <x-cosmed::contact.error :messages="$errors->get('nom')" class="mt-2" />
                        
                        {{-- email --}}
                        <x-cosmed::contact.label for="email" :value="__('Email : *')"  />
                        <x-cosmed::contact.input id="email" 
                                        type="text"
                                        name="email"
                                        />

                        <x-cosmed::contact.error :messages="$errors->get('email')" class="mt-2" />
                        
                    {{-- date_naissance --}}
                    <x-cosmed::contact.label for="date_naissance" :value="__('Date de naissance :')"  />
                        <x-cosmed::contact.input id="date_naissance" 
                                        type="date"
                                        placeholder="dd-mm-yyyy"
                                        name="date_naissance" 
                                        min="1900-01-01"  />

                        <x-cosmed::contact.error :messages="$errors->get('date_naissance')" class="mt-2" />
                        {{-- telephone --}}
                        <x-cosmed::contact.label for="telephone" :value="__('Téléphone :')"  />
                        <x-cosmed::contact.input id="telephone" 
                                        type="text"
                                        name="telephone"  />

                        <x-cosmed::contact.error :messages="$errors->get('telephone')" class="mt-2" />
                        {{-- adresse --}}
                        <x-cosmed::contact.label for="adresse" :value="__('Adresse :')" class=""  />
                        <x-cosmed::contact.textarea maxlength="150" id="adresse" name="adresse" rows="4"  />

                        <x-cosmed::contact.error :messages="$errors->get('adresse')" class="mt-2" />
                        {{--  code_postal --}}
                        <x-cosmed::contact.label for="code_postal" :value="__('Code postal :')"  />
                        <x-cosmed::contact.input id="code_postal" 
                                        type="text"
                                        name="code_postal"  />

                        <x-cosmed::contact.error :messages="$errors->get('code_postal')" class="mt-2" />
                        {{-- ville --}}
                        <x-cosmed::contact.label for="ville" :value="__('Ville :')"  />
                        <x-cosmed::contact.input id="ville" 
                                        type="text"
                                        name="ville"  />

                        <x-cosmed::contact.error :messages="$errors->get('code_postal')" class="mt-2" />
                        {{-- pays --}}
                        <x-cosmed::contact.label for="pays" :value="__('Pays :')"  />
                        <div class="flex items-center col-span-3">
                            <!-- Grid cell -->
                            <select class="border-2 border-gray-200 w-full" name="pays" id="pays">
                                <option disabled   @selected( old('pays') ==null  ) >Choisir</option>
                                @foreach ($pays as $value=>$label)
                                    <option  @selected(old('pays') == $value)   value="{{$value}}">{{$label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-cosmed::contact.error :messages="$errors->get('pays')" class="mt-2" />
                        {{-- societe --}}
                        <x-cosmed::contact.label for="societe" :value="__('Société :')"  />
                        <x-cosmed::contact.input id="societe" 
                                        type="text"
                                        name="societe"  />
                        <x-cosmed::contact.error :messages="$errors->get('societe')" class="mt-2" />
                        <div class="flex items-center col-span-4">
                            <span class=" font-bold mb-1 md:mb-0 mr-2 whitespace-nowrap">Message</span>
                        </div>

                    {{-- destinataire --}}
                        <x-cosmed::contact.label for="destinataire" :value="__('Destinataire : *')"  />
                        <div class="flex items-center col-span-3">
                            <!-- Grid cell -->
                            <select class="border-2 border-gray-200 w-full" name="destinataire"  id="destinataire">
                                <option disabled   @selected( old('destinataire') ==null  ) >Choisir</option>
                                @foreach ($destinataire as $value=>$label)
                                <option  @selected(old('destinataire') == $value)   value="{{$value}}">{{$label}}</option>
                                @endforeach
                                

                                {{-- <option  {{ old('category_id') == 1 ? 'selected' : '' }} value="destinataire">destinataire</option> --}}
                                
                            </select>
                        </div>
                        <x-cosmed::contact.error :messages="$errors->get('destinataire')" class="mt-2" />
                        {{-- message --}}
                        <x-cosmed::contact.label for="message" :value="__('Message : *')" class=""  />
                        <x-cosmed::contact.textarea maxlength="500"  id="message" name="message" rows="4"   />

                        <x-cosmed::contact.error :messages="$errors->get('message')" class="mt-2" />
                    
                        <div class="flex items-start  col-span-4">
                            <div class="flex items-center h-5">
                                <input
                                    class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-200 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                    id="newsletter" name="newsletter" type="checkbox" value="1">
                            </div>
                            <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-800" for="newsletter">Je souhaite
                                recevoir la newsletter
                            </label>
                        </div>
                        @error('newsletter')
                            <div class="flex items-center col-span-4">
                                <span class="font-normal  text-red-500 text-md mt-1 ml-1  w-full  ">
                                    {{ $message }}
                                    <span>
                            </div>
                        @enderror

                        <button type="submit"
                            class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Envoyer</button>
                        <div class="flex items-center col-span-4">
                            <!-- Grid cell -->
                            <label class=" mb-1 mt-12 mt-0 md:mb-0 mr-2 whitespace-nowrap">* Champs obligatoires</label>
                        </div>
                    </div>
                </form>

            </div>
        @endif

@endsection
