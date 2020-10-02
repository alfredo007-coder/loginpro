@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="text-center">
                    <h1> Propiedad </h1>
                </div>
                <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                               Nombre
                            </div>
                            <div>
                                <input type="text" class="form-control"></input>
                            </div>  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               Activo
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" Checked>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               Color
                            </div>
                            <div class="form-group">
                                <select class="browser-default custom-select">
                                    <option value=""></option>
                                    <option value="#F1948A" style="background:#F1948A"></option>
                                    <option value="#D5F5E3" style="background:#D5F5E3"></option>
                                    <option value="#FCF3CF" style="background:#FCF3CF"></option>
                                    <option value="#E8DAEF" style="background:#E8DAEF"></option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-body">
                   
                </div> <!-- fin body-->
            </div>
        </div>
    </div>
</div>
@endsection
