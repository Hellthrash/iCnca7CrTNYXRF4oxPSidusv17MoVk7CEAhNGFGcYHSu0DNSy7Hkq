<div class="panel-body">
        <div id="message"></div>
        <div class="col-lg-6">
            <div class="form-group">
                {!!  Form::label('apellido_paterno', 'Apellido paterno ')!!}
                {!! Form::text('apellido_paterno',null,array('class' => 'form-control','placeholder'=>'Ej: Aburto'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('apellido_materno', 'Apellido materno ')!!}
                {!! Form::text('apellido_materno',null,array('class' => 'form-control','placeholder'=>'Ej: Vidal'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('nombre', 'Nombres ')!!}
                {!! Form::text('nombre',null,array('class' => 'form-control','placeholder'=>'Ej: Felipe Andrés'));!!}
            </div>
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                    {!!  Form::label('tipo', 'Tipo de documento ')!!}
                    {!!  Form::select('tipo', [null=>'Seleccione documento','Cédula nacional de identidad'=>'Cédula nacional de identidad','Pasaporte'=>'Pasaporte'],null,array('class' => 'form-control'))!!}
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">

                {!!  Form::label('numero', 'N° Documento');!!}
                {!! Form::text('numero',null,array('class' => 'form-control','placeholder'=>'Ej: 4450398-9'));!!}
                </div>

              </div>
            </div>

              {!!  Form::label('fecha_nacimiento', 'Fecha nacimiento ')!!}
            <div class="input-group date datePicker">

                {!! Form::text('fecha_nacimiento',null,array('class' => 'form-control'));!!}
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('sexo', 'Sexo:') !!}
                <label class="radio-inline">
                    {!! Form::radio('sexo', 'f',array('id'=>'sexo_f'))!!} Femenino
                </label>
                <label class="radio-inline">
                    {!! Form::radio('sexo', 'm',array('id'=>'sexo_f'))!!} Masculino
                </label>

            </div>




            <div class="form-group">
                {!!  Form::label('email_personal', 'E-mail ')!!}
                {!! Form::text('email_personal',null,array('class' => 'form-control','placeholder'=>'Ej: juan.perez@gmail.com'));!!}
            </div>

            <div class="form-group">
                {!!  Form::label('telefono', 'Teléfono ')!!}
                {!! Form::text('telefono',null,array('class' => 'form-control','placeholder'=>'Ej: +89963897733'));!!}
            </div>




        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!!  Form::label('continente', ' Nombre Continente ')!!}
                {!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'continente form-control'))!!}
            </div>


            <div class="form-group">
                {!!  Form::label('pais', ' Nombre país ')!!}
                {!!  Form::select('pais', [null=>'Seleccione un país'],null,array('class' => 'pais form-control'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('ciudad', ' Nombre de la ciudad ')!!}
                {!!  Form::select('ciudad', [null=>'Seleccione ciudad'],null,array('class' => 'form-control ciudad'))!!}
            </div>

            <div class="form-group">
                {!!  Form::label('direccion', 'Dirección ')!!}
                {!! Form::text('direccion',null,array('class' => 'form-control','placeholder'=>'Ej: Gral Lagos #8984'));!!}
            </div>
            <div class="form-group">
                {!!  Form::label('nacionalidad', 'Nacionalidad ')!!}
                {!! Form::text('nacionalidad',null,array('class' => 'form-control','placeholder'=>'Ej: Chileno'));!!}
            </div>


            <div class="form-group">
                {!!  Form::label('lugar_nacimiento', 'Lugar de nacimiento ')!!}
                {!! Form::text('lugar_nacimiento',null,array('class' => 'form-control','placeholder'=>'Ej: Osorno'));!!}
            </div>

        </div>
    <!-- /.row (nested) -->
{!!Form::hidden('urlStoreInformacion',url('postulacion/store'),array('id'=>'urlStoreInformacion'));!!}
{!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}

</div>