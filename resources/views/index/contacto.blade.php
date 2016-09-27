@extends('welcome')

@section('title', 'Registrate')

@section('content')
    <section class="cart" style="max-width:600px">
        <h3 class="center-align">Registro</h3>
        <div class="row">
            <form class="col s12">
              <div class="row mycont">
                <div class="input-field col s12">
                  <i class="fa fa-user prefix" aria-hidden="true"></i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Nombres y apellidos</label>
                </div>

                <div class="input-field col s12">
                  <i class="fa fa-list-alt prefix" aria-hidden="true"></i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Nombre de la empresa</label>
                </div>
                <div class="input-field col s12 ">
                    <i class="fa fa-list-alt prefix" aria-hidden="true"></i>
                    <select class="icons">
                      <option value="" disabled selected>Selecciona una categoria</option>
                      <option value="" data-icon="images/sample-1.jpg" class="left circle">example 1</option>
                      <option value="" data-icon="images/office.jpg" class="left circle">example 2</option>
                      <option value="" data-icon="images/yuna.jpg" class="left circle">example 3</option>
                    </select>
                    <label>Categoria</label>
                </div>
                <div class="input-field col s12">
                  <i class="fa fa-globe prefix" aria-hidden="true"></i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Url dominio</label>
                </div>

                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Pais</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Region / Estado</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Ciudad</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Direccion</label>
                </div>



              </div>              
            </form>
        </div>
    </section>
    
@endsection