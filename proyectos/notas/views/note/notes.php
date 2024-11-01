 <!-- SECCIÓN DE BUSQUEDA DE NOTAS -->
 <?php if (isset($_SESSION['identity'])) : ?>
     <section class="search">
         <h2 class="search__title">Notas</h2>

         <article class="search__form">
             <form action="">
                 <input type="search" name="search" class="search__input" placeholder="Buscar Nota" aria-label="Search" />
                 <input type="submit" value="Buscar" class="search__submit">
             </form>
         </article>
     </section>
 <?php endif; ?>


 <!-- SECCIÓN DE NOTAS -->
 <a class="notes_create" href="<?= base_url ?>/note/create">Nueva Nota +</a>

 <!-- __MENSAJES DE ALERTA__ -->
 <?php if (isset($_SESSION['register-note']) && $_SESSION['register-note'] == 'complete') : ?>
     <div class="alert alert-success">
         <i class="fa-regular fa-square-check"></i> Nota creada correctamente
     </div>
 <?php elseif (isset($_SESSION['register-note']) && $_SESSION['register-note'] == 'failed') : ?>
     <div class="alert alert-error">
         <i class="fa-solid fa-ban"></i> La nota no se pudo crear, intentalo nuevamente :(
     </div>
 <?php endif; ?>

 <?php Utils::deleteSession('register-note'); ?>


 <section class="notes">

     <?php if ($myNotes && $myNotes->num_rows > 0) : ?>
         <?php while ($note = $myNotes->fetch_object()) : ?>
             <?php $noteColor = strtolower(str_replace(' ', '', $note->color)); ?>
             <section class="notes__note note__<?= $noteColor; ?>">
                 <div class="note__titled"><?= $note->title ?></div>
                 <div class="note__contentd"><?= nl2br(htmlspecialchars(substr($note->content, 0, 300))) ?>...</div>
                 <div class="note__footerd">
                     <a href="<?= base_url ?>note/see&id=<?= $note->id ?>">ver</a>
                     <a href="">eliminar</a>
                     <a href="">editar</a>
                 </div>
             </section>
         <?php endwhile; ?>

     <?php else:  ?>
         <div>
             Aun no has creado notas
         </div>

     <?php endif; ?>




 </section>