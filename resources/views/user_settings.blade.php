@extends('layouts.app')

@section('content')
<div class="container">
  <!-- IDEE CSS: Desktop screen: section 'edit your profile' à gauche et section 'manage your account' à droite -->
  <!-- IDEE CSS: Mettre les boutons 'update' à droite des champs correspondants -->

        <fieldset id="EditProfile">
            <legend>Edit your great profile</legend>

            <form action="/member" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textinput">First name</label>
                    <div class="col-md-3">
                        <input id="textinput" name="textinput" type="text" placeholder="{{ $user->first()->name }}" class="form-control input-md">
                        <button name="submitform" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>

            <form action="/member" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textinput">Last name</label>
                    <div class="col-md-3">
                        <input id="textinput" name="textinput" type="text" placeholder="{{ $user->first()->name }}" class="form-control input-md">
                        <button name="submitform" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>

            <form action="/member" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="email">E-mail</label>
                    <div class="col-md-3">
                        <input id="email" name="email" type="text" placeholder="{{ $user->first()->email }}" class="form-control input-md">
                        <button name="submitform" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>

            <form action="/member" method="post" class="form-horizontal">
                <div class="form-group">
                <label class="col-md-3 control-label" for="selectbasic">Gender</label>
                    <div class="col-md-3">
                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="1">Man</option>
                            <option value="2">Woman</option>
                            <option value="3">Undefinied</option>
                        </select>
                        <button name="submitform" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>

            <form action="/member" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="selectage">Age related content</label>
                    <div class="col-md-3">
                        <input type="range" class="custom-range" min="0" max="5" id="customRange2">
                        <!-- AJOUT: il faut que l'utilisateur puisse voir "l'age" qu'elle sélectionne -->
                    </div>
                </div>
            </form>

            <form action="/member" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="photo">Upload your profile's picture</label>
                    <div class="col-md-3">
                        <input id="photo" name="photo" class="input-file" type="file">
                        <button name="submitform" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>

        </fieldset>

        <fieldset id="EditAccount">
            <legend>Manage your account</legend>
            <p>You need to be the account's owner to edit stuff here.</p>
            <!-- AJOUT: 1. Possibilité de supprimer un compte invité, ou inviter quelqu'un. -->
            <!-- AJOUT: 2. Pour chaque compte invité, changer la restriction liée à l'age. -->
            <!-- AJOUT: 3. Information de payement. Pour l'instant: free trial. -->
        </fieldset>
</div>
@endsection
