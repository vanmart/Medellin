@extends('layouts/pruebas')

@section('scripts')

<script type="text/javascript">
  $('document').ready(function(){


  });


</script>

@endsection




@section('tablas')
 <!-- Defino la tabla  -->
  <div  class="table table-hover">
    <table class="table">
       <tr>
          <th scope="col">id</th>
          <th scope="col">Datos</th>
      </tr>
      @if($datos)
      
      @foreach($datos as $dato) 
      <tr id="id_{{$dato->id}}">
          <td><label id="">{{$dato->id}}</label></td>
          <td><label id="datos_{{$dato->id}}">{{$dato->datos}}</label></td>
          <td><label id="2"></td>
          
      </tr>
      
      @endforeach
      @endif

    </table>

     @foreach($seleccionado as $seleccionado) 
      <label>EL SELECCIONADO FUE</label>
      <table>
      <tr id="id_{{$seleccionado->id}}">
          <td><label id="">{{$seleccionado->id}} </label></td>
          <td><label id="datos_{{$seleccionado->id}}">{{$seleccionado->datos}}</label></td>
          <td><label id="2"></td>
      </tr>
      </table>
      @endforeach

      <label>Las Porciones Fueron</label>

      <table>
      <tr>
          <td><label id="">{{$porciones[0]}} </label></td>
          <td><label id="">{{$porciones[1]}} </label></td>
          <td><label id="">{{$porciones[2]}} </label></td>
          <!--<td><label id="datos_{{$seleccionado->id}}">{{$seleccionado->datos}}</label></td> -->
          <td><label id="2"></td>
      </tr>
      </table>

      <label>Se insertaron asi (Verifica tu base de datos)</label>
       
      
      <table>
          <tr>
            <th>id</th>
            <th>column_a</th>
            <th>column_b</th>
            <th>column_c</th>

          </tr>
          @foreach($data_news as $data_new)
          <tr id="id_{{$data_new->id}}">
              <td><label id="data_new_id_">{{$data_new->id}} </label></td>
              <td><label id="column_a_{{$data_new->id}}">{{$data_new->column_a}}</label></td>
              <td><label id="column_b_{{$data_new->id}}">{{$data_new->column_b}}</label></td>
              <td><label id="column_c_{{$data_new->id}}">{{$data_new->column_c}}</label></td>
              <td><label id="2"></td>
          </tr>
          @endforeach
          <hr>
      </table>

      
      




  </div>
  
  @endsection
