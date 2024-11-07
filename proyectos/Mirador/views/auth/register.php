<form action="<?= base_url?>auth/createAccount" method="POST">
    <!-- <label for="persona_id">persona id</label> -->
    <input type="number" name="persona_id" placeholder="persona_id">
    <input type="number" name="cargo_id" placeholder="cargo_id">
    <input type="email" name="email" placeholder="email">
    <input type="text" name="password" placeholder="password">
    <input type="submit" value="Enviar">
</form>