{include file="header.tpl"}
<div class="col-md-6 col-md-offset-3">
  {if isset($error)}
  <div class="alert alert-danger" role="alert">{{$error}}</div>
  {/if}
  <form action="verificarUsuario" method="post">
    <div class="form-group">
      <label for="user_name">Nombre de usuario</label>
      <input type="text" class="form-control" id="user_name" name="user" placeholder="heisenberg84">
    </div>
    <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" class="form-control" id="user_password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Acceder</button>
  </form>
</div>
{include file="footer.tpl"}
