<div class="actionbar">
<button id="create">Crear Nota</button>
</div>

<div class="float-form">
<?php echo form_open("/home", ["method" => "POST"]); ?>
<h1 id="floatTitle">Crear Nota</h1>
<input type="hidden" name="id" name="hiddenId" value="<?php echo $_SESSION[
	"id"
]; ?>">
<input type="hidden" id="noteID" name="noteID" value="">
<input type="hidden" id="isEditting" name="editing" value="false">
<input type="text" id="nameText" placeholder="Nombre" name="name">
<textarea name="text" id="textText" required cols="30" rows="10"></textarea>
<button>Guardar</button>
<a href="#" id="cancelCreate">Cancelar</a>
</form>
</div>

<?php foreach ($notes as $key => $value): ?>
<div class="note">
<h1><?php echo $value->name; ?></h1>
<p><?php echo $value->text; ?></p>
<div class="actions">
<button id="editButton" data-id="<?php echo $value->id; ?>" data-name="<?php echo $value->name; ?>" data-text="<?php echo $value->text; ?>">Editar</button>
<?php echo form_open("/home", ["method" => "POST"]); ?>
<input type="hidden" name="delete" value="<?php echo $value->id; ?>">
<button>Eliminar</button>
</form>
</div>
</div>
<?php endforeach; ?>

<script src="<?php echo base_url(); ?>js/notes.js" defer></script>
