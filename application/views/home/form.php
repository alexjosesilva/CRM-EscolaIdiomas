<!-- main -->
        <div class="column col-sm-9" id="main">
            <div class="padding">
                <div class="full col-sm-9">

                    <!-- content -->
                    <div class="col-sm-5" id="featured">
                      <div class="page-header text-muted">Usuario:</div>

                        <form class="form-horizontal" action="" method="post">
                          <fieldset>

                            <!-- Form Name -->
                            <legend> Cadastrar Usuario </legend>

                              <!-- Text input-->
                                <div class="control-group">
                                  <label class="control-label" for="nomeUsuario">Matricula Usuario</label>
                                  <div class="controls">
                                    <input id="codigoUsuario" name="codigoUsuario" type="text" value="<?php echo isset($usuario)?$usuario['codigoUsuario']:""; ?>" autocomplete="off" />

                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                  <label class="control-label" for="nomeUsuario">Nome Usuario</label>
                                  <div class="controls">
                                    <input id="nomeUsuario" name="nomeUsuario" type="text" value="<?php echo isset($usuario)?$usuario['nomeUsuario']:""; ?>"  autocomplete="off" />

                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                  <label class="control-label" for="senhaUsuario">Senha Usuario</label>
                                  <div class="controls">
                                    <input id="senhaUsuario" name="senhaUsuario" type="password" value="<?php echo isset($usuario)?$usuario['senhaUsuario']:""; ?>" autocomplete="off">

                                  </div>
                                </div>

                            <!-- Button -->
                            <div class="control-group">
                              <label class="control-label" for=""></label>
                              <div class="controls">
                                <input type="submit" class="btn btn-inverse" value="Enviar" />
                              </div>
                            </div>

                            </fieldset>
                            </form>
                          </div>
