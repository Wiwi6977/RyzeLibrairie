
    <!-- Contacts --> 
    <div class="block">
       <footer class="footer">
           <form action="Acceuil.php" method="post"enctype="multipart/form-data">
       <div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" type="text" placeholder="name">
  </div>
</div>

<div class="field">
  <label class="label">Username</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-success" type="text" placeholder="username" >
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-danger" type="email" placeholder="Email ">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Subject</label>
  <div class="control">
    <div class="select">
      <select>
        <option>Quels sujets ?</option>
        <option>Simple msg</option>
        <option>Critique</option>
        <option>Recrutement</option>
      </select>
    </div>
  </div>
</div>

<div class="field">
  <label class="label">Message</label>
  <div class="control">
    <textarea class="textarea" placeholder="Écrivez quelques mots.."></textarea>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Envoyer à Ryze !</button>
  </div>
  <div class="control">
    <button class="button is-link is-light">Fuir</button>
  </div>
</div>                      
</form>
     </footer>
</div>