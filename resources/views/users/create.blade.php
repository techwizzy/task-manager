@extends('adminlte::page')

  @section('content')
   
   <x-adminlte-card title="Add  User" >
    <form method="POST" action="{{ route('users.store') }}">
    @csrf
    @method('POST')
    
     <div class="row">
	    <x-adminlte-input name="name" label="Name" value="{{ old('name') }}"
	        fgroup-class="col-md-12">
	        <x-slot name="prependSlot">
	        <div class="input-group-text">
	            <i class="fas fa-user text-lightblue"></i>
	        </div>
	    </x-slot>
       </x-adminlte-input>
	</div>
    
     <div class="row">
	    <x-adminlte-input name="email" label="Email" value="{{ old('email') }}"
	        fgroup-class="col-md-12">
	     <x-slot name="prependSlot">
	        <div class="input-group-text">
	            <i class="fas fa-envelope text-lightblue"></i>
	        </div>
	    </x-slot>
    </x-adminlte-input>
  </div>

   <div class="form-group">
          <x-adminlte-input type="password" name="password" label="Password"   placeholder="Password"/>
   </div>
    <div class="form-group">
             <x-adminlte-input type="password" name="confirm_password"  label="Confirm Password" class="form-control"   placeholder="Confirm Password" />
   </div>
    <div class="row">
    	<x-adminlte-button class="btn-flat" type="submit" label="Add User" theme="success" />
	</div>
   </form>
   </x-adminlte-card>


  @stop