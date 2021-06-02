@extends('adminlte::page')

  @section('content')
   
    <?php $id = $user['id']; ?>
   
      <x-adminlte-profile-widget name="{{ $user->name }}" desc="{{ $user->email }}" theme="teal"
		    img="https://picsum.photos/id/1/100">
		     <x-adminlte-profile-col-item class="text-primary border-right" icon="fas fa-lg fa-folder"
		        title="Projects" text="25" size=6 badge="primary"/>
		     <x-adminlte-profile-col-item class="text-danger" icon="fas fa-lg fa-list" title="Tasks"
		        text="10" size=6 badge="danger"/>
	  </x-adminlte-profile-widget>
  


  @stop