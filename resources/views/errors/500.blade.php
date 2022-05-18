@extends('errors::minimal')

@section('title', __('Error en el servidor'))
@section('code', '500')
@section('message', __('Se ha producido un error al acceder a la pagina, verifique que haya ingresado correctamente los datos, si el problema persiste contacte con el administrador del sitio.'))

