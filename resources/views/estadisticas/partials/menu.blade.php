<div class="col-lg-3">
<div class="form-group">
  	{!!  Form::label('continente', ' Filtro principal ')!!}
<<<<<<< HEAD
	{!!  Form::select('principal', ['0'=>'Seleccione un filtro',
                                  '1'=>'Postulante',
                                  '2'=>'Universidad',
                                  '3'=>'Otras estadisticas'],
                                  null,array('class' => 'form-control',
                                  'id'=>'principal'))!!}
=======
	{!!  Form::select('principal', [null=>'Seleccione un filtro',
                                  '1'=>'genero',
                                  '2'=>'Universidad de origen',
                                  '3'=>'Universidad de destino',
                                  '4'=>'Tipo de estudiante',
                                  '5'=>'Continente',
                                  '6'=>'Pais',
                                  '7'=>'edad'],
                                  null,array('class' => 'form-control',
                                  'id'=>'principal'))!!}

>>>>>>> l51
</div>

</div>
<div class="col-lg-3">
<div class="form-group">
<<<<<<< HEAD
  <br>
</div>
</div>


=======

      {!!  Form::label('continente', 'Filtrar con:')!!}
  {!!  Form::select('f1', [null=>'Seleccione un continente',
                            1=>'asd'],null,array('class' => 'form-control'))!!}
</div>
</div> 

<div class="col-lg-3">
<div class="form-group">

      {!!  Form::label('continente','Otro')!!}
  {!!  Form::select('f2', [null=>'Seleccione un continente'],null,array('class' => 'form-control'))!!}
</div>
</div>  

<div class="col-lg-3">
<div class="form-group">

      {!!  Form::label('continente', 'Otro')!!}
  {!!  Form::select('f3', [null=>'Seleccione un continente'],null,array('class' => 'form-control'))!!}
</div>
</div> 
>>>>>>> l51
{!!Form::hidden('id','',array('id'=>'id'));!!}
