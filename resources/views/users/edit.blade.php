@extends('adminlte::page')

  @section('content')
   
    <?php $id = $user['id']; ?>
   <x-adminlte-card title="Edit User" >
    <form method="POST" action="{{ route('users.update', $user['id']) }}">
    @csrf
    @method('PUT')
    
     <div class="row">
	    <x-adminlte-input name="name" label="Name" value="{{ $user['name'] }}"
	        fgroup-class="col-md-12">
	        <x-slot name="prependSlot">
	        <div class="input-group-text">
	            <i class="fas fa-user text-lightblue"></i>
	        </div>
	    </x-slot>
       </x-adminlte-input>
	</div>
    
     <div class="row">
	    <x-adminlte-input name="email" label="Email" value="{{ $user['email'] }}"
	        fgroup-class="col-md-12">
	     <x-slot name="prependSlot">
	        <div class="input-group-text">
	            <i class="fas fa-envelope text-lightblue"></i>
	        </div>
	    </x-slot>
    </x-adminlte-input>
  </div>

   <div class="form-group">
          <x-adminlte-input type="password" name="new_password" label="New Password"   placeholder="New Password"/>
   </div>
    <div class="form-group">
             <x-adminlte-input type="password" name="new_confirm_password"  label="Confirm New Password" class="form-control"   placeholder="Confirm Password" />
   </div>
    <div class="row">
    	<x-adminlte-button class="btn-flat" type="submit" label="Save changes" theme="success" />
	</div>
   </form>
   </x-adminlte-card>


  @stop