    {!!  Form::label('continente', ' Nombre Continente ')!!}
<div class="input-group">
    {!!  Form::select('continente', [null=>'Seleccione un continente']+$continentes,null,array('class' => 'continente form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>

    {!!  Form::label('pais', ' Nombre país ')!!}
<div class="input-group">
    {!!  Form::select('pais', [null=>'Seleccione un país'],null,array('class' => 'universidad form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>



    {!!  Form::label('campus_sede', 'Seleccione la universidad  ')!!}
<div class="input-group">
    {!!  Form::select('campus_sede', [null=>'Seleccione la universidad'],null,array('class' => 'form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>

@if($parametros['tipo_estudio'] === "Pregrado")
<div id="select_uach_estudio">
  @include('postulacion.estudio_actual.pre_uach.fields_select')
</div>

@else
                {!!  Form::label('facultad', 'Seleccione una facultad  ')!!}
<div class="input-group">
    {!!  Form::select('facultad', [null=>'Seleccione una facultad'],null,array('class' => 'form-control'))!!}
  <span class="input-group-btn">
    <a href="#!" class="btn btn-default" type="button" tabindex="-1"><span class="fa  fa-plus-circle " aria-hidden="true"></span></a>
  </span>
</div>
            @include('postulacion.estudio_actual.postgrado.fields_extra')


  

  @endif


