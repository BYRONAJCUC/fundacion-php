<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Nuevo</span> 
                    <span class="fw-dark">
                        Paciente
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
        <form method="POST" autocomplete="off">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>DPI del paciente</label>
                            <input name="dnipaci" maxlength="13" id="documento" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required type="text" class="form-control" placeholder="Ejmp: 77676576">
                            <!-- <button type="button" id="buscar" class="btn btn-icon btn-round btn-dark">
                                <i class="fab fa-discourse"></i>
                            </button> -->
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Nombre del paciente</label>
                            <input name="nompac" style="color: #fff;" id="nombres"  onkeypress="return soloLetras(event)" required type="text" class="form-control" placeholder="ejmp: juan">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Apellido del paciente</label>
                            <input name="apepac" style="color: #fff;" onkeypress="return soloLetras(event)" id="apellidoPaterno"  required type="text" class="form-control" placeholder="ejmp: perez">
                        </div>
                    </div>
                </div>


<div class="row">
    <!-- <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Seguro</label>
                <select class="form-control" name="segpa" required>
                    <option value="Si">Si</option>
                    <option value="No">No</option>  
                </select>
        </div>
    </div> -->

        <div class="col-sm-6">
            <div class="form-group form-group-default">
                <label>Teléfono del paciente</label>
                <input name="telpa"  required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="9" type="text" class="form-control" placeholder="ejmp: 999659874">
            </div>
        </div>
</div>

<div class="row">
   <div class="col-md-12">
    <div class="form-group form-group-default">
        <label>Género del paciente</label>
            <select class="form-control" name="sexpa" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>  
            </select>
    </div>
</div> 
</div>


            <div class="modal-footer no-bd">
                <button type="submit" name="add_customers" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
            </div>
            
        </div>
    </div>
</div>