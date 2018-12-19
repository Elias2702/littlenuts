@extends('layouts.app')

@section('content')
<div class="container">
                        
    <form action="/member" method="post" class="form-horizontal">
        
        <fieldset>
            <!-- Nom du formulaire -->
            <legend>Edit profiles</legend>

            <!-- Selection d'un utilisateur -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Choose profile</label>
                <div class="col-md-4">
                    <select id="selectbasic" name="selectbasic" class="form-control">
                        <option value="1">Principal user</option>
                        <option value="2">Guest 1</option>
                        <option value="3">Guest 2</option>
                    </select>
                </div>
            </div>

            <!-- Changer le nom d'utilisateur-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Username</label>  
                <div class="col-md-4">
                    <input id="textinput" name="textinput" type="text" placeholder="Nom récupéré" class="form-control input-md">
                    <span class="help-block">Change your username</span>  
                </div>
            </div>

            <!-- Changer le mot de passe-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="" class="form-control input-md">
                    <span class="help-block">Change your password</span>
                </div>
            </div>
            <!-- Ajouter le password_confirm et la demande de l'ancien password -->

            <!-- Choix restrictions âges -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectage">Restrictions</label>
                <div class="col-md-4">
                    <select id="selectage" name="selectage" class="form-control">
                        <option value="1">All</option>
                        <option value="2">Kids and teenagers</option>
                    </select>
                </div>
            </div>

            <!-- Ajout photo --> 
            <div class="form-group">
                <label class="col-md-4 control-label" for="photo">Upload your profile's picture</label>
                <div class="col-md-4">
                    <input id="photo" name="photo" class="input-file" type="file">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="submitphoto"></label>
                <div class="col-md-4">
                    <button id="submitphoto" name="submitphoto" class="btn btn-success">Submit</button>
                </div>
            </div>

            <!-- Changement d'adresse e-mail -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">E-mail</label>  
                <div class="col-md-4">
                    <input id="email" name="email" type="text" placeholder="E-mail récupéré" class="form-control input-md">
                    <span class="help-block">Change your e-mail</span>  
                </div>
            </div>

            <!-- Envoi du formulaire -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submitform">submit</label>
                <div class="col-md-8">
                    <button id="submitform" name="submitform" class="btn btn-success">Submit</button>
                    <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
<!-- Si propriétaire -> édition de l'e-mail, du mot de passe, du mode de paiement-->
@endsection